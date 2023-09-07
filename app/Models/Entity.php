<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;
     ///use HasFactory;

     protected $fillable = [
        'name',
        'owner',
        'owner_tel',
        'created_at',

    ];

    //
    public function jobs()
    {
        return $this->hasMany('App\Models\Job', 'company_id', 'id');

    }


    /*
    public function users()
    {
        return $this->hasMany('App\Models\User', 'company_id', 'id');
    }*/

    // public function emails()
    // {
    //     return $this->hasMany('App\Models\Email', 'entity_id', 'id');
    // }


    public function province(){
        return $this->hasOne('App\Models\Province', 'id', 'province_id' );
    
    }

    public function city()
    {
        return $this->hasOne('App\Models\City', 'id','city_id' );
    }

    public function job()
    {
        return $this->hasOne('App\Models\Job', 'id','job_id' );
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id','user_id' );
    }

}
