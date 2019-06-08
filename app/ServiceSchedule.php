<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Service;

class ServiceSchedule extends Model
{

  use SoftDeletes;

  protected $fillable = ['initial_datetime','final_datetime','service_id','monday','tuesday','wednesday','thursday','friday','saturday','sunday'];
  protected $dates = ['created_at','updated_at','deleted_at'];

  public function service()
  {
    return $this->belongsTo(Service::class);
  }
}
