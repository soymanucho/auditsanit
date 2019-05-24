<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Module;
use App\Expedient;
use App\MedicalService;

class ExpedientModule extends Model
{

  use SoftDeletes;

  protected $fillable = ['module_id','price','expedient_id','recommended_module_id'];

  public function moduleRecommended()
  {
    return $this->belongsTo(Module::class)->where('id',$this->recommended_module_id);
  }
  public function module()
  {
    return $this->belongsTo(Module::class);
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
