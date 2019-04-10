<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Address;
use App\Vendor;

class Vendor extends Model
{
  protected $fillable = ['address_id','name','snr_category','jury_person','dependency_additional'];

  public function address()
  {
    return $this->belongsTo(Address::class);
  }
  public function services()
  {
    return $this->hasMany(Service::class);
  }
}
