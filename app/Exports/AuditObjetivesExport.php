<?php

namespace App\Exports;



use App\Audit;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithTitle;
// use Maatwebsite\Excel\Concerns\FromCollection;

class AuditObjetivesExport implements FromView, WithTitle
{

  public function view(): View
  {
    return view('audits.datatableExportObjetives', [
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
        return 'Objetivos';
    }
}
