<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MedicExport;
use App\Medic;

class MedicController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  
  public function show()
  {
    $medics = Medic::all();
    return view('medics.medics',compact('medics'));
  }
  public function export()
  {
      return Excel::download(new MedicExport, 'medicos.xlsx');
  }
}
