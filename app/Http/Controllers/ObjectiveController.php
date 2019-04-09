<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objetive;

class ObjectiveController extends Controller
{
  public function show()
  {
    $objectives = Objetive::all();
    return view('objectives.objectives',compact('objectives'));
  }
}
