<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Diagnosis;

class DiagnosisType extends Model
{

  use SoftDeletes;
    protected $fillable = ['name','code'];

  public function diagnoses()
  {
    return $this->hasMany(Diagnosis::class, 'diagnosisType_id', 'id')->withTimestamps();
  }
}
