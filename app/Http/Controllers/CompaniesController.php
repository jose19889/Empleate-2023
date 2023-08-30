<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompaniesController extends Controller
{

    public function index(){
        return view('companies/index');
    }
    public function create(){
        return view('companies/create');
    }
    public function edit(){
        return view('companies/edit');
    }
}
