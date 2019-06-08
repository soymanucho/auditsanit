<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Expedient;
use App\DiagnosisType;
use App\Indications;

class Diagnosis extends Model
{

  use SoftDeletes;
protected $dates = ['created_at','updated_at','deleted_at'];
  public function expedient()
  {
     return $this->belongsTo(Expedient::class,'expedient_id');
  }

  public function diagnosisType()
  {
    return $this->belongsTo(DiagnosisType::class,'diagnosisType_id')->withTrashed();
  }


}
