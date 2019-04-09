<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auditor;
class AuditorController extends Controller
{
  public function show()
  {
    $auditors = Auditor::all();
    return view('auditors.auditors',compact('auditors'));
  }
}
