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
      $expedientsPerVendor = collect();
      $modulesByType = collect();
      $difMods = collect();

       if (Auth::user()->hasAnyRole('Administrador|Cliente gerencial|Coordinador')) {
         $expedientsPerVendor = DB::table('vendors')
                         ->join('services', 'services.vendor_id', '=', 'vendors.id')
                         ->join('medical_services', 'medical_services.service_id', '=', 'services.id')
                         ->join('expedient_modules', 'expedient_modules.id', '=', 'medical_services.expedient_module_id')
                         ->join('expedients', 'expedients.id', '=', 'expedient_modules.expedient_id')
                         ->select(DB::raw("vendors.name, coalesce(count(expedients.id),0) as c"))
                         ->groupBy("vendors.name")
                         ->orderby('c','DESC')
                         ->get();
         $modulesByType = DB::table('expedients')
                         ->join('expedient_modules', 'expedients.id', '=', 'expedient_modules.expedient_id')
                         ->join('modules', 'modules.id', '=', 'expedient_modules.module_id')
                         ->join('module_types', 'module_types.id', '=', 'modules.module_type_id')
                         ->select(DB::raw("module_types.name, coalesce(count(expedients.id),0) as c"))
                         ->groupBy("module_types.name")
                         ->orderby('c','DESC')
                         ->get();

                         // dd($expedientsPerVendor);
         $recommendedModules = DB::table('expedient_modules')
                         ->join('modules', 'modules.id', '=', 'expedient_modules.recommended_module_id')
                         // ->join('expedients', 'expedients.id', '=', 'expedient_modules.expedient_id')
                         ->select(DB::raw("expedient_modules.recommended_module_id, sum(modules.price) as recommendedprice"))
                         ->groupBy("expedient_modules.recommended_module_id")
                         ->orderby('expedient_modules.recommended_module_id','ASC')
                         //->get() //comentado para subjoin
                         ;
         $originalModules = DB::table('expedient_modules')
                         ->join('modules', 'modules.id', '=', 'expedient_modules.module_id')
                         // ->join('modules', 'modules.id', '=', 'expedient_modules.recommended_module_id')
                         // ->join('expedients', 'expedients.id', '=', 'expedient_modules.expedient_id')
                         ->select(DB::raw("expedient_modules.module_id, sum(modules.price) as originalprice"))
                         ->groupBy("expedient_modules.module_id")
                         ->orderby('expedient_modules.module_id','ASC');
                        // ->get();

                      $difMods = DB::table('modules')
                      ->leftjoinSub($originalModules, 'original_modules', function ($join) {
                        $join->on('modules.id', '=', 'original_modules.module_id');
                      })
                      ->leftjoinSub($recommendedModules, 'recommended_modules', function ($join) {
                        $join->on('modules.id', '=', 'recommended_modules.recommended_module_id');
                      })
                      ->whereNotNull('original_modules.originalprice')
                      ->orWhereNotNull('recommended_modules.recommendedprice')
                      ->join('module_types', 'module_types.id', '=', 'modules.module_type_id')
                      ->join('module_categories', 'module_categories.id', '=', 'modules.module_category_id')
                      ->select(DB::raw("modules.id, CONCAT(module_types.name,', ',module_categories.name) as moduleName, recommended_modules.recommendedprice,original_modules.originalprice"))
                      ->orderBy('modules.id','ASC')
                      ->get();
                      $difMods->transform(function ($item,$key){
                        // dd($item,$key);
                        if ($item->recommendedprice == null) {
                          $item->recommendedprice = 0;
                        }
                        if ($item->originalprice == null) {
                          $item->originalprice = 0;
                        }
                        return $item;
                      });
       }


       $pendingAuditsCount=0;
       if(Auth::user()->hasRole('Auditor')){
         $auditor = Auth::user()->person->auditors->first();

         $auditsCount = $auditor->numberOfTotalAudits();
         $pendingAuditsCount = $auditor->numberOfPendingAudits();
       }elseif(Auth::user()->hasRole('Cliente') || Auth::user()->hasRole('Cliente gerencial')){
         $user = Auth::user();

         $client = Client::whereHas('users', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        })->first();

         $audits = $client->audits();
         $auditsCount= count($audits);

         //Eliminar los vendors migracion para las vistas de cliente
         $expedientsPerVendor = $expedientsPerVendor->filter(function ($item) {
                return $item->name!='Migración';
              })->values();

          //Eliminar los modulos migracion para las vistas de cliente
          $modulesByType = $modulesByType->filter(function ($item) {
                 return $item->name!='Migracion';
               })->values();


       }else {
         $audits = Audit::all();
         $auditsCount= count($audits);
       }

      return view('home',compact('auditsCount','pendingAuditsCount','expedientsPerVendor','difMods','modulesByType'));//,'auditsByStatus','auditsByGender'));
    }
}
