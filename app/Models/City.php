<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [

        'name',
        'province_id',

    ];
    
    public function entity()
    {
        return $this->hasMany(Entity::class); // <--- class should be "User" not "Role" here.
    }

    public function jobs()
    {
        return $this->hasMany(Job::class); // <--- class should be "User" not "Role" here.
    }

}
