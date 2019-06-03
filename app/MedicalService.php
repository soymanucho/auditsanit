<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Service;
use App\ExpedientModule;
use App\TransportService;
use App\Auditor;
use App\MedicalServiceStatus;

class MedicalService extends Model
{

  use SoftDeletes;

  protected $fillable = ['expedient_module_id','service_id','transport_service_id','auditor_id'];

  public function service()
  {
    return $this->belongsTo(Service::class);
  }
  public function expedientModule()
  {
    return $this->belongsTo(ExpedientModule::class,'expedient_module_id','id')->with('expedient')->with('expedient.audit');
  }
  public function transportService()
  {
    return $this->belongsTo(TransportService::class);
  }
  public function auditor()
  {
    return $this->belongsTo(Auditor::class)->withTrashed();
  }

  public function status()
  {
    return $this->belongsTo(MedicalServiceStatus::class);
  }
}
