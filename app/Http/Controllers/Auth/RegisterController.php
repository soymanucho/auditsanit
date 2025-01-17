<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Spatie\Permission\Models\Role;
use App\Invite;
use App\Auditor;
use App\User;
use App\Person;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    protected $role;
    protected $name;
    protected $surname;
    protected $dni;
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/perfil';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

      $validate = Validator::make($data, [
          //'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'exists:invites,email'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
      ]);
        return $validate;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      $user = User::create([
        //  'name' => $data['name'],
          'email' => $data['email'],
          'password' => Hash::make($data['password']),
      ]);
      $invite = Invite::where('email',$data['email'])->first();
      $this->role = Role::where('id',$invite->role_id)->first();
      $this->name = $invite->name;
      $this->surname = $invite->surname;
      $this->dni = $invite->dni;
      $invite->delete();
      if($invite->client_id){
        $user->clients()->sync($invite->client_id);
      }
      $person = new Person;
      $person->name = $this->name;
      $person->surname = $this->surname;
      $person->dni = $this->dni;
      $person->save();
      $user->person_id = $person->id;
      $user->syncRoles($this->role);
      // dd($this->role);
      return $user;
    }
}
