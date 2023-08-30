<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserJob extends Model
{
    use HasFactory;
    public function job()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function users()
    {
      return $this->belongsToMany('App\Models\Job', 'id', 'job_id');
      
    }

}
