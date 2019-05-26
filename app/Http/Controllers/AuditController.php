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
use App\Module;
use App\Client;
use App\Status;
use App\Person;
use App\Address;
use App\Expedient;
use App\DiagnosisType;
use App\Instruction;
use App\Objective;
use App\Recommendation;
use App\MedicalService;
use Illuminate\Support\Facades\Auth;

class AuditController extends Controller
{
  public function __construct()
  {
    // $this->middleware('auth', [
    //     'except' => ['show']
    //     'only' => ['show']
    // ]); // OTHERS EXAMPLES
    $this->middleware('auth');
  }

  public function show()
  {
    $roles = Auth::user()->getRoleNames();
    if($roles->contains('Auditor')){
      $audits = Auth::user()->AuditorAssignedAudits();
    }elseif ($roles->contains('Cliente') || $roles->contains('Cliente gerencial')) {
      $audits = Auth::user()->ClientAssignedAudits();
    }else{
      $audits = Audit::orderBy('id', 'DESC')->with('expedient.patient.person')->with('statuses')->get();
    }

    return view('audits.audits',compact('audits','roles'));
  }
  public function updateStatus(Audit $audit, Status $status)
  {
    $audit = Audit::where('id',$audit->id)->first();
    // $currentStatus = Status::where('id',$status)->first();
    $currentStatus = $audit->currentStatus();

    $nextStatus = $currentStatus->id + 1;

    $nextStatus = Status::where('id',$nextStatus)->first();

    // dd($nextStatus);
    $audit->statuses()->attach($nextStatus);
    $audit->save();

    return redirect()->back();
  }

  public function updateConclution(Request $request,Audit $audit)
  {
    $this->validate(
       $request,
       [
            'conclution' => 'required|max:1000',
            'recommendations' => 'array',
            'recommendations.*' => 'exists:recommendations,id',

       ],
       [
       ],
       [
           'conclution' => 'conclusión',
           'recommendations' => 'recomendacioines',

       ]
   );


   foreach ($audit->expedient->expedientModules as $expedientModule) {
     $expedientModule->recommended_module_id = $request->input("module_".$expedientModule->module->id);
     $expedientModule->save();
   }

   $audit->recommendations()->sync($request->recommendations);
   $audit->conclution=$request->conclution;
   $audit->save();

   return redirect()->route('audit-detail-conclution', compact('audit'));
  }

  public function updateReport(Request $request,Audit $audit)
  {
    // dd($request);
      $reportfield = 'report_' . $request->medicalService;

    $this->validate(
       $request,
       [
            $reportfield => 'required|max:1000',
            'medicalService' => 'required|exists:medical_services,id',

       ],
       [
       ],
       [
           // $reportfield => 'informe',
           'medicalService' => 'id prestacion',
       ]
   );
   $medicalService = MedicalService::find($request->medicalService);
   $medicalService->report = $request->input($reportfield);
   // dd($audit->report);
   $medicalService->save();

   return redirect()->route('audit-detail-auditor', compact('audit'));
  }
  public function updateObjectives(Request $request,Audit $audit)
  {

    $this->validate(
       $request,
       [
            'instructions' => 'array',
            'instructions.*' => 'exists:instructions,id',
            'objectives' => 'array',
            'objectives.*' => 'exists:objectives,id',

       ],
       [
       ],
       [
           'instructions' => 'método de trabajo empleado',
           'objectives' => 'objetivos',

       ]
   );

   $audit->objectives()->sync($request->objectives);
   $audit->instructions()->sync($request->instructions);
   $audit->save();


   return redirect()->route('audit-detail-objectives', compact('audit'));
  }

  protected function updateDiagnosis(Request $request,Audit $audit)
  {
    //dd($request);
   $this->validate(
      $request,
      [
           'diagnosisTypes' => 'array',
           'diagnosisTypes.*' => 'exists:diagnosis_types,id',
      ],
      [
      ],
      [
          'diagnosisTypes' => 'tipos de diagnosticos',
      ]
  );
  $audit->expedient->diagnosisTypes()->sync($request->diagnosisTypes);
  $audit->save();

  }

  public function updateExpedient(Request $request, Audit $audit)
  {
    if ($request->has('updateDiagnosis')) {
      $this->updateDiagnosis($request,$audit);
      return redirect()->route('audit-detail-expedient',compact('audit'));
    }
  }


  public function new()
  {
    $clients = Client::all();
    $patients = Patient::with('person')->get();
    // $patients = Patient::join('people','patients.person_id','=','people.id')->orderby('people.surname')->with('person')->get();
    // return redirect()->route('audit-detail-patient',compact('clients','patients'));
    return view('audits.newAudit',compact('clients','patients'));
  }
  public function save(Request $request)
  {
    $this->validate(
        $request,
        [
            'client_id' => 'required|exists:clients,id',
            'patient_id' => 'required|exists:patients,id',
        ],
        [
        ],
        [
          'client_id' => 'obra social',
          'patient_id' => 'paciente',

        ]
    );
    $expedient = New Expedient;
    $expedient->patient_id = $request->patient_id;
    $expedient->client_id = $request->client_id;
    $expedient->save();
    $audit = New Audit;
    $audit->save();
    $status = Status::find(1)->take(1)->get();
    $audit->statuses()->attach($status);
    $audit->expedient_id = $expedient->id;
    $audit->save();

      $function = 'show';
      return view('audits.patient.auditDetailPatient',compact('audit','function'));
  }


  public function detailPatient(Audit $audit)
  {
    $function = 'show';
    return view('audits.patient.auditDetailPatient',compact('audit','function'));
  }

  public function detailExpedient(Audit $audit)
  {
    $diagnosesType = DiagnosisType::all();
    return view('audits.expedient.auditDetailExpedient',compact('audit','diagnosesType'));
  }
  public function detailObjectives(Audit $audit)
  {
    $objectives = Objective::all();
    $instructions = Instruction::all();
    return view('audits.objective.auditDetailObjectives',compact('audit','objectives','instructions'));
  }
  public function detailAuditor(Audit $audit)
  {
    return view('audits.report.auditDetailAuditor',compact('audit'));
  }
  public function detailConclution(Audit $audit)
  {
    $modules = Module::with('moduleType')->with('moduleCategory')->get();
    $recommendations = Recommendation::all();
    return view('audits.conclution.auditDetailConclution',compact('audit','recommendations','modules'));
  }
  public function detailHistory(Audit $audit)
  {
    return view('audits.history.auditDetailHistory',compact('audit'));
  }
  public function detailResume(Audit $audit)
  {
    return view('audits.resume.auditDetailResume',compact('audit'));
  }
  public function detailResumePrint(Audit $audit)
  {
    return view('audits.resume.auditDetailResumePrint',compact('audit'));
  }
  public function export()
  {
      return Excel::download(new AuditExport, 'auditorias.xlsx');
  }
}
