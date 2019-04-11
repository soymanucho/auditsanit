<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\IndicationType;

class Indication extends Model
{

  use SoftDeletes;
  
  public function indicationType()
  {
     return $this->hasOne(IndicationType::class,'id');
  }
}
