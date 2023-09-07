<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Entity;
use App\Models\AppImages;
use App\Models\Job;
use File;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Notifications\Notifiable;
class UsersController extends Controller{
//
public $general_error = 'Error, hay datos que no se imputaron en el formulario, por favor inténtelo de nuevo.';
public $danger_error = 'Error, hubo un error inesperado, por favor contacte al proveedor de este aplicativo.';
public $access_error = 'Error, no se le permite realizar esta acción.';


  public function index(){
    $data = [
      'users' => User::all(),
      'roles' => Role::all(),
      'user' => auth()->user(),
     
    ];
    return view('config.users.index', $data);
  }

  public function create(){
    $data = [
      'user' => auth()->user(),
        'users' => User::all(),
        'roles' => Role::all(),
        'entities' => Entity::all(),
      ];
      return view('config.users.create', $data);
  }


  // save user to Database
  public function insert(Request $request){
    $validation = Validator::make($request->all(), [
       'name' => 'required',
       'second_name' => 'required',
       'role_id' => 'required',
       'entity_id' => 'required',
       'phone' => 'required',
       'email' => 'required|email',
 
     ]);

     //dd($validation);
     if ($validation->fails()) {
       Session::flash('danger', 'Error, hay datos que no se imputaron en el formulario, por favor intentelo de nuevo.');
       return redirect()->back();
     } 
     else {
       $user = new User;
       $user->name = $request->name;
       $user->second_name = $request->second_name;
       $user->role_id = $request->role_id;
       $user->entity_id = $request->entity_id;
       $user->email = $request->email;
       $user->phone = $request->phone;
       $user->password = Hash::make('1234567890');
       $user->save();
       Session::flash('success', 'Felicidades, el usuario fue creado satisfactoriamente.');
       return redirect()->intended('users');
     }
 

   }
  //get edit form
  public function edit($id){
    $data = [
      'user' => User::find($id),
      'users' => User::all(),
      'entities' => Entity::all(),
      'roles' => Role::all(),
    ];
    return view('config/users.edit', $data);
  }

  // save edited user to Database
  public function update(Request $request){
    $validation = Validator::make($request->all(), [
      'user_id' => 'required',
      'name' => 'required',
      'second_name' => 'required',
      'role_id' => 'required',
      'entity_id' => 'required',
      'email' => 'required|email',
      'phone' => 'required',

    ]);

    if ($validation->fails()) {
      Session::flash('danger', 'Error, hay datos que no se imputaron en el formulario, por favor intentelo de nuevo.');
      return redirect()->back();
    } else {
      $user = User::where('id', $request->user_id)->first();
      $user->name = $request->name;
      $user->second_name = $request->second_name;
      $user->email = $request->email;
      $user->phone = $request->phone;
      $user->role_id = $request->role_id;
      $user->entity_id = $request->entity_id;
      $user->save();

      Session::flash('success', 'Felicidades, el usuario fue editado satisfactoriamente.');
      return redirect()->intended('users');
    }
  }

  ///////////////////////////////////////////////////////////////////////////////////////
  //upload and save user photo profile
  //////////////////////////////////////////////////////////////////////////////////////


   ////////////////////////////////////////////////////////////////////////////////////
    public function destroy($id){
      $users = User::find($id) ;
      //check roles counts
      /*if($users->role()->count()) {
          Session::flash('danger', 'Atencion, hay usuarios con este role asignado, no puede ser eliminado.');
          return redirect()->back();

      }*/

      if(Auth::user()->id == $users->id) {
          Session::flash('', 'Cuidado, no puede eliminarse a si mismo.');
          return redirect()->back();
      }
      $users->delete() ;
      Session::flash('success', 'User was deleted') ;
      return redirect()->intended('users');
    }
       

      //
    public function delete(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);

        if ($validation->fails()) {
            Session::flash('warning', $this->general_error);
            return redirect()->back();
        }

        if(Auth::user()->id == $request->user_id) {
            Session::flash('warning', 'Cuidado, no puede eliminarse a si mismo.');
            return redirect()->back();
        }

        $user = User::where('id', $request->user_id)->first();

        if(is_null($user)) {
            Session::flash('danger', $this->danger_error);
            return redirect()->back();
        }

        if(Auth::user()->id == $user->id) {
            Session::flash('warning', 'Cuidado, no puede eliminarse a si mismo.');
            return redirect()->back();
        }
        $user->delete();

        Session::flash('warning', 'Cuidado, el usuario fue eliminado.');
        return redirect()->back();
    }

  //////////////////////////////////////////////////////////////////////////////////////
  //////////// Profile settings

  //profile
  public function profile(){
    $user = Auth::user();

    $data=[
        'user' => Auth::user(),
        'role' => Role::find($user->role_id),
        'users'=>User::all(),
        'entities'=>Entity::all(),
        'jobs'=>Job::all(),
      

    ];

    return view('config/users/profile', $data);
}
public function update_image(Request $request){
  
  if($request->hasFile('image')){
    $filename = $request->image->getClientOriginalName();
    $request->image->storeAs('images',$filename,'public');
    Auth()->user()->update(['images'=>$filename]);
}

// $user=auth()->user()->id;

// $user_image = new Image;

// $user_image->user_id = $user;
// $user_image->save();

Session::flash('success', 'La foto de usuario fue cambiada, con exito!.');
return redirect()->back();
}

 
  //////////////////////////////////////////////////////////////////
  /////////////////////Reset passsowrd
    public function password_reset(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);

        if ($validation->fails()) {
            Session::flash('danger', $this->general_error);
            return redirect()->back();
        }

        if(Auth::user()->id == $request->user_id) {
            Session::flash('warning', 'Cuidado, no puede bloquearse a si mismo.');
            return redirect()->back();
        }

        $user = User::where('id', $request->user_id)->first();

        $user->password = Hash::make('1234567890');
        $user->password_reset = true;
        $user->save();

        Session::flash('warning', 'Cuidado, la contraseña del usuario ' . $user->user . ' fue reseteada.');
        return redirect()->back();
    }
    
    // Method used in the password reset exception
    public function reset(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        if(!$user->password_reset) {
            Session::flash('danger', 'Error, no se le permite esta acción');
            return redirect()->route('dashboard');
        }

        if ($validation->fails()) {
            Session::flash('error-password', true);
            return redirect()->back();
        }

        $user->password = Hash::make($request->password);
        $user->password_reset = false;
        $user->save();

        Session::flash('warning', 'Cuidado, su contraseña fue cambiada.');
        return redirect()->route('dashboard');
    }

    

        //update profile passord
    public function update_profile_password(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'old_password' => 'password',
            'password' => 'required',
            'password_confirm' => 'required',
        ]);



        if ($validation->fails()) {
            Session::flash('danger', $this->general_error);
            Session::flash('message', 'la contraseña anterior no coincide!');
            return redirect()->back();
        } else {
            $user = Auth::user();

            $user->password = Hash::make($request->password);

            $user->save();

            Session::flash('success', 'Felicidades, su contraseña fue actualizado satisfactoriamente.');
            return redirect()->route('user.index');
        }
    }


  
}
