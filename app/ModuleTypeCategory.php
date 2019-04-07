<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ModuleTypeModuleTypeCategory;

class ModuleTypeCategory extends Model
{
  protected $fillable = ['name'];
  protected $table = 'mod_typ_cat';

  public function moduleTypeModuleTypeCategories()
  {
    return $this->hasMany(ModuleTypeModuleTypeCategory::class);
  }
}
