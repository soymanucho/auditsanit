<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Person;
class Medic extends Model
{

  use SoftDeletes;
  protected $dates = ['created_at','updated_at','deleted_at'];
  public function person()
  {
     return $this->belongsTo(Person::class)->withTrashed();
  }

}
