<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Person;
use App\User;
use App\MedicalService;

class Auditor extends Model
{

  use SoftDeletes;

  protected $fillable = ['user_id','person_id'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function person()
  {
    return $this->belongsTo(Person::class);
  }
  public function medicalServices()//prestaciones a los que audita
  {
    return $this->hasMany(MedicalService::class);
  }
}
