<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Person;

class Gender extends Model
{

  use SoftDeletes;

  protected $fillable = ['name'];
  
  public function persons()
  {
    return $this->hasMany(Person::class);
  }
}
