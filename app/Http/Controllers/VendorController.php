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
          'name' => 'required|max:60',
          'vendor_type_id' => 'required|exists:vendor_types,id',
      ],
      [
      ],
      [
          'name' => 'nombre',
          'vendor_type_id' => 'tipo de prestador',
      ]
  );
  $vendor = new Vendor;
  $vendor->fill($request->all());
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
          'name' => 'required|max:60',
          'vendor_type_id' => 'required|exists:vendor_types,id',
      ],
      [
      ],
      [
          'name' => 'nombre',
          'vendor_type_id' => 'tipo de prestador',
      ]
  );
  $vendor->fill($request->all());
  $vendor->save();
  return redirect()->route('show-vendors');
  }
}
