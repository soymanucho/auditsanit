<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use App\ModuleType;
use App\ModuleCategory;
class ModueleController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  
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

  

  public function new(ModuleType $moduleType, ModuleCategory $moduleCategory)
  {
    $module = new Module();
    $module->module_type_id = $moduleType->id;
    $module->module_category_id = $moduleCategory->id;
    $module->price = 0;
      return view('modules.newModule',compact('module'));
  }

  public function save(ModuleType $moduleType, ModuleCategory $moduleCategory,Request $request)
  {
    $module = new Module();
    $module->module_type_id = $moduleType->id;
    $module->module_category_id = $moduleCategory->id;
    $this->validate(
      $request,
      [
          'price' => 'required|numeric|min:0',

      ],
      [
      ],
      [
          'price' => 'precio',
      ]
  );
  $module->fill($request->all());
  $module->save();
  return redirect()->route('show-module');
  }

  public function edit(ModuleType $moduleType, ModuleCategory $moduleCategory)
  {
    $module = Module::where('module_type_id',$moduleType->id)->where('module_category_id',$moduleCategory->id)->first();
    return view('modules.editModule',compact('module'));
  }

  public function update(ModuleType $moduleType, ModuleCategory $moduleCategory,Request $request)
  {
    $module = Module::where('module_type_id',$moduleType->id)->where('module_category_id',$moduleCategory->id)->first();
    $this->validate(
      $request,
      [
          'price' => 'required|numeric|min:0',

      ],
      [
      ],
      [
          'price' => 'precio',
      ]
  );
  $module->fill($request->all());
  $module->save();
  return redirect()->route('show-module');
  }
}
