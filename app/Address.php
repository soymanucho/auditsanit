<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Location;
use App\Person;

class Address extends Model
{
  protected $fillable = ['street','number','floor','location_id','latitude','longitude'];

  public function location()
  {
    return $this->belongsTo(Location::class);
  }

  public function persons()
  {
    return $this->hasMany(Person::class);
  }

}
