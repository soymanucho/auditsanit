<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Service;
use App\ExpedientModule;
use App\TransportService;
use App\Auditor;

class MedicalService extends Model
{
  protected $fillable = ['expedient_module_id','service_id','transport_service_id','auditor_id'];

  public function service()
  {
    return $this->belongsTo(Service::class);
  }
  public function expedientModule()
  {
    return $this->belongsTo(ExpedientModule::class);
  }
  public function transportService()
  {
    return $this->belongsTo(TransportService::class);
  }
  public function auditor()
  {
    return $this->belongsTo(Auditor::class);
  }
}
