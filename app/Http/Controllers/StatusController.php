<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
class StatusController extends Controller
{
  public function show()
  {
    $statuses = Status::all();
    return view('statuses.statuses',compact('statuses'));
  }

  public function new()
  {
    $status = New Status();
    return view('statuses.newStatus',compact('status'));
  }

  public function save(Request $request)
  {
    $status = New Status();
    $this->validate(
      $request,
      [
          'name' => 'required|max:60',
          'color' => 'required|max:7',
          'isFinal' => 'boolean',
      ],
      [
      ],
      [
          'name' => 'nombre',
          'color' => 'color',
          'isFinal' => 'es Final',
      ]
  );

  $status->fill($request->all());
  $status->save();
  return redirect()->route('show-status');
  }

  public function edit(Status $status)
  {
    return view('statuses.editStatus',compact('status'));
  }
  public function update(Status $status, Request $request)
  {
    $this->validate(
      $request,
      [
          'name' => 'required|max:60',
          'color' => 'required|max:7',
          'isFinal' => 'boolean',
      ],
      [
      ],
      [
          'name' => 'nombre',
          'color' => 'color',
          'isFinal' => 'es Final',
      ]
  );
  $status->fill($request->all());
  $status->save();
  return redirect()->route('show-status');
  }

  public function delete(Status $status)
  {
    $status->delete();
    return redirect()->back();
  }
}
