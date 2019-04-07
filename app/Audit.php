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
    public function expedient()
    {
      return $this->hasOne(Expedient::class,'expedient_id');
    }

<<<<<<< HEAD
    public function recommendations()
    {
      return $this->belongsToMany(Recommendation::class,'audit_recommendations');
=======
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

    public function currentStatus()
    {
      # TODO: get latest state
>>>>>>> Development
    }
}
