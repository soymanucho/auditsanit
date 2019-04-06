<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Genre;
use App\Adress;

class Person extends Model
{

    protected $fillable = ['name','surname','dni','birth_date','id_genre'];


    public function genre()
    {
      return $this->belongsTo(Genre::class);
    }

    public function adress()
    {
      return $this->belongsTo(Adress::class);
    }

}
