<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PatientExport;
use App\Patient;
class PatientController extends Controller
{
  public function show()
  {
    $patients = Patient::all();
    return view('patients.patients',compact('patients'));
  }

  public function export()
  {
      return Excel::download(new PatientExport, 'pacientes.xlsx');
  }

}
