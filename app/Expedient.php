<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;
use App\Diagnosis;

class Expedient extends Model
{
    public function client()
    {
       return $this->hasOne(Client::class,'id_client');
    }

    public function diagnoses()
    {
      return $this->hasMany(Diagnosis::class, 'id_expedient', 'id');
    }
}
