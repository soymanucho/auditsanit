<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Person;
class Medic extends Model
{
    public function person()
    {
       return $this->hasOne(Person::class,'id');
    }
}
