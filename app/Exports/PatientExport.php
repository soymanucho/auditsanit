<?php

namespace App\Exports;

use App\Patient;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromCollection;

class PatientExport implements FromView
{

  public function view(): View
  {
      return view('patients.datatable', [
          'patients' => Patient::all()
      ]);
  }
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Patient::all();
    // }
}
