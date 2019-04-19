<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{

  use SoftDeletes;
  protected $fillable = ['name','color','isFinal'];

  public function percentage()
  {
    return (($this->id)*100/(Status::all()->max('id')));
  }
}
