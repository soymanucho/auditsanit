<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Expedient;
class Audit extends Model
{
    public function expedient()
    {
      return $this->hasOne(Expedient::class,'id_expedient');
    }
}
