<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Audit;
class Comment extends Model
{
    public function audits($value='')
    {
       return $this->belongsTo(Audit::class);
    }
}
