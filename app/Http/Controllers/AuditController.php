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
  public function detailPatient(Audit $audit)
  {
    return view('audits.auditDetailPatient',compact('audit'));
  }
  public function detailExpedient(Audit $audit)
  {
    return view('audits.auditDetailExpedient',compact('audit'));
  }
  public function detailResult(Audit $audit)
  {
    return view('audits.auditDetailResult',compact('audit'));
  }
  public function detailHistory(Audit $audit)
  {
    return view('audits.auditDetailHistory',compact('audit'));
  }
  public function export()
  {
      return Excel::download(new AuditExport, 'auditorias.xlsx');
  }
}
