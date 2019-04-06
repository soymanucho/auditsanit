<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Genre;
use App\Adress;

class Person extends Model
{
    protected $table = 'persons';
    protected $fillable = ['name','surname','dni','birth_date','genre_id'];

    public function genre()
    {
      return $this->belongsTo(Genre::class);
    }

    public function adress()
    {
      return $this->belongsTo(Adress::class);
    }

}
