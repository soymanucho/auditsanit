<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModuleType;
class ModueTypeController extends Controller
{
  public function show()
  {
    $moduletypes = ModuleType::all();
    return view('moduletypes.moduletypes',compact('moduletypes'));
  }
}
