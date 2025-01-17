<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Client;
use App\Diagnosis;
use App\Indication;
use App\IndicationType;
use App\Audit;
use App\ExpedientModule;
use App\Patient;
use App\Medic;
use App\Person;

class Expedient extends Model
{

  use SoftDeletes;

  protected $fillable = ['client_id','patient_id'];
  protected $dates = ['created_at','updated_at','deleted_at'];

  public function client()
  {
     return $this->belongsTo(Client::class,'client_id');
  }

  public function diagnoses()
  {
    return $this->hasMany(Diagnosis::class, 'expedient_id', 'id');
  }

  public function indications()
  {
    return $this->hasMany(Indication::class,'expedient_id', 'id')->with('medic.person','indicationType');
  }
  public function audit()
  {
    return $this->hasOne(Audit::class);
  }

  public function patient()
  {
     return $this->belongsTo(Patient::class,'patient_id');
  }

  public function expedientModules()
  {
    return $this->hasMany(ExpedientModule::class);
  }

  public function diagnosisTypes()
  {
    return $this->belongsToMany(DiagnosisType::class,'diagnoses','expedient_id','diagnosisType_id');
  }
}
