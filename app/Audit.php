<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Expedient;
use App\Instruction;
use App\Objective;
use App\Comment;
use App\Status;
class Audit extends Model
{

    use SoftDeletes;
    protected $dates = ['created_at','updated_at'];

    protected $fillable = ['expedient_id','conclution','report'];

    public function expedient()
    {
      return $this->belongsTo(Expedient::class,'id');
    }


    public function recommendations()
    {
      return $this->belongsToMany(Recommendation::class,'audit_recommendations')->withTimestamps();
    }
    public function instructions()
    {
      return $this->belongsToMany(Instruction::class,'audits_instructions')->withTimestamps();
    }

    public function objectives()
    {
      return $this->belongsToMany(Objective::class,'audits_objectives')->withTimestamps();
    }

    public function comments()
    {
      return $this->hasMany(Comment::class);
    }

    public function statuses()
    {
      return $this->belongsToMany(Status::class,'audits_statuses')->orderBy('audits_statuses.created_at')->withTimestamps();
    }
    public function auditors()
    {
      $auditors = collect([]);
      foreach ($this->expedient->expedientModules as $expedientModule) {
        foreach ($expedientModule->medicalServices as $medicalService) {
          $auditors->push($medicalService->auditor);
        }
      }
      return $auditors;
    }
    public function currentStatus()
    {
        return $this->belongsToMany(Status::class,'audits_statuses')->orderBy('audits_statuses.created_at','desc')->first();
    }

}
