<?php

namespace App;

use App\Expedient;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  public function expedients()
  {
    return $this->hasMany(Expedient::class, 'client_id', 'id');
  }
}
