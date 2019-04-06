<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Service;

class ServiceSchedule extends Model
{
  protected $fillable = ['initial_datetime','final_datetime','service_id'];

  public function service()
  {
    return $this->belongsTo(Service::class);
  }
}
