<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Role;
use App\Models\Entity;
use App\Models\Module;
use App\Models\Permission;
use App\Models\Access;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Illuminate\Notifications\Notifiable;

class RolesController extends Controller
{
    //////////////////////////////////////////////////////////////
    ///////// roles functions
    public function  index(){
       
        $data=[
          'roles'=>Role::all(),
      ];

       return view('config/roles/index', $data);
  
      }
  
      public function  create(){
        return view('config/roles/create');
  
      }
  
      public function insert(Request $request){
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'desc' => 'required',
  
        ]);
  
        if ($validation->fails()) {
            Session::flash('danger', 'Error, hay datos que no se imputaron en el formulario, por favor intentelo de nuevo.');
            return redirect()->back();
        } else {
            $user = new Role;
            $user->name = $request->name;
            $user->desc = $request->desc;
  
  
            $user->save();
  
            Session::flash('success', 'Felicidades, el role fue creado satisfactoriament.');
            return redirect('roles');
        }
  
      }
      // edit records
      public function edit($id){
        $data = [
            'role' => Role::find($id),
        ];
          return view('config/roles/edit', $data);
  
      }

      // save edited records
      public function update(Request $request){

        $validation = Validator::make($request->all(), [
            'role_id' => 'required',
            'name' => 'required',
            'desc' => 'required',
        ]);
  
        if ($validation->fails()) {
            Session::flash('danger', 'Error, hay datos que no se imputaron en el formulario, por favor intentelo de nuevo.');
            return redirect()->back();
        } else {
            $role = Role::where('id', $request->role_id)->first();
            $role->name = $request->name;
            $role->desc = $request->desc;
            $role->save();
            Session::flash('success', 'Felicidades el Rol fue actualizado satisfactoriamente.');
            return redirect('roles');
  
        }
      }
  

      public function destroy($id)
      {
          $role = Role::find($id) ;
  
        //   if($role->users()->count()) {
        //       Session::flash('danger', 'Atencion, hay usuarios con este role asignado, no puede ser eliminado.');
        //       return redirect()->back();
        //   }
          $role->delete() ;
          Session::flash('success', 'El role ha sido eliminiado') ;
          return redirect('roles');
      }
  
      /////////////////////////////////////////////////////////
      ///////////for role permission


       //edit role permissions
       public function edit_role_permissions($id)
       {
           $role = Role::find($id);
   
           $modules = Module::whereNotIn('route', ['dashboard'])->get();
   
           $data = [
              'companies' => Entity::all(),
               'users' => User::all(),
               'role' => $role,
               'modules' => $modules
           ];
   
           return view('config/roles.permissions', $data);
       }

      public function role_permissions_update(Request $request)
      {
          $validation = Validator::make($request->all(), [
              'role_id' => 'required',
          ]);
  
          if ($validation->fails()) {
              Session::flash('danger', 'Error, hay datos que no se imputaron en el formulario, por favor inténtelo de nuevo.');
              return redirect()->back();
          }
  
          $role_id = $request->role_id;
  
          $permissions = $request->permissions;
  
          Permission::where('role_id', $role_id)->delete();
  
          $this->assign_permissions($role_id, $permissions);
  
          Session::flash('success', 'Felicidades, los permisos del role fueron guardados.');
          return redirect()->back();
      }
  
      //
      public function assign_permissions($role_id, $permissions = [])
      {
          $accesses = Access::all();
  
          foreach ($accesses as $access) {
              Permission::create([
                  'module_id' => $access->module_id,
                  'role_id' => $role_id,
                  'access_id' => $access->id,
                  'granted' => isset($permissions[$access->id]),
              ]);
          }
      }
  
     
  
}
