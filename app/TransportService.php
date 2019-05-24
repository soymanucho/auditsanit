<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Service;
use App\MedicalService;

class TransportService extends Model
{

  use SoftDeletes;
  
  protected $fillable = ['km_per_month','service_id'];

  public function service()
  {
    return $this->belongsTo(Service::class);
  }
  public function medicalService()
  {
    return $this->hasOne(MedicalService::class);
  }
}
