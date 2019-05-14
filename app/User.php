<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Person;
use App\Client;
use App\Audit;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function AuditorAssignedAudits()
    {
      $medicalservices = $this->person->auditors->first->get()->medicalServices;
      $audits = collect([]);
      foreach ($medicalservices as $medicalservice) {

      $audits->push($medicalservice->expedientModule->expedient->audit);
      }
    return  $audits = $audits->unique()->values()->all();
    }

    public function ClientAssignedAudits()
    {
      return $this->clients()->first()->audits();

    }


    public function clients(){
      return $this->belongsToMany(Client::class, 'clients_users', 'user_id', 'client_id');
    }

    public function person()
    {
      return $this->belongsTo(Person::class);
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
