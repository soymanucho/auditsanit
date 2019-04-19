<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Client;
use App\Diagnosis;
use App\Audit;
use App\ExpedientModule;
use App\Patient;

class Expedient extends Model
{

  use SoftDeletes;

  protected $fillable = ['client_id','patient_id'];

  public function client()
  {
     return $this->belongsTo(Client::class,'client_id');
  }

  public function diagnoses()
  {
    return $this->hasMany(Diagnosis::class, 'expedient_id', 'id');
  }
  public function audit()
  {
    return $this->hasOne(Audit::class);
  }

  public function patient()
  {
     return $this->belongsTo(Patient::class);
  }

  public function expedientModules()
  {
    return $this->hasMany(ExpedientModule::class);
  }
}
