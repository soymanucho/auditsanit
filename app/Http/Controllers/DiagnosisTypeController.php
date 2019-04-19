<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DiagnosisType;
class DiagnosisTypeController extends Controller
{
  public function show()
  {
    $diagnosisTypes = DiagnosisType::all();

    return view('diagnosisTypes.diagnosisTypes',compact('diagnosisTypes'));
  }
  public function delete(DiagnosisType $diagnosisType)
  {
    $diagnosisType->delete();
    return redirect()->back();
  }
  public function new()
  {
    $diagnosisType = New DiagnosisType();
    return view('diagnosisTypes.newDiagnosisType',compact('diagnosisType'));
  }
  public function save(Request $request)
  {

    $this->validate(
      $request,
      [
          'name' => 'required|max:60',
          'code' => 'required|max:60',
      ],
      [
      ],
      [
          'name' => 'nombre',
          'code' => 'codigo',
      ]
  );
  $diagnosisType = new DiagnosisType;
  $diagnosisType->fill($request->all());
  $diagnosisType->save();
  return redirect()->route('show-diagnosisType');
  }
  public function edit(DiagnosisType $diagnosisType)
  {
    return view('diagnosisTypes.editDiagnosisType',compact('diagnosisType'));
  }
  public function update(DiagnosisType $diagnosisType, Request $request)
  {
    $this->validate(
      $request,
      [
          'name' => 'required|max:60',
          'code' => 'required|max:60',
      ],
      [
      ],
      [
          'name' => 'nombre',
          'code' => 'codigo',
      ]
  );
  $diagnosisType->fill($request->all());
  $diagnosisType->save();
  return redirect()->route('show-diagnosisType');
  }
}
