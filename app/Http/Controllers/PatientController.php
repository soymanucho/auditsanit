<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PatientExport;
use App\Patient;
use App\Gender;
use App\Province;
use App\Location;
use App\Address;
use App\Person;
class PatientController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function show()
  {
    $patients = Patient::orderBy('created_at','DESC')->with('person')->get()->except(1);
    return view('patients.patients',compact('patients'));
  }
  public function new()
  {
    $patient = New Patient;

    $person = New Person;
    $address = New Address;
    $location = New Location;
    $province = New Province;
    $location->province()->associate($province);
    $address->location()->associate($location);
    $person->address()->associate($address);
    $patient->person()->associate($person);

    $genders = Gender::all();
    $provinces = Province::with('locations')->get();
    // $locations = Location::all();
    return view('patients.newPatient',compact('patient','genders','provinces'));
  }

  public function save(Request $request)
  {
    $this->validate(
        $request,
        [
            'name' => 'string|max:100|required',
            'surname' => 'string|max:100|required',
            'dni'     => 'string|max:10|required',
            'birthdate' => 'date|before:today|nullable',
            'street' => 'string|max:100|nullable',
            'number' => 'string|max:100|nullable',
            'floor' => 'string|max:100|nullable',
            'location_id' => 'exists:locations,id|nullable',
            'province_id' => 'exists:provinces,id|nullable',
            'gender_id' => 'exists:genders,id|nullable',
        ],
        [
        ],
        [
          'name' => 'nombre',
          'client_id' => 'obra social',
          'surname' => 'apellido',
          'dni'     => 'DNI',
          'birthdate' => 'fecha de nacimiento',
          'street' => 'calle',
          'number' => 'número',
          'floor' => 'piso',
          'location_id' => 'localidad',
          'province_id' => 'provincia',
          'gender_id' => 'género',
        ]
    );

    $address = New Address;
    $address->street = $request->street;
    $address->number = $request->number;
    $address->floor = $request->floor;

    $address->location_id = $request->location_id;

    $address->save();

    $person = New Person;

    $person->address_id = $address->id;

    $person->gender_id = $request->gender_id;
    $person->name = $request->name;
    $person->surname = $request->surname;
    $person->dni = $request->dni;
    $person->birthdate = $request->birthdate;
    $person->save();

    $patient = New Patient;

    $patient->person_id = $person->id;

    $patient->save();
    return redirect()->route('show-patients');
  }

  public function edit(Patient $patient)
  {
    $genders = Gender::all();
    $provinces = Province::all();
    $locations = Location::all();
    return view('patients.editPatient',compact('patient','genders','provinces','locations'));
  }
  public function update(Patient $patient, Request $request)
  {
    // $patient = Patient::where('id',$patient->id)->firstOrFail();

    $this->validate(
        $request,
        [
            'name' => 'string|max:100|required',
            'surname' => 'string|max:100|required',
            'dni'     => 'string|max:10|required',
            'birthdate' => 'date|before:today|nullable',
            'street' => 'string|max:100|nullable',
            'number' => 'string|max:100|nullable',
            'floor' => 'string|max:100|nullable',
            'location_id' => 'exists:locations,id|nullable',
            'province_id' => 'exists:provinces,id|nullable',
            'gender_id' => 'exists:genders,id|nullable',
        ],
        [
        ],
        [
          'name' => 'nombre',
          'client_id' => 'obra social',
          'surname' => 'apellido',
          'dni'     => 'DNI',
          'birthdate' => 'fecha de nacimiento',
          'street' => 'calle',
          'number' => 'número',
          'floor' => 'piso',
          'location_id' => 'localidad',
          'province_id' => 'provincia',
          'gender_id' => 'género',
        ]
    );


    $patient->person->address->street = $request->street;
    $patient->person->address->number = $request->number;
    $patient->person->address->floor = $request->floor;

    $patient->person->address->location_id = $request->location_id;

    // $province =
    $patient->person->address->save();

    $patient->person->gender_id = $request->gender_id;
    $patient->person->name = $request->name;
    $patient->person->surname = $request->surname;
    $patient->person->dni = $request->dni;
    $patient->person->birthdate = $request->birthdate;
    $patient->person->save();

    return redirect()->route('show-patients');
  }

  public function export()
  {
      return Excel::download(new PatientExport, 'pacientes.xlsx');
  }

}
