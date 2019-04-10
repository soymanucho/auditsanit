<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModuleCategory;
class ModueleCategoryController extends Controller
{
  public function show()
  {
    $modulecategories = ModuleCategory::all();
    return view('modulecategories.modulecategories',compact('modulecategories'));
  }
}
