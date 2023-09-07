<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;
//use App\Models\Email;
use App\Models\Entity;
use App\Models\User;
use App\Models\Province;
use App\Models\City;
use App\Models\Job;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class EntitiesController extends Controller
{
    //
    public function index(){

        $data=[
          'user' => auth()->user(),
            'entity' => Entity::all(),
            'entities' => Entity::all(),
            'jobs' => job::all(),
            'province' => Province::all(),
            'cat' => Cat::all(),
            'users' =>User::all(),
        ];
         return view('companies/index', $data);
       }
   
       public function create(){
           $data=[
              'user' => auth()->user(),
               //'provinces' =>  DB::table('provinces')->pluck("name","id"),
               'countries'=>Province::all(),
               'provinces'=>Province::all(),
               'entities'=>Entity::all(),
               'users' =>User::all(),
             

           ];
       
         return view('companies/create', $data);
       }

       

  public function getcity(Request $request)
  {
      $cities = DB::table("cities")
                  ->where("province_id",$request->province_id)
                  ->pluck("name","id");
      return response()->json($cities);
  }

      
       public function insert(Request $request){
         $validation = Validator::make($request->all(), [
             'name' => 'required',
             'owner' => 'required',
             'owner_tel' => 'required',
             'province_id' => 'required',
             'city_id' => 'required',
             'email' => 'required',
             'web_url' => 'required',
   
         ]);
   
         if ($validation->fails()) {
           
             Session::flash('danger', 'Error, hay datos que no se imputaron en el formulario, por favor intentelo de nuevo.');
             return redirect()->back();
         } else {
             $entity = new Entity;
             $entity->name = $request->name;
             $entity->owner = $request->owner;
             $entity->province_id = $request->province_id;
             $entity->city_id = $request->city_id;
             $entity->owner_tel = $request->owner_tel;
             $entity->web_url = $request->web_url;
             $entity->email = $request->email;
             $entity->save();
   
   
             //add emails for entity
             $emails = json_decode($request->emails);
             if(is_array($emails)) {
                 if (count($emails)) {
                     foreach ($emails as $email) {
                         $emails = new Email;
                         $emails->entity_id= $entity->id;
                         $emails->emails = $email->value;
                         $emails->save();
                     }
                 }}
             Session::flash('success', 'Felicidades, la empresa fue creada satisfactoriament.');
             return redirect('entities');
         }
   
       }
   
       //get single edit records
       public function edit($id){
        $user =auth()->user();
        $entities = Entity::all();
        $provinces = Province::all();
        $cats = Cat::all();
         $entity= Entity::find($id);
        $cities= City::where('province_id', $entity->province_id)->get();
        
         return view('companies.edit', compact( 'cities', 'provinces', 'cats', 'entity','user'));
   
       }

     
       public function update(Request $request){
   
         $validation = Validator::make($request->all(), [
           'name' => 'required',
           'owner' => 'required',
           'owner_tel' => 'required',
           'web_url' => 'required',
             'province_id' => 'required',
             'city_id' => 'required',
         ]);
   
         if ($validation->fails()) {
          
           Session::flash('danger', 'Error, hay datos que no se imputaron en el formulario, por favor intentelo de nuevo.');
           return redirect()->back();
   
         } else {
   
           $entity = entity::where('id', $request->entity_id)->first();
           $entity->name = $request->name;
           $entity->owner = $request->owner;
           $entity->province_id = $request->province_id;
           $entity->city_id = $request->city_id;
           $entity->owner_tel = $request->owner_tel;
           $entity->web_url = $request->web_url;
           $entity->province_id = $request->province_id;
           $entity->city_id = $request->city_id;
   
           //entity edit mails
             /* $email= array('pan', 'te')
             $emails = json_decode($request->emails);
            if(is_array($emails)) {
                 if (count($emails)) {
                     foreach ($emails as $email) {
                         $emails = new Email;
                         $emails->entity_id= $entity->id;
                         $emails->emails = $email->value;
                         $emails->save();
                     }
                 }}*/
           $entity->save();
   
            
   
            //  if($request->file('image')){
            //      $file= $request->file('image');
            //      $filename= date('YmdHi').$file->getClientOriginalName();
            //      $file-> move(public_path('public/img'), $filename);
            //      $data['image']= $filename;
            //  }
            //  $data->save();
   
   
   
           Session::flash('success', 'Felicidades, la empresa fue editado satisfactoriamente.');
   
           return redirect('entities');
         }
       }
   
   
       public function destroy($id)
       {
           $entity = Entity::find($id) ;
   
           if($entity->jobs()->count()) {
               Session::flash('danger', 'Atencion, hay ofertas con esta empresa asignado, no puede ser eliminado.');
               return redirect()->back();
           }
   
           $entity->delete() ;
           Session::flash('success', 'entity was deleted') ;
           return redirect('entities');
       }
   
}
