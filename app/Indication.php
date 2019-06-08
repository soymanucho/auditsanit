<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\IndicationType;
use App\Medic;
use App\Expedient;

class Indication extends Model
{

  use SoftDeletes;

  public function indicationType()
  {
     return $this->belongsTo(IndicationType::class,'indicationType_id');
  }

  public function medic()
  {
     return $this->belongsTo(Medic::class,'medic_id')->withTrashed();
  }

  public function expedient()
  {
     return $this->belongsTo(Expedient::class,'expedient_id');
  }
}
