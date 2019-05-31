<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use App\Notifications\ServiceAssigned;
use App\Notifications\AcceptMedicalService;
use App\Notifications\DeclineMedicalService;
use Barryvdh\Debugbar\Facade as Debugbar;
use App\ExpedientModule;
use App\Auditor;
use App\Vendor;
use App\ServiceType;
use App\Service;
use App\MedicalService;
use App\TransportService;
use App\User;


class MedicalServiceController extends Controller
{

  public function accept(MedicalService $medicalService)
  {
  $medicalService->status_id = 2;
  $medicalService->save();

  Notification::route('mail', 'auditoriasanitaria@gmail.com')->notify(new AcceptMedicalService($medicalService->auditor,$medicalService->expedientModule->expedient->audit));

  $coordinators = User::role('Coordinador')->get();
  $coordinators->each->notify(new AcceptMedicalService($medicalService->auditor,$medicalService->expedientModule->expedient->audit));
  return redirect()->back();
  }

  public function decline(MedicalService $medicalService)
  {
    $medicalService->status_id = 3;
    $medicalService->save();
    Notification::route('mail', 'auditoriasanitaria@gmail.com')->notify(new DeclineMedicalService($medicalService->auditor,$medicalService->expedientModule->expedient->audit));
    $coordinators = User::role('Coordinador')->get();
    $coordinators->each->notify(new DeclineMedicalService($medicalService->auditor,$medicalService->expedientModule->expedient->audit));
    return redirect()->back();
  }

  public function myPendings()
  {
    $personid = Auth::user()->person->id;
    $auditor = Auditor::where('person_id','=',$personid)->get()->first();
    $medicalServices = $auditor->medicalServices()->where('status_id','=',1)->get();
    Debugbar::info($medicalServices);
    return view('medicalServices.auditorPendingMedicalServices',compact('medicalServices'));
  }
  public function new(ExpedientModule $moduleExpedient)
  {
    $auditors = Auditor::all();
    $medicalServiceTypes = ServiceType::where('is_transport_service','=','0')->get();
    $transportServiceTypes = ServiceType::where('is_transport_service','=','1')->get();
    $medicVendors = Vendor::where('vendor_type_id','=','1')->get();
    $transportVendors = Vendor::where('vendor_type_id','=','2')->get();
    return view('medicalServices.newMedicalService',compact('auditors','medicalServiceTypes','transportServiceTypes','medicVendors','transportVendors','moduleExpedient'));
  }

  public function delete(MedicalService $medicalService)
  {
    $medicalService->delete();
    return redirect()->back();
  }

  public function save(Request $request, ExpedientModule $moduleExpedient)
  {

    $this->validate(
       $request,
       [
            'auditor_id' => 'required|exists:auditors,id',
            'service_id' => 'required|exists:vendors,id',
            'medical_service_type_id' => 'required|exists:service_types,id',

       ],
       [
       ],
       [
         'auditor_id' => 'auditor',
         'service_id' => 'prestación',
         'transport_service_id' => 'transporte',
         'medical_service_type_id' => 'tipo de prestacion',
         'transport_service_type_id' => 'tipo de transporte',
         'km_per_month' => 'kilometros por mes',

       ]
   );

   //dd($request->transport_service_id!=null);
   $service = new Service();
   $service->vendor_id = $request->service_id;
   $service->service_type_id = $request->medical_service_type_id;
   $service->save();

   $medicalService = new MedicalService();
   $medicalService->expedient_module_id = $moduleExpedient->id;
   $medicalService->service_id = $service->id;
   $medicalService->auditor_id = $request->auditor_id;
   $medicalService->status_id = 1;

   if($request->transport_service_id!=null && $request->transport_service_id!=null)
   {
     $service2 =  $service = new Service();
      $service2->vendor_id = $request->transport_service_id;
      $service2->service_type_id = $request->transport_service_type_id;
      $service2->save();

      $transportService = new TransportService();
      $transportService->service_id = $service2->id;
      $transportService->km_per_month = $request->km_per_month;
      $transportService->save();
      $medicalService->transport_service_id = $transportService->id; //aca puede que sea el id de transserver not sure...
      $medicalService->save();
   }

   $medicalService->save();


   $medicalService->auditor->user->notify(new ServiceAssigned($medicalService->auditor->user));
   return response($request, 200)
   ->header('Content-Type', 'text/plain');
  }

  public function editAuditor(MedicalService $medicalService)
  {
    $auditors = Auditor::all();
      return view('medicalServices.reasignAuditor',compact('auditors','medicalService'));
  }

  public function updateAuditor(Request $request, MedicalService $medicalService)
  {


    $this->validate(
       $request,
       [
        'auditor_id' => 'required|exists:auditors,id',
       ],
       [
       ],
       [
         'auditor_id' => 'auditor',
       ]
   );
   $medicalService->auditor_id = $request->auditor_id;
   $medicalService->status_id = 1;
   $medicalService->save();
   $medicalService->auditor->user->notify(new ServiceAssigned($medicalService->auditor->user));
   return response($request, 200)
   ->header('Content-Type', 'text/plain');
  }
}
