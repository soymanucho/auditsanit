<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AuditExport;
use App\Audit;
use App\Patient;
use App\Location;
use App\Province;
use App\Gender;
use App\Client;
use App\Status;
use App\Person;
use App\Address;
use App\Expedient;

class AuditController extends Controller
{
  public function show()
  {
    $audits = Audit::all();
    return view('audits.audits',compact('audits'));
  }
  public function new()
  {
    $audit = New Audit;
    $audit->save();
    $status = Status::find(1)->take(1)->get();
    $audit->statuses()->attach($status);
    $audit->save();

    return redirect()->route('audit-detail-patient',compact('audit'));
    // return view('audits.auditDetailPatient',compact('audit'));
  }
  public function detailPatient(Audit $audit)
  {
    $locations = Location::all();
    $provinces = Province::all();
    $genders = Gender::all();
    $clients = Client::all();
    // dd($audit);
    return view('audits.auditDetailPatient',compact('audit','locations','provinces','genders','clients'));
  }
  public function detailPatientSave(Audit $audit, Request $request)
  {
    // $audit = Audit::find($audit->id);
    $audit = Audit::where('id',$audit->id)->first();
    $this->validate(
        $request,
        [
            'name' => 'required|string|max:100',
            'client_id' => 'required|exists:clients,id',
            'surname' => 'required|string|max:100',
            'dni'     => 'required|string|max:10',
            'birthdate' => 'required|date|before:today',
            'street' => 'required|string|max:100',
            'number' => 'required|string|max:100',
            'floor' => 'required|string|max:100',
            'location_id' => 'required|exists:locations,id',
            'province_id' => 'required|exists:provinces,id',
            'gender_id' => 'required|exists:genders,id',
        ],
        [
        ],
        [
          'name' => 'nombre',
          'client_id' => 'obra social',
          'surname' => 'apellido',
          'dni'     => 'DNI',
          'birthdate' => 'fecha de nacimiento',
          'street' => 'calle',
          'number' => 'número',
          'floor' => 'piso',
          'location_id' => 'localidad',
          'province_id' => 'provincia',
          'gender_id' => 'género',
        ]
    );

    $address = New Address;
    $address->street = $request->street;
    $address->number = $request->number;
    $address->floor = $request->floor;
    // $address->location()->save($request->location_id);
    $address->location_id = $request->location_id;
    // $address->location()->attach($request->location_id);
    // $province =
    $address->save();
    // $person = Person::firstOrCreate('dni',$request->dni);
    $person = New Person;
    // $person->fill($request->all());
    // $person->addres()->attach($address->id);
    $person->address_id = $address->id;
    // $person->address()->associate($address->id);
    // $person->gender()->attach($request->gender_id);
    // $person->gender()->associate($request->gender_id);
    $person->gender_id = $request->gender_id;
    $person->name = $request->name;
    $person->surname = $request->surname;
    $person->dni = $request->dni;
    $person->birthdate = $request->birthdate;
    $person->save();

    $patient = New Patient;
    // $patient->person()->associate($person->id)->save();
    $patient->person_id = $person->id;
    // $patient->person()->attach($person->id);
    $patient->save();

    $expedient = New Expedient;
    // $expedient->client()->associate($request->client_id);
    $expedient->client_id = $request->client_id;
    // $expedient->client()->attach($request->client_id);
    $expedient->patient_id = $patient->id;
    // $expedient->patient()->associate($patient->id);
    // $expedient->patient()->attach($patient->id);
    $expedient->save();

    // $audit->expedient()->attach($expedient->id);
    // $audit->expedient()->associate($expedient->id);
    $audit->expedient_id = $expedient->id;
    // $status = Status::find(1)->get();
    // $audit->statuses()->attach($status);
    $audit->save();

    return redirect()->route('audit-detail-expedient',compact('audit'));
  }
  public function detailExpedient(Audit $audit)
  {
    return view('audits.auditDetailExpedient',compact('audit'));
  }
  public function detailObjectives(Audit $audit)
  {
    return view('audits.auditDetailObjectives',compact('audit'));
  }
  public function detailAuditor(Audit $audit)
  {
    return view('audits.auditDetailAuditor',compact('audit'));
  }
  public function detailConclution(Audit $audit)
  {
    return view('audits.auditDetailConclution',compact('audit'));
  }
  public function detailHistory(Audit $audit)
  {
    return view('audits.auditDetailHistory',compact('audit'));
  }
  public function export()
  {
      return Excel::download(new AuditExport, 'auditorias.xlsx');
  }
}
