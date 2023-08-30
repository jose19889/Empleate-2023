<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entity;
use App\Models\User;
use App\Models\Job;
class DashboardController extends Controller
{
    //
    public function index(){

        $data=[
            'jobs'=>Job::latest()->take(10)->get(),
            'entities'=>Entity::count(),
            'aplicants'=>User::where('role_id', '3')->count(),
        ];
        return view('dashboard',$data);
        
    }
}
