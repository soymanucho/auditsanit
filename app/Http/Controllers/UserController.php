<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\User;
use App\Person;
use App\Gender;
use App\Location;
use App\Address;
use App\Client;
use App\Province;
use App\Auditor;

use Illuminate\Http\Request;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function show()
  {
    $users = User::all()->except(6);
    return view('user.users',compact('users'));
  }
  public function editRole(User $user)
  {
    $roles = Role::all();
    $clients = Client::all();
    return view('user.editRole',compact('user','roles','clients'));
  }
  public function updateRole(User $user,Request $request)
  {
    $user = User::where('id',$user->id)->first();
    $role = Role::where('id',$request->role_id)->first();
    if (!$role) {
      // code...
    }
    $user->syncRoles($role);
    if ($role->name == 'Auditor') {
      $auditor = new Auditor;
      $auditor->user_id = $user->id;
      $auditor->person_id = $user->person->id;
      $auditor->save();
    }
    $user->save();
    return redirect()->route('users-show');
  }
  public function detail()
  {
    $user = Auth::user();
    if (isset($user->person->id)) {
      $person = Person::firstOrCreate(['id'=>$user->person->id]);
    }else {
      $person = New Person;
      $address = New Address;
    }
    // $user->person()->attach($person->id);
    $genders = Gender::all();
    // $locations = Location::all();
    $provinces = Province::with('locations')->get();
    $function = "show";
    return view('user.profileShow',compact('user','genders','provinces','person','function'));
  }

  public function edit(User $user)
  {
    if (isset($user->person->id)) {
      $person = Person::firstOrCreate(['id'=>$user->person->id]);
    }else {
      $person = New Person;
      $address = New Address;
      $person->address()->associate($address);
    }
    // $user->person()->attach($person->id);
    $genders = Gender::all();
    //$locations = Location::all();
    $provinces = Province::with('locations')->get();
    $function = "edit";
    return view('user.profileEdit',compact('user','genders','provinces','person','function'));
  }

  public function update(User $user, Request $request)
  {
    $this->validate(
      $request,
      [
          'name' => 'required|string|max:100',
          'surname' => 'required|string|max:100',
          'dni'     => 'required|string|max:10',
          'birthdate' => 'date|before:today|nullable',
          'email' => 'required|email|max:50',
          'profesion' => 'string|max:100|nullable',

          // 'tipoMatricula' => 'required', Rule::in(['nacional', 'provincial']),
          'cargo' => 'string|max:100|nullable',
          'telTrabajoInterno' => 'integer|nullable',
          'intern' => 'integer|nullable',
          'celular' => 'integer|nullable',
          'street' => 'required|string|max:100',
          'number' => 'required|string|max:100',
          'floor' => 'string|max:100|nullable',
          'location_id' => 'exists:locations,id',
          'province_id' => 'exists:provinces,id',
          'gender_id' => 'exists:genders,id',
          'password' => 'min:8|required_with:rpassword|same:rpassword',
          'rpassword' => 'min:8',
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
        'intern' => 'intern',
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
  // $province =
  $address->save();

  // $person = Person::firstOrCreate('dni',$request->dni);
  $person = $user->person;
  if (!isset($person)) {
    $person = New Person;
  }
  // $person->fill($request->all());
  $person->address_id = $address->id;
  $person->gender_id = $request->gender_id;
  $person->name = $request->name;
  $person->surname = $request->surname;
  $person->dni = $request->dni;
  if ($request->tipoMatricula == 'nacional') {
    $person->nacional=true;
  }else {
    $person->nacional=false;
  }

  $person->birthdate = $request->birthdate;
  $person->profesion = $request->profesion;
  $person->matricula = $request->matricula;
  $person->cargo = $request->cargo;
  $person->telTrabajoInterno = $request->telTrabajoInterno;
  $person->intern = $request->intern;
  $person->celular = $request->celular;

  $person->save();


  $user->person_id = $person->id;
  $user->email = $request->email;
  //$user->name = $request->name;
  $user->password = Hash::make($request->password);
  $user->save();

  if ($user->getRoleNames()->contains('Auditor')) {
    $auditor = new Auditor();
    $auditor->user_id = $user->id;
    $auditor->person_id = $person->id;
    $auditor->save();
  }
  return redirect()->route('home');
  }


}
