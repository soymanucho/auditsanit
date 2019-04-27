<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objective;

class ObjectiveController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  
  public function show()
  {
    $objectives = Objective::all();
    return view('objectives.objectives',compact('objectives'));
  }

  public function delete(Objective $objective)
  {
    $objective->delete();
    return redirect()->back();
  }
  public function new()
  {
    $objective = New Objective();
    return view('objectives.newObjective',compact('objective'));
  }
  public function save(Request $request)
  {
    $objective = New Objective();
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
  $objective = new Objective;
  $objective->fill($request->all());
  $objective->save();
  return redirect()->route('show-objectives');
  }
  public function edit(Objective $objective)
  {
    return view('objectives.editObjective',compact('objective'));
  }
  public function update(Objective $objective, Request $request)
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
  $objective->fill($request->all());
  $objective->save();
  return redirect()->route('show-objectives');
  }
}
