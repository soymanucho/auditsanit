<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Expedient;

class Client extends Model
{

  use SoftDeletes;
  protected $dates = ['created_at','updated_at','deleted_at'];
  protected $fillable = ['companyName'];

  public function expedients()
  {
    return $this->hasMany(Expedient::class, 'client_id', 'id')->with('audit')->with('patient.person')->with('audit.statuses');
  }

  public function audits()
  {
    $audits = collect([]);
    foreach ($this->expedients as $expedient) {
      $audits->push($expedient->audit);
    }
    return $audits->sortByDesc('id');
  }
  public function users()
  {
    return $this->belongsToMany(User::class, 'clients_users','client_id', 'user_id');
  }
}
