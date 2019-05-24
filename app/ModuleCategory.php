<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Module;

class ModuleCategory extends Model
{

  use SoftDeletes;

  protected $fillable = ['name'];


  public function modules()
  {
    return $this->hasMany(Module::class);
  }
}
