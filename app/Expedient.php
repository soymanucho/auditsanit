<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;
use App\Diagnosis;
use App\Audit;

class Expedient extends Model
{
    public function client()
    {
       return $this->belongsTo(Client::class,'client_id');
    }

    public function diagnoses()
    {
      return $this->hasMany(Diagnosis::class, 'expedient_id', 'id');
    }
    public function audit()
    {
      return $this->hasOne(Audit::class,'id','expedient_id');
    }

}
