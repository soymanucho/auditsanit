<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use App\ModuleType;
use App\ModuleCategory;
class ModueleController extends Controller
{
  public function show()
  {
    $modules = Module::all();

    $matrix = [];

    $moduleTypes = ModuleType::all();
    $moduleCategories = ModuleCategory::all();

    foreach ($moduleTypes as $moduleType) {
      $matrix[$moduleType->id]=[];
    }

    foreach ($modules as $module) {
        $matrix[$module->module_type_id][$module->module_category_id]= $module->price;
    }

    return view('modules.modules',compact('modules','moduleTypes','moduleCategories','matrix'));
  }
}
