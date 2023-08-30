<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $fillable = [

        'name',
        'abrev',

    ];

    public function entities()
    {
        return $this->hasMany(Entity::class); // <--- class should be "User" not "Role" here.
    }

    public function jobs()
    {
        return $this->hasMany(Job::class); // <--- class should be "User" not "Role" here.
    }
    public function cities()
    {
        return $this->hasMany(City::class); // <--- class should be "User" not "Role" here.
    }



}
