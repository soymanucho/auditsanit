<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Audit;
use App\User;
use App\Client;
use App\Auditor;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

       // $auditsByStatus = DB::table('audits')
       //               ->join('audits_statuses', 'audits.id', '=', 'audits_statuses.audit_id')
       //               ->join('statuses',  'audits_statuses.status_id', '=', 'statuses.id')
       //               ->select(DB::raw('statuses.name, count(audits_statuses.audit_id) as count'))
       //               ->groupBy('statuses.name')
       //               ->groupBy('statuses.name')
       //               ->orderby('count','DESC')
       //               ->havingRaw('count > 0')
       //               ->get();
       // $auditsByGender = DB::table('audits')
       //         ->join('expedients', 'audits.expedient_id', '=', 'expedients.id')
       //         ->join('patients', 'expedients.patient_id', '=', 'patients.id')
       //         ->join('people', 'patients.person_id', '=', 'people.id')
       //         ->join('genders', 'people.gender_id', '=', 'genders.id')
       //         ->select(DB::raw('genders.name, count(audits.id) as count'))
       //         ->groupBy('genders.name')
       //         ->orderby('count','DESC')
       //         ->havingRaw('count > 0')
       //         ->get();
       // $today = Carbon::now();


       $expedientsPerVendor = DB::table('vendors')
                       ->join('services', 'services.vendor_id', '=', 'vendors.id')
                       ->join('medical_services', 'medical_services.service_id', '=', 'services.id')
                       ->join('expedient_modules', 'expedient_modules.id', '=', 'medical_services.expedient_module_id')
                       ->join('expedients', 'expedients.id', '=', 'expedient_modules.expedient_id')
                       ->select(DB::raw("vendors.name, coalesce(count(expedients.id),0) as c"))
                       ->groupBy("vendors.name")
                       ->orderby('vendors.name','ASC')
                       ->get();
                       // dd($expedientsPerVendor);
       $recommendedModules = DB::table('expedient_modules')
                       ->join('modules', 'modules.id', '=', 'expedient_modules.recommended_module_id')
                       ->join('module_types', 'module_types.id', '=', 'modules.module_type_id')
                       ->join('module_categories', 'module_categories.id', '=', 'modules.module_category_id')
                       // ->join('expedients', 'expedients.id', '=', 'expedient_modules.expedient_id')
                       ->select(DB::raw("expedient_modules.id, CONCAT(module_types.name,', ',module_categories.name), sum(modules.price)"))
                       ->groupBy("expedient_modules.id")
                       ->groupBy("module_types.name")
                       ->groupBy("module_categories.name")
                       ->orderby('expedient_modules.id','ASC')
                       ->get();
       $originalModules = DB::table('expedient_modules')
                       ->join('modules', 'modules.id', '=', 'expedient_modules.module_id')
                       // ->join('modules', 'modules.id', '=', 'expedient_modules.recommended_module_id')
                       ->join('module_types', 'module_types.id', '=', 'modules.module_type_id')
                       ->join('module_categories', 'module_categories.id', '=', 'modules.module_category_id')
                       // ->join('expedients', 'expedients.id', '=', 'expedient_modules.expedient_id')
                       ->select(DB::raw("expedient_modules.id, CONCAT(module_types.name,', ',module_categories.name), sum(modules.price)"))
                       ->groupBy("expedient_modules.id")
                       ->groupBy("module_types.name")
                       ->groupBy("module_categories.name")
                       ->orderby('expedient_modules.id','ASC')
                       ->get();

      $difMods= $originalModules->merge($recommendedModules)->groupBy('expMod');
      // $difMods= $originalModules->merge($recommendedModules)->sort();
      // foreach ($originalModules as $orig) {
      //
      // }

      // $difMods= $recommendedModules->union($originalModules)->values();

      // $difMods= $originalModules->mapWithKeys(function ($item, $key) {
      //     $single = $recommendedModules->where('expMod',$item->expMod);
      //     return collect($item)->merge($single);
      // });
      // dd($recommendedModules,$originalModules,$difMods);


      // dd($recommendedModules,$originalModules,$difModules);

       // $vendorTypesPerVendor = DB::table('vendors')
       //                 ->join('services', 'services.vendor_id', '=', 'vendors.id')
       //                 ->join('medical_services', 'medical_services.service_id', '=', 'services.id')
       //                 ->join('expedient_modules', 'expedient_modules.id', '=', 'medical_services.expedient_module_id')
       //                 ->join('modules', 'modules.id', '=', 'expedient_modules.module_id')
       //                 ->join('module_types', 'module_types.id', '=', 'modules.module_type_id')
       //                 ->select(DB::raw("vendors.name as name, coalesce(count(expedients.id),0) as count"))
       //                 // ->whereMonth("created_at", $today->month)
       //                 // ->whereYear('created_at', $today->year)
       //                 ->groupBy("vendors.name")
       //                 ->orderby('count','ASC')
       //                 // ->havingRaw('count > 0')
       //                 ->get();
       $pendingAuditsCount=0;
       if(Auth::user()->hasRole('Auditor')){
         $auditor = Auth::user()->person->auditors->first();
         // $auditor = Auditor::where('user_id',Auth::user()->id)->first();
         $auditsCount = $auditor->numberOfTotalAudits();
         $pendingAuditsCount = $auditor->numberOfPendingAudits();
       }elseif(Auth::user()->hasRole('Cliente') || Auth::user()->hasRole('Cliente gerencial')){
         $user = Auth::user();
         // $client = Client::whereHas('user_id',$user->id)->get();
         $client = Client::whereHas('users', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        })->first();
         // $client = Auth::user()->with('clients')->get();
         // dd($client);
         $audits = $client->audits();
         $auditsCount= count($audits);
         // dd($audits,$auditsCount);
       }else {
         $audits = Audit::all();
         $auditsCount= count($audits);
       }
      // $amountOfAudits = Audit::all()->count();
      // $totalAmountOfUsers = User::all()->count();
      return view('home',compact('auditsCount','pendingAuditsCount','expedientsPerVendor','difMods'));//,'auditsByStatus','auditsByGender'));
    }
}
