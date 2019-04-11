<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\IndicationType;

class Indication extends Model
{
  public function indicationType()
  {
     return $this->hasOne(IndicationType::class,'id');
  }
}
