<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use App\Location;
use App\Province;
use App\Address;

class VendorController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function show()
  {
    $vendors = Vendor::all();
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

    $locations = Location::all();
    $provinces = Province::all();
    return view('vendors.newVendor',compact('vendor','provinces','locations'));
  }
  public function save(Request $request)
  {
    $vendor = New Vendor();
    $this->validate(
      $request,
      [
          'name' => 'required|max:60',
      ],
      [
      ],
      [
          'name' => 'nombre',
      ]
  );
  $vendor = new Vendor;
  $vendor->fill($request->all());
  $vendor->save();
  return redirect()->route('show-vendors');
  }
  public function edit(Vendor $vendor)
  {
    $locations = Location::all();
    $provinces = Province::all();
    return view('vendors.editVendor',compact('vendor','provinces','locations'));
  }
  public function update(Vendor $vendor, Request $request)
  {
    $this->validate(
      $request,
      [
          'name' => 'required|max:60',
      ],
      [
      ],
      [
          'name' => 'nombre',
      ]
  );
  $vendor->fill($request->all());
  $vendor->save();
  return redirect()->route('show-vendors');
  }
}
