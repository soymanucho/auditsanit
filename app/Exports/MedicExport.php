<?php

namespace App\Exports;

use App\Medic;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\FromCollection;

class MedicExport implements FromView
{

  public function view(): View
  {
      return view('medics.datatable', [
          'medics' => Medic::all()
      ]);
  }
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Medic::all();
    // }
}
