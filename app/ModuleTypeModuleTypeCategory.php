<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ModuleTypeCategory;
use App\ModuleType;
use App\ExpedientModule;

class ModuleTypeModuleTypeCategory extends Model
{
  protected $fillable = ['module_type_id','module_type_category_id','price'];

  public function moduleType()
  {
    return $this->belongsTo(ModuleType::class);
  }
  public function moduleTypeCategory()
  {
    return $this->belongsTo(ModuleTypeCategory::class);
  }
  public function expedientModules()
  {
    return $this->hasMany(ExpedientModule::class);
  }
}
