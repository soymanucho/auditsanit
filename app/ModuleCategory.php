<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Module;

class ModuleCategory extends Model
{
  protected $fillable = ['name'];


  public function modules()
  {
    return $this->hasMany(Module::class);
  }
}
