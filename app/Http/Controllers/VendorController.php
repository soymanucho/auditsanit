<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use App\Location;
use App\Province;
use App\Address;
use App\VendorType;

class VendorController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function show()
  {
    $vendors = Vendor::all()->except(1);
    return view('vendors.vendors',compact('vendors'));
  }
  public function delete(Vendor $vendor)
  {
    $vendor->delete();
    return redirect()->back();
  }
  public function new()
  {
    $vendor = New Vendor();
    $address = New Address;
    $location = New Location;
    $province = New Province;
    $location->province()->associate($province);
    $address->location()->associate($location);

    $vendor->address()->associate($address);

    // $locations = Location::all();
    $provinces = Province::with('locations')->get();
    $vendorTypes = VendorType::all();
    return view('vendors.newVendor',compact('vendor','provinces','vendorTypes'));
  }
  public function save(Request $request)
  {
    $this->validate(
      $request,
      [
          'name' => 'required|max:100',
          'snr_category' => 'required|max:100',
          'jury_person' => 'required',
          'number'=>'required|integer',
          'street'=>'required',
          'floor'=>'required',
          'province_id'=>'required|exists:provinces,id',
          'location_id'=>'required|exists:locations,id',
          'vendor_type_id' => 'required|exists:vendor_types,id',
      ],
      [
      ],
      [
          'name' => 'nombre',
          'snr_category' => 'categoria snr',
          'jury_person' => 'persona juridica',
          'number'=>'numero',
          'street'=>'calle',
          'floor'=>'piso',
          'province_id'=>'provincia',
          'location_id'=>'localidad',
          'vendor_type_id' => 'tipo de prestador',
      ]
  );

  $address = new Address;
  $address->street = $request->street;
  $address->floor = $request->floor;
  $address->number = $request->number;
  $address->location_id = $request->location_id;
  $address->save();
  $vendor = new Vendor;
  $vendor->fill($request->all());
  $vendor->address_id = $address->id;
  $vendor->save();

  return redirect()->route('show-vendors');
  }
  public function edit(Vendor $vendor)
  {
    // $locations = Location::all();
    $provinces = Province::with('locations')->get();
    $vendorTypes = VendorType::all();
    return view('vendors.editVendor',compact('vendor','provinces','vendorTypes'));
  }
  public function update(Vendor $vendor, Request $request)
  {
    $this->validate(
      $request,
      [
        'name' => 'required|max:100',
        'snr_category' => 'required|max:100',
        'jury_person' => 'required',
        'number'=>'required|integer',
        'street'=>'required',
        'floor'=>'required',
        'province_id'=>'required|exists:provinces,id',
        'location_id'=>'required|exists:locations,id',
        'vendor_type_id' => 'required|exists:vendor_types,id',
      ],
      [
      ],
      [
        'name' => 'nombre',
        'snr_category' => 'categoria snr',
        'jury_person' => 'persona juridica',
        'number'=>'numero',
        'street'=>'calle',
        'floor'=>'piso',
        'province_id'=>'provincia',
        'location_id'=>'localidad',
        'vendor_type_id' => 'tipo de prestador',
      ]
  );
  $address = Address::where('id',$vendor->address_id)->firstOrCreate(['street'=>$request->street,'floor'=>$request->floor,'number'=>$request->number,'location_id'=>$request->location_id,]);

  $address->save();
  $vendor->fill($request->all());
  $vendor->save();
  return redirect()->route('show-vendors');
  }
}
