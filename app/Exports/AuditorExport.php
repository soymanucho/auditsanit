<?php

namespace App\Exports;

use App\Auditor;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromCollection;

class AuditorExport implements FromView
{

  public function view(): View
  {
      return view('auditors.datatable', [
          'auditors' => Auditor::all()
      ]);
  }
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Auditor::all();
    // }
}
