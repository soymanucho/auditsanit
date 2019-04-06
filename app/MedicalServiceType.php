<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Service;

class MedicalServiceType extends Model
{
  protected $fillable = ['name','is_transport_service'];

  public function services()
  {
    return $this->hasMany(Service::class);
  }

}
