<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Role;


class RegisterController extends Controller
{
    //
    public function register()
    {

        $data = [
            'users' => User::all(),
            'roles' => Role::all(),
        ];

        return view('auth/register', $data);
    }

    /* cretae method*/

    public function signup(Request $request){

        $validation= Validator::make($request->all(),[
            'name' => 'required',
            'phone' => 'required',
            'second_name' => 'required',
            //'role_id' => 'required',
            'email' => 'required|email|unique:users',
            //'password' => 'required',

        ]);
        if ($validation->fails())  {
            Session::flash('danger', 'Error, hay datos que no se imputaron en el formulario, por favor intentelo de nuevo.');
            return redirect()->back();
        }else{
            $user = new User;
            $user->name = $request->name;
            $user->second_name = $request->second_name;
            $user->role_id ='3';
            $user->entity_id ='3';
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make('1234567890');
            $user->save();

           /* Session::flash('sms', 'Felicidades, el usuario fue creado satisfactoriamente, inicie session con sus nuevas credencilaes.');
            return redirect("login")->withSuccess('Felicidades, el usuario fue creado satisfactoriamente, inicie session con sus nuevas credencilaes');*/

            Session::flash('alert', 'Felicidades, Inicie session con sus credenciales.');
            return redirect("login")->withSuccess('Inicie sesion con las credenciales');
           //return redirect("login/change_password_view")->withSuccess('Felicidades, ');


        }

        //return redirect("jobs/fronted")->withSuccess('You have signed-in');

    }

    public function create(array $data)
    {

        $role_id = User::all();
        return User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'second_name' => $data['second_name'],
            'role_id' => $role_id == '3',
            'email' => $data['email'],
            //'password' => Hash::make($data['password'])
            'password' => $data['password'],
        ]);
    }

    //Change passweord
    public function change_password_view()
    {

        return view('auth1/change-password');
    }

    public function changePass(Request $request){
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

       $user= Auth::user();

       dd($user);
        #Match The Old Password  Auth::user()->password

        if(!Hash::check($request->old_password, $user->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");

    }
}
