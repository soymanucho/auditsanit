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
  protected $dates = ['created_at','updated_at','deleted_at'];

  public function person()
  {
     return $this->belongsTo(Person::class,'person_id')->withTrashed();
  }
  public function expedient()
  {
     return $this->hasOne(Expedient::class,'id');
  }

}
