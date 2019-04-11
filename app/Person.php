<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Gender;
use App\Address;
use App\Auditor;

class Person extends Model
{

  use SoftDeletes;

  protected $fillable = ['name','surname','dni','birth_date','gender_id'];

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

}
