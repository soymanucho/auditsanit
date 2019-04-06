<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Gender;
use App\Adress;

class Person extends Model
{

    protected $fillable = ['name','surname','dni','birth_date','gender_id'];


    public function gender()
    {
      return $this->belongsTo(Gender::class);
    }

    public function adress()
    {
      return $this->belongsTo(Adress::class);
    }

}
