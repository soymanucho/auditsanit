<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Gender;
use App\Address;
use App\Auditor;
use App\User;
use App\Patient;
use App\Medic;
use Carbon\Carbon;

class Person extends Model
{

  use SoftDeletes;

  protected $fillable = ['name','surname','dni','birthdate','gender_id','address_id','intern'];
  protected $dates = ['created_at','updated_at','deleted_at'];

  public function gender()
  {
    return $this->belongsTo(Gender::class);
  }

  public function address()
  {
    return $this->belongsTo(Address::class);
  }
  public function auditors()
  {
    return $this->hasMany(Auditor::class);
  }
  public function patient()
  {
    return $this->hasOne(Patient::class);
  }
  public function users()
  {
    return $this->hasMany(User::class);
  }
  public function medics()
  {
    return $this->hasMany(Medic::class);
  }

  public function age()
  {
    return Carbon::parse($this->birthdate)->age;
  }

  public function fullName($value='')
  {
  return $this->surname.', '.$this->name;
  }

}
