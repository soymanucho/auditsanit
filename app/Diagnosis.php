<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Expedient;
use App\DiagnosisType;

class Diagnosis extends Model
{
  public function expedient()
  {
     return $this->hasOne(Expedient::class,'id_expedient');
  }

  public function diagnosisType()
  {
    return $this->hasOne(DiagnosisType::class,'id_diagnosisType');
  }

}
