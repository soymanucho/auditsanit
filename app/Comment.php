<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Audit;
class Comment extends Model
{

  use SoftDeletes;

  public function audits($value='')
  {
     return $this->belongsTo(Audit::class);
  }
}
