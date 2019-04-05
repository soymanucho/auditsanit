<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Location;

class Province extends Model
{
  private $fillable = ['name'];

  public function locations()
  {
    return $this->hasMany(Location::class);
  }
}
