<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IndicationType extends Model
{

  use SoftDeletes;
  
    protected $fillable = ['name'];


}
