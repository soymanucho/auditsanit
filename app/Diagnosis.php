<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Expedient;
use App\DiagnosisType;
use App\Indications;

class Diagnosis extends Model
{
  public function expedient()
  {
     return $this->belongsTo(Expedient::class,'expedient_id');
  }

  public function diagnosisType()
  {
    return $this->belongsTo(DiagnosisType::class,'diagnosisType_id');
  }

  public function indications()
  {
    return $this->belongsToMany(Indication::class,'diagnosis_indications');
  }
}
