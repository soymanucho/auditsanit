<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Audit;
class Instruction extends Model
{

  use SoftDeletes;

  protected $fillable = ['name'];
  protected $dates = ['created_at','updated_at','deleted_at'];

  public function audit()
  {
    return $this->belongsToMany(Audit::class,'audits_instructions');
  }

}
