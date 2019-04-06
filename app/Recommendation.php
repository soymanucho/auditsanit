<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Audit;

class Recommendation extends Model
{
  protected $fillable = ['descrip'];

  public function audits()
  {
    return $this->belongsToMany(Audit::class,'audit_recommendations');
  }
}
