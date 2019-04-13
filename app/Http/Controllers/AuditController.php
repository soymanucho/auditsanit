<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AuditExport;
use App\Audit;

class AuditController extends Controller
{
  public function show()
  {
    $audits = Audit::all();
    return view('audits.audits',compact('audits'));
  }
  public function detail(Audit $audit)
  {
    return view('audits.audit',compact('audit'));
  }
  public function export()
  {
      return Excel::download(new AuditExport, 'auditorias.xlsx');
  }
}
