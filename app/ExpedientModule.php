<?php

namespace App;
use App\Module;
use App\Expedient;
use App\MedicalService;

use Illuminate\Database\Eloquent\Model;

class ExpedientModule extends Model
{
  protected $fillable = ['module_id','price','expedient_id','recommended_module_id'];

  public function moduleRecommended()
  {
    return $this->belongsTo(Module::class);
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
