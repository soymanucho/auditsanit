<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ModuleTypeCategory;
use App\ModuleType;
use App\Expedient;
use App\ExpedientModule;

class Module extends Model
{
  protected $fillable = ['mod_typ_id','mod_typ_cat_id','price'];


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
    return $this->hasMany(Expedient::class,'module_id');
  }
}
