<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Expedient;
class Audit extends Model
{
    public function expedient()
    {
      return $this->hasOne(Expedient::class,'expedient_id');
    }

    public function recommendations()
    {
      return $this->belongsToMany(Recommendation::class,'audit_recommendations');
    }
}
