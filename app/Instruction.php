<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Audit;
class Instruction extends Model
{
  public function audit()
  {
    return $this->belongsToMany(Audit::class,'audits_instructions');
  }

}
