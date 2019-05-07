<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Province;
use App\Location;

class LocationController extends Controller
{
  public function get()
  {
    $locations = Location::orderBy('province_id')->get();
    $locations->pluck('id','name');
    return $locations->toJson();
  }
}
