<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
class PatientController extends Controller
{
  public function show()
  {
    $patients = Patient::all();
    return view('patients.patients',compact('patients'));
  }
}
