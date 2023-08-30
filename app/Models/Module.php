<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'order',
        'icon',
        'route',
        'name',
    ];

    //
    public function accesses()
    {
        return $this->hasMany('App\Models\Access', 'module_id', 'id');
    }
}
