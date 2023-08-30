<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'guard_name',
       
    ];

    //
    public function users()
    {
        return $this->hasMany(User::class); // <--- class should be "User" not "Role" here.
    }

    public function permissions()
    {
        return $this->hasMany('App\Models\Permission', 'role_id', 'id');
    }
}
