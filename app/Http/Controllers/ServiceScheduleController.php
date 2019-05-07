<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedicalService;
use App\ServiceSchedule;

class ServiceScheduleController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

    public function delete(ServiceSchedule $serviceSchedule)
    {
      $serviceSchedule->delete();
      return redirect()->back();
    }

    public function create(MedicalService $medicalService)
    {
        $services = collect();
        $services->add($medicalService->service);
        if($medicalService->transportService){ //puede que no tenga transporte
          $services->add($medicalService->transportService->service);
        }


        return view('serviceSchedule.newServiceSchedule',compact('medicalService','services'));
    }


    public function save(Request $request, MedicalService $medicalService)
    {


        $this->validate(
           $request,
           [
                'service_id' => 'required|exists:services,id',
                'initial_datetime' => 'required|date',
                'final_datetime' => 'required|date|after:initial_datetime',
           ],
           [
           ],
           [
             'service_id' => 'servicio',
             'initial_datetime' => 'desde',
             'final_datetime' => 'hasta',
           ]
       );

      $serviceSchedule = new ServiceSchedule();
      $serviceSchedule->fill($request->all());
      $serviceSchedule->save();




      return response($request, 200)
      ->header('Content-Type', 'text/plain');
    }
}
