<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;
     // relatio ship jobs and categories
     public function jobs()
     {
         return $this->hasMany('App\Models\Job', 'cat_id', 'id');
     }
 
}
