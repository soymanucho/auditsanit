<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Client;
use App\Diagnosis;
use App\Indication;
use App\Audit;
use App\ExpedientModule;

class Expedient extends Model
{

  use SoftDeletes;

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
    return $this->hasMany(Indication::class,'expedient_id', 'id');
  }
  public function audit()
  {
    return $this->hasOne(Audit::class,'id','expedient_id');
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
