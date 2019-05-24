<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Address;
use App\Vendor;
use App\VendorType;

class Vendor extends Model
{

  use SoftDeletes;

  protected $fillable = ['address_id','name','snr_category','jury_person','dependency_additional','vendor_type_id'];

  public function address()
  {
    return $this->belongsTo(Address::class);
  }
  public function services()
  {
    return $this->hasMany(Service::class);
  }

  public function vendorType()
  {
    return $this->belongsTo(VendorType::class);
  }
}
