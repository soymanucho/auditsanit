<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Audit;
use App\IndicationType;
use App\Medic;
use App\Indication;

class IndicationController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  
  public function new(Audit $audit)
  {
    $indicationTypes = IndicationType::all();
    $medics = Medic::all();
    $indication = new Indication();
    return view('indications.newIndication',compact('audit','indicationTypes','medics','indication'));
  }

  public function delete(Indication $indication)
  {
    $indication->delete();
    return redirect()->back();
  }

  public function save(Request $request, Audit $audit)
  {
    $this->validate(
       $request,
       [
            'indicationType_id' => 'required|exists:indication_types,id',
            'medic_id' => 'required|exists:medics,id',
            'numberOfSesions' => 'required|max:1000',
            'aditionalDependance' => 'required|boolean',


       ],
       [
       ],
       [
         'indicationType_id' => 'tipo de indicacion',
         'medic_id' => 'medico',
         'numberOfSesions' => 'número de sesiones',
         'aditionalDependance' => 'adicional dependencia',

       ]
   );
   $indication = new Indication();
   $indication->expedient_id = $audit->expedient->id;
   $indication->medic_id = $request->medic_id;
   $indication->aditionalDependance = $request->aditionalDependance;
   $indication->numberOfSesions = $request->numberOfSesions;
   $indication->indicationType_id = $request->indicationType_id;
   $indication->save();

    return response($request, 200)
    ->header('Content-Type', 'text/plain');
  }
}
