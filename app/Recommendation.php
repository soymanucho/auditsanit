<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Audit;

class Recommendation extends Model
{

  use SoftDeletes;

  protected $fillable = ['name'];
  protected $dates = ['created_at','updated_at','deleted_at'];

  public function audits()
  {
    return $this->belongsToMany(Audit::class,'audit_recommendations');
  }
}
