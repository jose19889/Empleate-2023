<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Role;
use Mail; 
use DB;
use Carbon\Carbon; 
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function login()
    {

        return view('auth/login');
    }


    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials) && Auth::user()->role_id != '3') {

            return redirect()->intended('dashboard/index')
                ->withSuccess('Bienvenido !');
        }

        if (Auth::attempt($credentials) && Auth::user()->role_id == '3') {

            return redirect()->intended('jobs/frontend')
                ->withSuccess('Bienvenido !');
        }

        else{
            Session::flash('danger', 'Sus Credenciales son incorrectas.');
            return redirect("login")->withErrors('Login details are not valid');
        }

        
    }

    public function signout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');

    }


}
