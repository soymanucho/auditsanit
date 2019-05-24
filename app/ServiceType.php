<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Service;

class ServiceType extends Model
{

  use SoftDeletes;

  protected $fillable = ['name','is_transport_service'];

  public function services()
  {
    return $this->hasMany(Service::class);
  }

}
