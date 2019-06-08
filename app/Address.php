<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Location;
use App\Person;
use App\Vendor;

class Address extends Model
{
  use SoftDeletes;
  protected $dates = ['created_at','updated_at','deleted_at'];

  protected $fillable = ['street','number','floor','location_id','latitude','longitude'];

  public function location()
  {
    return $this->belongsTo(Location::class)->withTrashed();
  }

  public function persons()
  {
    return $this->hasMany(Person::class);
  }
  public function vendors()
  {
    return $this->hasMany(Vendor::class);
  }
  public function fullAddress()
  {
    return $this->street . ' ' . $this->number . ', ' . $this->location->name;
  }

}
