<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Person;
use App\User;
use App\MedicalService;
use Illuminate\Support\Facades\DB;

class Auditor extends Model
{

  use SoftDeletes;

  protected $fillable = ['user_id','person_id'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function person()
  {
    return $this->belongsTo(Person::class);
  }
  public function medicalServices()//prestaciones a los que audita
  {
    return $this->hasMany(MedicalService::class)->with('expedientModule')->with('service')->with('service.vendor')->with('service.vendor.address');
  }

  public function numberOfTotalAudits($value='')
  {
    return DB::table('auditors')
    ->where('auditors.id',$this->id)
    ->join('medical_services','medical_services.auditor_id','=','auditors.id')
    ->join('expedient_modules','expedient_modules.id','=','medical_services.expedient_module_id')
    ->join('audits','audits.expedient_id','=','expedient_modules.expedient_id')
    ->select('audits.id')
    ->distinct('audits.id')
    ->count('audits.id');
  }

  public function numberOfFinalAudits()
  {

    $maxstatus = DB::table('audits_statuses')
    ->select( DB::raw('audit_id,MAX(id) as maxid'))
    ->groupBy('audit_id');

    $audit_finalstatus = DB::table('audits_statuses')
        ->joinSub($maxstatus, 'finalstatus', function ($join) {
            $join->on('finalstatus.maxid', '=', 'audits_statuses.id');
        })
        ->join('statuses','statuses.id','=','audits_statuses.status_id')
        ->select('finalstatus.audit_id', 'isFinal');

        return DB::table('audits')
        ->joinSub($audit_finalstatus, 'finalstatus', function ($join) {
            $join->on('audits.id', '=', 'finalstatus.audit_id');
        })
        ->join('expedient_modules','expedient_modules.expedient_id','=','audits.expedient_id')
        ->join('medical_services','medical_services.expedient_module_id','=','expedient_modules.id')
        ->where('medical_services.auditor_id',$this->id)
        ->where('isFinal',true)
        ->distinct('audits.id')
        ->count('audits.id');

  }

  public function numberOfPendingAudits()
  {

    $maxstatus = DB::table('audits_statuses')
    ->select( DB::raw('audit_id,MAX(id) as maxid'))
    ->groupBy('audit_id');

    $audit_finalstatus = DB::table('audits_statuses')
        ->joinSub($maxstatus, 'finalstatus', function ($join) {
            $join->on('finalstatus.maxid', '=', 'audits_statuses.id');
        })
        ->join('statuses','statuses.id','=','audits_statuses.status_id')
        ->select('finalstatus.audit_id', 'isFinal');

        return DB::table('audits')
        ->joinSub($audit_finalstatus, 'finalstatus', function ($join) {
            $join->on('audits.id', '=', 'finalstatus.audit_id');
        })
        ->join('expedient_modules','expedient_modules.expedient_id','=','audits.expedient_id')
        ->join('medical_services','medical_services.expedient_module_id','=','expedient_modules.id')
        ->where('medical_services.auditor_id',$this->id)
        ->where('isFinal',false)
        ->distinct('audits.id')
        ->count('audits.id');

  }
}
