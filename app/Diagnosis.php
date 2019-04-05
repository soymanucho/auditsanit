<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Expedient;
use App\DiagnosisType;

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

}
