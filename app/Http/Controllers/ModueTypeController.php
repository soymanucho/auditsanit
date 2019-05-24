<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModuleType;
class ModueTypeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function show()
  {
    $moduletypes = ModuleType::all();
    return view('moduletypes.moduletypes',compact('moduletypes'));
  }

  public function new()
  {
    $moduleType = New ModuleType();
    return view('moduletypes.newModuleType',compact('moduleType'));
  }

  public function save(Request $request)
  {
    $moduleType = New ModuleType();
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

  $moduleType->fill($request->all());
  $moduleType->save();
  return redirect()->route('show-moduletypes');
  }

  public function edit(ModuleType $moduleType)
  {
    return view('moduletypes.editModuleType',compact('moduleType'));
  }
  public function update(ModuleType $moduleType, Request $request)
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
  $moduleType->fill($request->all());
  $moduleType->save();
  return redirect()->route('show-moduletypes');
  }

  public function delete(ModuleType $moduleType)
  {
    $moduleType->delete();
    return redirect()->back();
  }
}
