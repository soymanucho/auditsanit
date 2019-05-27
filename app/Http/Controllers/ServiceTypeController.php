<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceType;

class ServiceTypeController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }

    public function show()
    {
      $serviceTypes = ServiceType::all();

      return view('serviceTypes.serviceTypes',compact('serviceTypes'));
    }
    public function delete(ServiceType $serviceType)
    {
      $serviceType->delete();
      return redirect()->back();
    }
    public function new()
    {
      $serviceType = New ServiceType();
      return view('serviceTypes.newServiceType',compact('serviceType'));
    }
    public function save(Request $request)
    {

      $this->validate(
        $request,
        [
            'name' => 'required|max:60',
            'is_transport_service' => 'required|boolean',

        ],
        [
        ],
        [
            'name' => 'nombre',
            'is_transport_service' => 'es transporte',

        ]
    );
    $serviceType = new ServiceType;
    $serviceType->fill($request->all());
    $serviceType->save();
    return redirect()->route('show-serviceType');
    }
    public function edit(ServiceType $serviceType)
    {
      return view('serviceTypes.editServiceType',compact('serviceType'));
    }
    public function update(ServiceType $serviceType, Request $request)
    {
      $this->validate(
        $request,
        [
            'name' => 'required|max:60',
            'is_transport_service' => 'required|boolean',

        ],
        [
        ],
        [
            'name' => 'nombre',
            'is_transport_service' => 'es transporte',

        ]
    );
    $serviceType->fill($request->all());
    $serviceType->save();
    return redirect()->route('show-serviceType');
    }
}
