<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Province;
use App\Adress;

class Location extends Model
{
  protected $fillable = ['name','province_id'];

  public function province()
  {
    return $this->belongsTo(Province::class);
  }

  public function adresses()
  {
    return $this->hasMany(Adress::class);
  }

}
