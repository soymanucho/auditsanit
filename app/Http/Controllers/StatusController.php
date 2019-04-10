<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
class StatusController extends Controller
{
  public function show()
  {
    $statuses = Status::all();
    return view('statuses.statuses',compact('statuses'));
  }
}
