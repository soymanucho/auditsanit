<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Module;

class ModuleType extends Model
{

  use SoftDeletes;

  protected $fillable = ['name'];
  protected $dates = ['created_at','updated_at','deleted_at'];

  public function modules()
  {
    return $this->hasMany(Module::class);
  }
}
