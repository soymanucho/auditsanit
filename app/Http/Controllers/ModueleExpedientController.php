<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use App\ExpedientModule;
use App\Audit;
class ModueleExpedientController extends Controller
{
  public function addModuleToAudit(Audit $audit)
  {
    $modules = Module::all();
    return view('modulesExpedients.newModuleExpedient',compact('audit','modules'));
  }

  public function saveModuleToAudit(Request $request, Audit $audit)
  {
    $this->validate(
       $request,
       [
            'module_id' => 'required|exists:modules,id',
       ],
       [
       ],
       [
         'module_id' => 'módulo',
       ]
   );
    $moduleExpedient = new ExpedientModule();
    $moduleExpedient->expedient_id = $audit->expedient->id;
    $moduleExpedient->module_id = $request->module_id;
    $moduleExpedient->price = Module::findOrFail($request->module_id)->price;
    $moduleExpedient->save();

    return response($request, 200)
    ->header('Content-Type', 'text/plain');
  }

  public function delete(ExpedientModule $expedientModule)
  {
    $expedientModule->medicalServices()->delete();
    $expedientModule->delete();
    return redirect()->back();
  }
}
