<?php

namespace App\Exports;

use App\Audit;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromCollection;

class AuditExport implements FromView
{

  public function view(): View
  {
      return view('audits.datatable', [
          'audits' => Audit::all()
      ]);
  }
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Audit::all();
    // }
}
