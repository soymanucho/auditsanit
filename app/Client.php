<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Expedient;

class Client extends Model
{

  use SoftDeletes;
  
  public function expedients()
  {
    return $this->hasMany(Expedient::class, 'client_id', 'id');
  }
}
