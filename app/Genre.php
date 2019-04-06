<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Person;

class Genre extends Model
{
    protected $fillable = ['name'];
    public function persons()
    {
      return $this->hasMany(Person::class);
    }
}
