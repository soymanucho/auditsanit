<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ModuleTypeModuleTypeCategory;

class ModuleType extends Model
{
  protected $fillable = ['name'];

  public function moduleTypeModuleTypeCategories()
  {
    return $this->hasMany(ModuleTypeModuleTypeCategory::class);
  }
}
