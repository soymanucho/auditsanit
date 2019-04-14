<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Audit;
use App\User;

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

       $auditsByStatus = DB::table('audits')
                     ->join('audits_statuses', 'audits.id', '=', 'audits_statuses.audit_id')
                     ->join('statuses',  'audits_statuses.status_id', '=', 'statuses.id')
                     ->select(DB::raw('statuses.name, count(audits_statuses.audit_id) as count'))
                     ->groupBy('statuses.name')
                     ->orderby('count','DESC')
                     ->havingRaw('count > 0')
                     ->get();
       $auditsByGender = DB::table('audits')
               ->join('expedients', 'audits.expedient_id', '=', 'expedients.id')
               ->join('patients', 'expedients.patient_id', '=', 'patients.id')
               ->join('people', 'patients.person_id', '=', 'people.id')
               ->join('genders', 'people.gender_id', '=', 'genders.id')
               ->select(DB::raw('genders.name, count(audits.id) as count'))
               ->groupBy('genders.name')
               ->orderby('count','DESC')
               ->havingRaw('count > 0')
               ->get();
       // $genders = DB::table('genders')
       //         ->join('clients', 'genders.id', '=', 'clients.gender_id')
       //         ->select(DB::raw('genders.name, count(*) as count'))
       //         ->groupBy('genders.name')
       //         ->orderby('count','DESC')
       //         ->get();
       // $paymentTypes = DB::table('sales')
       //               ->join('payment_types', 'payment_types.id', '=', 'sales.paymentType_id')
       //               ->select(DB::raw('payment_types.name, count(*) as count'))
       //               ->groupBy('payment_types.name')
       //               ->orderby('count','DESC')
       //               ->havingRaw('count > 0')
       //               ->get();
       // $today = Carbon::now();
       // $lastMonthSales = DB::table('sales')
       //                 // ->join('payment_types', 'payment_types.id', '=', 'sales.paymentType_id')
       //                 ->select(DB::raw("dayofmonth(created_at), coalesce(count(*),0) as count"))
       //                 ->whereMonth("created_at", $today->month)
       //                 ->whereYear('created_at', $today->year)
       //                 ->groupBy("dayofmonth(created_at)")
       //                 ->orderby('dayofmonth(created_at)','ASC')
       //                 // ->havingRaw('count > 0')
       //                 ->get();

      $amountOfAudits = Audit::all()->count();
      $totalAmountOfUsers = User::all()->count();
      return view('home',compact('amountOfAudits','totalAmountOfUsers','auditsByStatus','auditsByGender'));
    }
}
