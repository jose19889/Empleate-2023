<?php

namespace App\Http\Controllers;

use App\Models\Appimage;
use App\Models\Cat;
use App\Models\Entity;
use App\Models\Job;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CatsController extends Controller
{
    //
    public function index(){
        $data=[
          'cats'=>Cat::all(),
          'roles'=>Role::all(),
          'users'=>User::all(),
          'entities'=>Entity::all(),
  
      ];
        return view('jobs/categories/index', $data);
      }
  
      public function create(){
        $data=[
          'cats'=>Cat::all(),
          'roles'=>Role::all(),
          'users'=>User::all(),
          'entities'=>Entity::all(),
  
      ];
  
        return view('jobs/categories/create', $data);
      }
    /* insert neew records*/
  
      public function insert(Request $request){
  
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'desc' => 'required',
  
        ]);
  
        if ($validation->fails()) {
            Session::flash('danger', 'Error, hay datos que no se imputaron en el formulario, por favor intentelo de nuevo.');
            return redirect()->back();
        } else {
            $cat = new Cat;
            $cat->name = $request->name;
            $cat->desc = $request->desc;
  
  
            $cat->save();
  
            Session::flash('success', 'Felicidades, la categoria fue creado satisfactoriament.');
            return redirect('cats');
        }
      }
  
  
      // edit recoreds
      public function edit($id){
        $data = [
            'cat' => Cat::find($id),
  
        ];
          return view('jobs/categories/edit', $data);
  
      }
      // save edited recoreds
      public function update(Request $request){
        $validation = Validator::make($request->all(), [
            'cat_id' => 'required',
            'name' => 'required',
            'desc' => 'required',
  
            //'company_id' => 'required_if:has_company,on',
  
        ]);
  
        if ($validation->fails()) {
            Session::flash('danger', 'Error, hay datos que no se imputaron en el formulario, por favor intentelo de nuevo.');
            return redirect()->back();
        } else {
            $cat = Cat::where('id', $request->cat_id)->first();
            $cat->name = $request->name;
            $cat->desc = $request->desc;
            $cat->save();

            Session::flash('success', 'Felicidades, la categoria fue actualizado satisfactoriamente.');
            // return redirect()->back();
            return redirect('cats');
  
        }
      }
  
      //delete recoreds
      public function destroy($id)
      {
          $cat = Cat::find($id) ;
  
          if($cat->jobs()->count()) {
              Session::flash('danger', 'Atencion, hay oefrtas con esta categoria asignado, no puede ser eliminado.');
              return redirect()->back();
          }
          $cat->delete() ;
          Session::flash('success', 'La Categoria fue eliminada') ;
          return redirect('cats');
      }
  
      //get cat jobs offfer
  
      public function cat_page($id){
  
        return view('jobs/cats/page', $data);
      }
  
      public function GetcatID($id){
        $data = [
          'cat'=>Cat::find($id),
          'entities' => Entity::all(),
            'imgs'=>Appimage::all(),
            'txt'=>'ola mundo',
  
          'jobs' => Job::all(),
         //'cats' => App\Cat::with('jobs')->where('name', $category)->get(),
  
         'cats'=>Cat::with('jobs')->where('id', $id)->get(),
  
      ];
  
      return view('jobs/cats/page', $data);
  
      }
  
}
