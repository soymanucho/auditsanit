<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Service;

class ServiceType extends Model
{

  use SoftDeletes;

  protected $fillable = ['name','is_transport_service'];
  protected $dates = ['created_at','updated_at','deleted_at'];

  public function services()
  {
    return $this->hasMany(Service::class);
  }

}
