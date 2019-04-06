<?php

namespace App;
use App\ModuleTypeModuleTypeCategory;
use App\Expedient;
use App\MedicalService;

use Illuminate\Database\Eloquent\Model;

class ExpedientModule extends Model
{
  protected $fillable = ['module_type_module_type_category_id','price','expedient_id','recommended_module_type_module_type_category_id'];

  public function moduleTypeModuleTypeCategoryRecommended()
  {
    return $this->belongsTo(ModuleTypeModuleTypeCategory::class);
  }
  public function moduleTypeModuleTypeCategory()
  {
    return $this->belongsTo(ModuleTypeModuleTypeCategory::class);
  }
  public function expedient()
  {
    return $this->belongsTo(Expedient::class);
  }
  public function medicalServices()//prestaciones
  {
    return $this->hasMany(MedicalService::class);
  }
}
