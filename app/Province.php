<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Location;

class Province extends Model
{
<<<<<<< HEAD
  protected $fillable = ['name','state'];
=======
  protected $fillable = ['name'];
>>>>>>> 4ee63da2575da7107de97064af03ff159dc4854b

  public function locations()
  {
    return $this->hasMany(Location::class);
  }
}
