<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    use HasFactory;


    //
    protected $fillable = [
        'module_id',
        'table',
        'name',
        'title',
    ];

    //
    public function permission($role_id, $access_id)
    {
        return $this->hasOne('App\Models\Permission', 'access_id', 'id')->where('role_id', $role_id)->where('access_id', $access_id)->first();
    }
}
