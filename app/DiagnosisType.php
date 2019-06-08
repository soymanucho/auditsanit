<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Diagnosis;

class DiagnosisType extends Model
{

  use SoftDeletes;

  protected $fillable = ['name','code'];

  protected $searchableColumns = ['name'];
  protected $dates = ['created_at','updated_at','deleted_at'];

  public function diagnoses()
  {
    return $this->hasMany(Diagnosis::class, 'diagnosisType_id', 'id')->withTimestamps();
  }
}
