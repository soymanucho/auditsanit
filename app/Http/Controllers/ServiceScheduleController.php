<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MedicalService;

class ServiceScheduleController extends Controller
{
    public function create(MedicalService $medicalService)
    {
        $services = collect();
        $services->add($medicalService->service);
        $services->add($medicalService->transportService->service);

        return view('serviceSchedule.newServiceSchedule',compact('medicalService','services'));
    }
}
