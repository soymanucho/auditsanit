<?php

namespace App\Exports;



use App\Audit;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithTitle;
// use Maatwebsite\Excel\Concerns\FromCollection;

class AuditIndicationsExport implements FromView, WithTitle
{

  public function view(): View
  {
    return view('audits.datatableExportIndications', [
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
    public function title(): string
    {
        return 'Indicaciones';
    }
}
