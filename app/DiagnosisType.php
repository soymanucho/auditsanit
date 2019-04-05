<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Diagnosis;

class DiagnosisType extends Model
{
  public function diagnoses()
  {
    return $this->hasMany(Diagnosis::class, 'diagnosisType_id', 'id');
  }
}
