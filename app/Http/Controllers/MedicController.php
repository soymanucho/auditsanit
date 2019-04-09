<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medic;

class MedicController extends Controller
{
  public function show()
  {
    $medics = Medic::all();
    return view('medics.medics',compact('medics'));
  }
}
