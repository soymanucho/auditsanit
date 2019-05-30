<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
  protected $fillable = ['email','token','role_id','client_id','name','surname','dni'];
}
