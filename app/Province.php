<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Location;

class Province extends Model
{

  protected $fillable = ['name','state'];


  public function locations()
  {
    return $this->hasMany(Location::class);
  }
}
