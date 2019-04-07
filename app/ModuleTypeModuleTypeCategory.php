<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ModuleTypeCategory;
use App\ModuleType;
use App\ExpedientModule;

class ModuleTypeModuleTypeCategory extends Model
{
  protected $fillable = ['mod_typ_id','mod_typ_cat_id','price'];
  protected $table = 'mod_typ_mod_typ_cat';

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
