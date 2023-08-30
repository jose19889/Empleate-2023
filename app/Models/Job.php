<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    
  protected $fillable = [
    'Job_title',
    'vacancy',
    'job_sumary',
    'availability',
    'cat_id',
    'job_salary',
    'entity_id',
    'docs_required',

  ];

  // relation b/w wob offers an companies
  public function entity()
  {
    return $this->hasOne('App\Models\Entity', 'id', 'entity_id');
  }


  // relation b/w wjob offers and categories
  public function cat()
  {
    return $this->hasOne('App\Models\Cat', 'id', 'cat_id');
  }

  public function province()
  {
    return $this->hasOne('App\Models\Province', 'id', 'province_id');
  }


  // relation b/w wjob offers and categories
  public function city()
  {
    return $this->hasOne('App\Models\City', 'id', 'city_id');
  }

  // relation b/w wjob offers and categories
  public function users()
  {
    return $this->belongsToMany('App\Models\User', 'id', 'user_id');
    
  }
}
