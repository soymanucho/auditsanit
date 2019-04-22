<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Audit;
use App\IndicationType;
use App\Medic;
use App\Indication;

class IndicationController extends Controller
{
    public function new(Audit $audit)
    {
      $indicationTypes = IndicationType::all();
      $medics = Medic::all();
      $indication = new Indication();
      return view('indications.newIndication',compact('audit','indicationTypes','medics','indication'));
    }
}
