<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Person;
use App\User;
use App\Vendor;

class Auditor extends Model
{
  protected $fillable = ['user_id','person_id'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function person()
  {
    return $this->belongsTo(Person::class);
  }
  public function vendors()//prestadores a los que audita
  {
    return $this->hasMany(Vendor::class);
  }
}
