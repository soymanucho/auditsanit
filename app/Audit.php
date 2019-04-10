<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Expedient;
use App\Instruction;
use App\Objetive;
use App\Comment;
use App\Status;
class Audit extends Model
{
    protected $dates = ['created_at','updated_at'];

    public function expedient()
    {
      return $this->hasOne(Expedient::class,'id');
    }


    public function recommendations()
    {
      return $this->belongsToMany(Recommendation::class,'audit_recommendations');
    }
    public function instructions()
    {
      return $this->belongsToMany(Instruction::class,'audits_instructions');
    }

    public function objetives()
    {
      return $this->belongsToMany(Objetive::class,'audits_objetives');
    }

    public function comments()
    {
      return $this->hasMany(Comment::class);
    }

    public function statuses()
    {
      return $this->belongsToMany(Status::class,'audits_statuses');
    }
    public function auditors()
    {
      $auditors = collect([]);
      foreach ($this->expedient->expedientModules as $expedientModule) {
        foreach ($expedientModule->medicalServices as $medicalService) {
          $auditors->push($medicalService->service->vendor->auditor);
        }
      }
      return $auditors;
    }
    public function currentStatus()
    {
      $lastStatus = $this->statuses()->orderBy('created_at','desc')->first();
      return $lastStatus;
    }
}
