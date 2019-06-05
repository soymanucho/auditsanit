<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Audit;
use App\Status;

class AuditStatusController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function edit()
  {
    $audits = Audit::orderBy('id', 'DESC')->get();
    $statuses = Status::orderBy('name', 'ASC')->get();
    return view('auditStatus.editAuditStatus',compact('audits','statuses'));
  }

  public function update(Request $request)
  {
    $this->validate(
      $request,
      [
          'audit_id' => 'required|exists:audits,id',
          'status_id' => 'required|exists:statuses,id',
      ],
      [
      ],
      [
        'audit_id' => 'Auditoria',
        'status_id' => 'Estado',
      ]
  );

  $audit = Audit::findOrFail($request->audit_id);
  $status = Status::findOrFail($request->status_id);
  $audit->statuses()->attach($status);

    return redirect()->route('show-audits');
  }
}
