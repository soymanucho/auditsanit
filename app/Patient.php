<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Person;
use App\Expedient;

class Patient extends Model
{

  use SoftDeletes;

  protected $fillable = ['person_id'];

  public function person()
  {
     return $this->belongsTo(Person::class,'person_id');
  }
  public function expedient()
  {
     return $this->hasOne(Expedient::class,'id');
  }

}
