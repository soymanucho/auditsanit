<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
  public function percentage()
  {
    return (($this->id)*100/(Status::all()->max('id')));
  }
}
