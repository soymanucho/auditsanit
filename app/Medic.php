<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Person;
class Medic extends Model
{

  use SoftDeletes;
  
  public function person()
  {
     return $this->belongsTo(Person::class,'id');
  }
}
