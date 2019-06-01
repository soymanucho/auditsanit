<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DiagnosisType;
class DiagnosisTypeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function get(Request $request)
  {

    $term = trim($request->q);

        if (empty($term)) {
            return \Response::json([]);
        }

        $tags = DiagnosisType::search($term)->limit(5)->get();

        $formatted_tags = [];

        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->name];
        }

        return \Response::json($formatted_tags);
  }

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
          'name' => 'required|max:1000',
          'code' => 'max:60',
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
          'name' => 'required|max:1000',
          'code' => 'max:60',
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
