<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Audit;
use App\User;
class Comment extends Model
{

  use SoftDeletes;
  protected $dates = ['created_at', 'updated_at', 'deleted_at'];

  public function audit()
  {
     return $this->belongsTo(Audit::class);
  }
  public function user()
  {
     return $this->belongsTo(User::class);
  }
}
