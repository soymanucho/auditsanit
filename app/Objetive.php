<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Audit;
class Objetive extends Model
{

  use SoftDeletes;
  
  public function audit()
  {
    return $this->belongsToMany(Audit::class,'audits_objetives');
  }
}
