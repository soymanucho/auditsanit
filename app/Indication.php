<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\IndicationType;
use App\Medic;

class Indication extends Model
{

  use SoftDeletes;

  public function indicationType()
  {
     return $this->belongsTo(IndicationType::class,'indicationType_id');
  }

  public function medic()
  {
     return $this->belongsTo(Medic::class,'medic_id');
  }
}
