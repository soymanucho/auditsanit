<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Person;

class Genre extends Model
{
    private $fillable = ['name'];
    public function persons()
    {
      return $this->hasMany(Person::class);
    }
}
