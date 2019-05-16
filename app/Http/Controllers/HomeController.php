<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Audit;
use App\Auditor;
use App\User;
use App\Location;
use App\Patient;
use App\ExpedientModule;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

       // $auditsByStatus = DB::table("audits")
       //               ->join("audits_statuses", "audits.id", "=", "audits_statuses.audit_id")
       //               ->join("statuses",  "audits_statuses.status_id", "=", "statuses.id")
       //               ->select(DB::raw("statuses.name, count(audits_statuses.audit_id) as count"))
       //               ->groupBy("statuses.name")
       //               ->groupBy("statuses.name")
       //               ->orderby("count","DESC")
       //               ->havingRaw("count > 0")
       //               ->get();
       // $auditsByGender = DB::table("audits")
       //         ->join("expedients", "audits.expedient_id", "=", "expedients.id")
       //         ->join("patients", "expedients.patient_id", "=", "patients.id")
       //         ->join("people", "patients.person_id", "=", "people.id")
       //         ->join("genders", "people.gender_id", "=", "genders.id")
       //         ->select(DB::raw("genders.name, count(audits.id) as count"))
       //         ->groupBy("genders.name")
       //         ->orderby("count","DESC")
       //         ->havingRaw("count > 0")
       //         ->get();
       // $genders = DB::table("genders")
       //         ->join("clients", "genders.id", "=", "clients.gender_id")
       //         ->select(DB::raw("genders.name, count(*) as count"))
       //         ->groupBy("genders.name")
       //         ->orderby("count","DESC")
       //         ->get();
       // $paymentTypes = DB::table("sales")
       //               ->join("payment_types", "payment_types.id", "=", "sales.paymentType_id")
       //               ->select(DB::raw("payment_types.name, count(*) as count"))
       //               ->groupBy("payment_types.name")
       //               ->orderby("count","DESC")
       //               ->havingRaw("count > 0")
       //               ->get();
       // $today = Carbon::now();


       $patients = Patient::with("person")->with("person.address")->with("person.address.location")->get();
       $locations = collect([]);
       foreach ($patients as $patient) {
          $locations->push($patient->person->address->location->latitude,$patient->person->address->location->longitude,$patient->person->address->location->name);
       }
       $auditsByLocation = $patients->map(function ($item,$key) {
           return "{latLng:[".$item->person->address->location->latitude.", ".$item->person->address->location->longitude."], name:'".$item->person->address->location->name."'}";
         });
        $auditsByLocation->toJson();
       // dd($auditsByLocation,$locations,$patients);
       // $expedientModules = ExpedientModule::with("medicalServices")->with("medicalServices.service")->with("medicalServices.service.vendor")->with("medicalServices.service.vendor.address.location")->get();

       // $locations = collect([]);
       // foreach ($expedientModules as $expedientModule) {
       //   foreach ($expedientModule->medicalServices()->with("service.vendor.address.location")->get() as $medicalService) {
       //     // dd($medicalService);
       //     $locations->push($medicalService->vendorsLocation()->all());
       //   }
       // }
       // $locationes = collect([]);
       // foreach ($locations as $location) {
       //   $locationes->push($location->id,$location->latitude,$location->longitude,$location->name);
       // }
       //
       // dd($expedientModules,$locationes);
       // // json_encode(array_values($locations->toArray()));
       // $auditsByLocation = $locations->mapWithKeys(function ($item) {
       //     return [$item["latitude"], $item["longitude"] => $item["name"]];
       //   });
       // $auditsByLocation->toJson();
       // dd($expedientModules,$locations,$auditsByLocation);
       // $auditsByLocation->all();
       // dd($expedientModules,$locations,$auditsByLocation);
       // DB::table("expedient_modules")
       //                  ->join("medical_services", "expedient_modules.id", "=", "medical_services.expedient_module_id")
       //                  ->join("services", "medical_services.service_id", "=", "services.id")
       //                  ->join("vendors", "services.vendor_id", "=", "vendors.id")
       //                  ->join("addresses", "addresses.id", "=", "vendors.address_id")
       //                  ->join("locations", "locations.id", "=", "addresses.location_id")
       //                 ->select("locations.latitude, locations.longitude, locations.name")
       //                 ->groupBy("locations.id,locations.latitude, locations.longitude")
       //                 // ->orderby("locations.name","ASC")
       //                 // ->havingRaw("count > 0")
       //                 ->get();










        if(Auth::user()->hasRole("Auditor")){
          $personid = Auth::user()->person->id;
          $auditor = Auditor::where("person_id","=",$personid)->get()->first();
          $userAuditsCount = $auditor->numberOfFinalAudits();
          $userPendingAuditsCount = $auditor->numberOfPendingAudits();

        }else {
          $userAuditsCount = Audit::all()->count();
        }

      return view("home",compact("amountOfAudits","userAuditsCount","userPendingAuditsCount","auditsByLocation"));//,"auditsByStatus","auditsByGender"));
    }
}
