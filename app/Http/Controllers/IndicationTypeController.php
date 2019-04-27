<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\IndicationType;
class IndicationTypeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  
  public function show()
  {
    $indicationTypes = IndicationType::all();

    return view('indicationTypes.indicationTypes',compact('indicationTypes'));
  }
  public function delete(IndicationType $indicationType)
  {
    $indicationType->delete();
    return redirect()->back();
  }
  public function new()
  {
    $indicationType = New IndicationType();
    return view('indicationTypes.newIndicationType',compact('indicationType'));
  }
  public function save(Request $request)
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
  $indicationType = new IndicationType;
  $indicationType->fill($request->all());
  $indicationType->save();
  return redirect()->route('show-indicationType');
  }
  public function edit(IndicationType $indicationType)
  {
    return view('indicationTypes.editIndicationType',compact('indicationType'));
  }
  public function update(IndicationType $indicationType, Request $request)
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
  $indicationType->fill($request->all());
  $indicationType->save();
  return redirect()->route('show-indicationType');
  }
}
