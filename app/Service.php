<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\ServiceSchedule;
use App\TransportService;
use App\MedicalService;
use App\Vendor;
use App\MedicalServiceType;

class Service extends Model
{

  use SoftDeletes;

  protected $fillable = ['vendor_id','medical_service_type_id'];

  public function serviceSchedules()
  {
    return $this->hasMany(ServiceSchedule::class);
  }
  public function transportServices()
  {
    return $this->hasMany(TransportService::class);
  }
  public function medicalServices()
  {
    return $this->hasMany(MedicalService::class);
  }
  public function vendor()
  {
    return $this->belongsTo(Vendor::class);
  }
  public function medicalServiceType()
  {
    return $this->belongsTo(MedicalServiceType::class);
  }
}
