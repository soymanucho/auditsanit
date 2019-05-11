<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MedicExport;
use App\Medic;
use App\Person;

class MedicController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function show()
  {
    $medics = Medic::all();
    return view('medics.medics',compact('medics'));
  }
  public function export()
  {
      return Excel::download(new MedicExport, 'medicos.xlsx');
  }
  public function delete(Medic $medic)
  {
    $medic->delete();
    return redirect()->back();
  }
  public function new()
  {
    $medic = New Medic();
    $person = New Person();
    $medic->person()->associate($person);
    return view('medics.newMedic',compact('medic'));
  }
  public function save(Request $request)
  {
    $this->validate(
      $request,
      [
          'name' => 'required|max:60',
          'surname' => 'required|max:60',
          'dni' => 'required|string|max:10',
          'license' => 'required|string|max:60',
          'isNationalLicense' => 'required|boolean',
      ],
      [
      ],
      [
          'name' => 'nombre',
          'surname' => 'apellido',
          'dni' => 'dni',
          'license' => 'matrícula',
          'isNationalLicense' => 'tipo de matrícula',
      ]
  );
  $person = New Person();
  $person->name = $request->name;
  $person->surname = $request->surname;
  $person->dni = $request->dni;
  $person->save();


  $medic = new Medic;
  $medic->license = $request->license;
  $medic->isNationalLicense= $request->isNationalLicense;
  $medic->person_id = $person->id;
  $medic->person()->associate($person);

  $medic->save();
  // dd($medic);

  return redirect()->route('show-medics');
  }
  public function edit(Medic $medic)
  {
    return view('medics.editMedic',compact('medic'));
  }
  public function update(Medic $medic, Request $request)
  {
    $this->validate(
      $request,
      [
          'name' => 'required|max:60',
          'surname' => 'required|max:60',
          'dni' => 'required|string|max:10',
          'license' => 'required|string|max:60',
          'isNationalLicense' => 'required|boolean',
      ],
      [
      ],
      [
          'name' => 'nombre',
          'surname' => 'apellido',
          'dni' => 'dni',
          'license' => 'matrícula',
          'isNationalLicense' => 'tipo de matrícula',
      ]
  );
  $person = Person::where('id',$medic->person_id)->first();
  $person->name = $request->name;
  $person->surname = $request->surname;
  $person->dni = $request->dni;
  $person->save();

  $medic->license = $request->license;
  $medic->isNationalLicense= $request->isNationalLicense;
  // $medic->person_id = $person->id;
  // $medic->person()->associate($person);

  $medic->save();

  return redirect()->route('show-medics');
  }
}
