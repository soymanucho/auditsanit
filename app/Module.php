<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\ModuleCategory;
use App\ModuleType;
use App\Expedient;
use App\ExpedientModule;

class Module extends Model
{

  use SoftDeletes;

  protected $fillable = ['module_type_id','module_category_id','price'];
  protected $dates = ['created_at','updated_at','deleted_at'];


  public function moduleType()
  {
    return $this->belongsTo(ModuleType::class)->withTrashed();
  }
  public function moduleCategory()
  {
    return $this->belongsTo(ModuleCategory::class)->withTrashed();
  }
  public function expedientModules()
  {
    return $this->hasMany(Expedient::class,'module_id');
  }
}
