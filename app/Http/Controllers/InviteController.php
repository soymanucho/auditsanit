<?php

namespace App\Http\Controllers;
use App\Invite;
use App\User;
use App\Client;
use App\Mail\InviteCreated;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class InviteController extends Controller
{
  public function __construct()
  {
    // $this->middleware('auth');
    $this->middleware('auth', [
        'except' => ['accept']
        // 'only' => ['show']
    ]); // OTHERS EXAMPLES
  }

  public function invite()
  {
    $roles = Role::all();
    $clients = Client::all();
    return view('invites.invite',compact('roles','clients'));
  }

  public function process(Request $request)
  {
    // validate the incoming request data
    $this->validate(
      $request,
      [
      'email'=>'required|email|unique:users,email|unique:invites,email',
      'role_id'=>'required|exists:roles,id',
      'name'=>'required|max:100',
      'surname'=>'required|max:100',
      'dni'=>'required',
      ]
    ,[]
    ,[
      'email'=>'correo electrónico',
      'role_id'=>'rol',
      'name'=>'nombre',
      'surname'=>'apellido',
      'dni'=>'dni',
    ]);
    //dd($request);
    do {
        //generate a random string using Laravel's str_random helper
        $token = str_random();
    } //check if the token already exists and if it does, try again
    while (Invite::where('token', $token)->first());

    //create a new invite record
    $invite = Invite::create([
        'email' => $request->get('email'),
        'token' => $token,
        'role_id' => $request->get('role_id'),
        'client_id' => $request->get('client_id'),
        'name' => $request->get('name'),
        'surname' => $request->get('surname'),
        'dni' => $request->get('dni'),
    ]);

    // send the email
    Mail::to($request->get('email'))->send(new InviteCreated($invite));

    // redirect back where we came from
    return redirect()
        ->back();
  }

  public function accept($token)
  {
    // Look up the invite
    if (!$invite = Invite::where('token', $token)->first()) {
        //if the invite doesn't exist do something more graceful than this
        abort(404);
    }else{
      // $invite->delete();
      return redirect()->route('register');
    }

    // create the user with the details from the invite
    // User::create(['email' => $invite->email,'name'=>'Invitado']);

    // delete the invite so it can't be used again


    // here you would probably log the user in and show them the dashboard, but we'll just prove it worked

  }
}
