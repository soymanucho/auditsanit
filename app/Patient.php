<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{

  use SoftDeletes;

  public function person()
  {
     return $this->belongsTo(Person::class,'person_id');
  }
}
