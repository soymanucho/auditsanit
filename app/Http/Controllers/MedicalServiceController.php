<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExpedientModule;
use App\Auditor;
use App\Vendor;
use App\ServiceType;
use App\Service;
use App\MedicalService;
use App\TransportService;

class MedicalServiceController extends Controller
{
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
        $transportService->km_per_month = 0;
        $transportService->save();
        $medicalService->transport_service_id = $transportService->id; //aca puede que sea el id de transserver not sure...
        $medicalService->save();
     }

     $medicalService->save();
     return response($request, 200)
     ->header('Content-Type', 'text/plain');
    }
}
