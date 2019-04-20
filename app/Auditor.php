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
    return $this->hasMany(MedicalService::class);
  }

  public function numberOfTotalAudits()
  {

    // return DB::table('audits_statuses as lastState')
    // ->select( DB::raw('lastState.audit_id,MAX(id) as maxid'))
    // ->groupBy('lastState.audit_id')
    // //->join('audits_statuses','audits_statuses.id','=','lastState.maxid')
    // ->get();


    return DB::table('auditors')
    ->where('auditors.id',$this->id)
    ->join('medical_services','medical_services.auditor_id','=','auditors.id')
    ->join('expedient_modules','expedient_modules.id','=','medical_services.expedient_module_id')
    ->join('audits','audits.expedient_id','=','expedient_modules.expedient_id')
    ->select('audits.id')
    ->distinct('audits.id')
    ->count('audits.id');
  }
}
