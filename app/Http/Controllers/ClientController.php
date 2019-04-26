<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
  public function show()
  {
    $clients = Client::all();
    return view('clients.clients',compact('clients'));
  }
  public function delete(Client $client)
  {
    $client->delete();
    return redirect()->back();
  }
  public function new()
  {
    $client = New Client();
    return view('clients.newClient',compact('client'));
  }
  public function save(Request $request)
  {
    $client = New Client();
    $this->validate(
      $request,
      [
          'companyName' => 'required|max:60',
      ],
      [
      ],
      [
          'companyName' => 'nombre',
      ]
  );
  $client = new Client;
  $client->fill($request->all());
  $client->save();
  return redirect()->route('show-clients');
  }
  public function edit(Client $client)
  {
    return view('clients.editClient',compact('client'));
  }
  public function update(Client $client, Request $request)
  {
    $this->validate(
      $request,
      [
          'companyName' => 'required|max:60',
      ],
      [
      ],
      [
          'companyName' => 'nombre',
      ]
  );
  $client->fill($request->all());
  $client->save();
  return redirect()->route('show-clients');
  }
}
