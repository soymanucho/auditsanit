<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Audit;
class Objective extends Model
{

  use SoftDeletes;
  
  protected $fillable = ['name'];

  public function audit()
  {
    return $this->belongsToMany(Audit::class,'audits_objectives');
  }
}
