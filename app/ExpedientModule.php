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



  protected $table = 'expedient_modules';

  protected $fillable = ['module_id','price','expedient_id','recommended_module_id'];
  protected $dates = ['created_at','updated_at','deleted_at'];

  public function recommendedModule()
  {
    return $this->belongsTo(Module::class,'recommended_module_id','id')->with('moduleType')->with('moduleCategory');
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
