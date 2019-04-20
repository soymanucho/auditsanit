<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AuditorExport;
use App\Auditor;
class AuditorController extends Controller
{
  public function show()
  {
    //dd(Auditor::first()->numberOfTotalAudits());

    $auditors = Auditor::all();
    return view('auditors.auditors',compact('auditors'));
  }
  public function export()
  {
      return Excel::download(new AuditorExport, 'auditores.xlsx');
  }
}
