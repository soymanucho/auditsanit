<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModuleCategory;
class ModueleCategoryController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function show()
  {
    $modulecategories = ModuleCategory::all();
    return view('modulecategories.modulecategories',compact('modulecategories'));
  }
  public function new()
  {
    $modulecategory = New ModuleCategory();
    return view('modulecategories.newModuleCategory',compact('modulecategory'));
  }
  public function save(Request $request)
  {
    $modulecategory = New ModuleCategory();
    $this->validate(
      $request,
      [
          'name' => 'required|max:60',

      ],
      [
      ],
      [
          'name' => 'nombre',

      ]
  );

  $modulecategory->fill($request->all());
  $modulecategory->save();
  return redirect()->route('show-modulecategories');
  }

  public function edit(ModuleCategory $modulecategory)
  {
    return view('modulecategories.editModuleCategory',compact('modulecategory'));
  }
  public function update(ModuleCategory $modulecategory, Request $request)
  {
    $this->validate(
      $request,
      [
          'name' => 'required|max:60',

      ],
      [
      ],
      [
          'name' => 'nombre',
      ]
  );
  $modulecategory->fill($request->all());
  $modulecategory->save();
  return redirect()->route('show-modulecategories');
  }

  public function delete(ModuleCategory $modulecategory)
  {
    $modulecategory->delete();
    return redirect()->back();
  }
}
