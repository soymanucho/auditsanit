<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Genre;
use App\Adress;

class Person extends Model
{
<<<<<<< HEAD
    protected $fillable = ['name','surname','dni','birth_date','id_genre'];
=======
    protected $table = 'persons';
    protected $fillable = ['name','surname','dni','birth_date','genre_id'];
>>>>>>> 4ee63da2575da7107de97064af03ff159dc4854b

    public function genre()
    {
      return $this->belongsTo(Genre::class);
    }

    public function adress()
    {
      return $this->belongsTo(Adress::class);
    }

}
