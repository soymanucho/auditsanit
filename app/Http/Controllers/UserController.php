<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Person;
use App\Gender;
use App\Location;
use App\Address;
use App\Province;

use Illuminate\Http\Request;

class UserController extends Controller
{
  public function edit()
  {
    $user = Auth::user();
    $genders = Gender::all();
    $locations = Location::all();
    $provinces = Province::all();
    return view('user.profile',compact('user','genders','locations','provinces'));
  }
  public function save(Request $request)
  {
    $this->validate(
      $request,
      [
          'name' => 'required|string|max:100',
          'surname' => 'required|string|max:100',
          'dni'     => 'required|string|max:10',
          'birthdate' => 'date|before:today',
          'email' => 'required|email|max:50',
          'profesion' => 'string|max:100',
          'matricula' => 'string|max:100',
          'tipoMatricula' => 'required', Rule::in(['nacional', 'provincial']),
          'cargo' => 'string|max:100',
          'telTrabajoInterno' => 'integer',
          'celular' => 'integer',
          'street' => 'string|max:100',
          'number' => 'string|max:10',
          'floor' => 'string|max:10',
          'location_id' => 'exists:locations,id',
          'province_id' => 'exists:provinces,id',
          'gender_id' => 'exists:genders,id',
          'password' => 'required|string|min:8',
          'rpassword' => 'required|string|min:8',
      ],
      [
      ],
      [
        'name' => 'nombre',
        'surname' => 'apellido',
        'dni'     => 'DNI',
        'birthdate' => 'fecha de nacimiento',
        'email' => 'email',
        'profesion' => 'profesión',
        'matricula' => 'matrícula',
        'tipoMatricula' => 'tipo de matrícula',
        'cargo' => 'cargo',
        'telTrabajoInterno' => 'teléfono laboral',
        'celular' => 'celular',
        'street' => 'calle',
        'number' => 'número',
        'floor' => 'piso',
        'location_id' => 'localidad',
        'province_id' => 'provincia',
        'gender_id' => 'género',
        'password' => 'contraseña',
        'rpassword' => 'repetir contraseña',
      ]
  );

  $address = New Address;
  $address->street = $request->street;
  $address->number = $request->number;
  $address->floor = $request->floor;
  $address->location_id = $request->location_id;
  $address->update();

  // $person = Person::firstOrCreate('dni',$request->dni);
  $person = New Person;

  $person->fill($request->all());
  $person->address_id = $address->id;
  $person->gender_id = $request->gender_id;
  // $person->name = $request->name;
  // $person->surname = $request->surname;
  // $person->dni = $request->dni;
  // $person->birthdate = $request->birthdate;
  // $person->gender_id = $request->gender_id;
  // $person->profesion = $request->profesion;
  // $person->matricula = $request->matricula;
  // $person->cargo = $request->cargo;
  // $person->telTrabajoInterno = $request->telTrabajoInterno;
  // $person->celular = $request->celular;
  // $person->address_id = $address->id;
  $person->update();

  $user = Auth::user();
  $user->person_id = $person->id;
  $user->email = $request->email;
  $user->name = $request->name;
  $user->password = Hash::make($request->password);
  $user->update();

  return redirect()->route('home');
  }

}
