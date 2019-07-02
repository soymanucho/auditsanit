<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Audit;

// use App\Export\AuditExport;
// use App\Export\AuditModulesExport;
// use App\Export\AuditDiagnosesExport;
// use App\Export\AuditRecommendationsExport;
// use App\Export\AuditIndicationsExport;
// use App\Export\AuditObjetivesExport;
// use Illuminate\Contracts\View\View;
// use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Auth;
// use Maatwebsite\Excel\Concerns\FromCollection;

class AuditsExport implements WithMultipleSheets
{
  use Exportable;

  // public function view(): View
  // {
  //     return view('audits.datatableExport', [
  //         // 'roles' =>Auth::user()->getRoleNames(),
  //         'audits' => Audit::all()
  //     ]);
  // }
  public function sheets(): array
    {
        $sheets = [];
        $sheets[] = new AuditExport();
        $sheets[] = new AuditModulesExport();
        $sheets[] = new AuditDiagnosesExport();
        $sheets[] = new AuditRecommendationsExport();
        $sheets[] = new AuditIndicationsExport();
        $sheets[] = new AuditObjetivesExport();

        return $sheets;
    }
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Audit::all();
    // }
}
