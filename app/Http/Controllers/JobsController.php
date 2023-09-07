<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat;
use App\Models\Queque;
use App\Models\Entity;
use App\Models\job;
use App\Mail\JobsAplly;
use App\Models\User;
use App\Models\Email;
use App\Models\Province;
use App\Models\UserJob;
use App\Models\City;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

//use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use File;

class JobsController extends Controller
{
     //add job offers
     public function index(){
        if(auth()->user()->role_id=='1'){
            $jobs=Job::all();
        }else{
            $jobs=Job::where('entity_id', '=', auth()->user()->entity_id)->get(); 
        }

         $data = [
             'entity' => Entity::all(),
             'entities' => Entity::all(),
             'jobs'=>$jobs,
             //'jobs' =>Job::where('entity_id', '=', auth()->user()->entity_id)->get(),
             'cat' => Cat::all(),
             'users' => User::all(),
             'user' => auth()->user(),
         ];

        

        
         return view('jobs/index', $data);
     }
 
     public function create(){
         $data = [
            'jobs' => Job::all(),
             'provinces' => Province::all(),
             'cities' => City::all(),
             'entities' => Entity::all(),
             'cats' => Cat::all(),
             'users' => User::all(),
             'user' => auth()->user(),
         ];

 
         return view('jobs/create', $data);
     }
 
    //add province adn  cities
     public function get_city($id){

        $job= Job::where('id', $id)->first();
        $cities = DB::table("cities")->where("province_id",$id)->pluck("name","id");
         return json_encode($cities);

     }

     // create jobs
     public function insert(Request $request)
     {
         $validation = Validator::make($request->all(), [
             'job_title' => 'required',
             'vacancy' => 'required',
             'job_sumary' => 'required',
             'cat_id' => 'required',
             'province_id' => 'required',
             'city_id' => 'required',
             'job_salary' => 'required',
             'entity_id' => 'required',
            
 
         ]);
 
         if ($validation->fails()) {
             Session::flash('danger', 'Error, hay datos que no se imputaron en el formulario, por favor intentelo de nuevo.');
             return redirect()->back();
         } else {
        
             $jobs = new job;
             $jobs->job_title = $request->job_title;
             $jobs->vacancy = $request->vacancy;
             $jobs->job_sumary = $request->job_sumary;
             $jobs->cat_id = $request->cat_id;
             $jobs->city_id = $request->city_id;
             $jobs->province_id = $request->province_id;
             $jobs->job_salary = $request->job_salary;
             $jobs->entity_id = $request->entity_id;
             $jobs->save();
           
             //$job->emails()->delete();
            $user=auth()->user()->id;

            $user_job = new UserJob;

            $user_job->jobs_id = $jobs->id;
            $user_job->user_id = $user;
            $user_job->save();
          
             Session::flash('success', 'Felicidades, la oferta fue creado satisfactoriamente.');
             return redirect('jobs');
 
         }
     }
 
 
     //get edit form
     public function edit($id)
     {
        $entities = Entity::all();
        $provinces = Province::all();
        $cats = Cat::all();
         $job= job::find($id);
        $user=  auth()->user();
         $cities= City::where('province_id', $job->province_id)->get();
         return view('jobs.edit', compact( 'cities','job', 'provinces', 'cats', 'entities', 'user'));
     }
 
 
     // save edited user to Database
     public function update(Request $request){
         $validation = Validator::make($request->all(), [
 
             'job_title' => 'required',
             'vacancy' => 'required',
             'job_sumary' => 'required',
             'cat_id' => 'required',
             'job_salary' => 'required',
             'entity_id' => 'required',
             //'company_id' => 'required_if:has_company,on',
 
         ]);
         
         if ($validation->fails()) {
             Session::flash('danger', 'Error, hay datos que no se imputaron en el formulario, por favor intentelo de nuevo.');
             return redirect()->back();
         } else {
             $job = job::where('id', $request->job_id)->first();
             $job->job_title = $request->job_title;
             $job->vacancy = $request->vacancy;
             $job->job_sumary = $request->job_sumary;
             $job->cat_id = $request->cat_id;
             $job->job_salary = $request->job_salary;
             $job->entity_id = $request->entity_id;
             //$user->active = $request->active == 'on' ? true : false;
             //$user->desc = $request->desc == '' ? null : $request->desc;
             $job->save();
 
             Session::flash('success', 'Felicidades, el modificado fue editado satisfactoriamente.');
             return redirect('jobs');
         }
     }

     
     public function destroy($id)
     {
         $job = Job::find($id);
 
    //      if($job->entity()->count()) {
    //      Session::flash('danger', 'Atencion, hay empresas asignadas a la oferta , no puede ser eliminada.');
    //      return redirect()->back();
    //    }
         if ($job->delete()) {
 
             $job->delete();
             Session::flash('success', 'Oferta de Empelo eliminada con exito');
             return redirect('jobs');
         }
     }
 
 
    ///////////////////////////////////////////////////
    ////////jobs frontend
    /////////////////////////////
     public function frontend()
     {
 
         $data = [
             'user' => auth()->user(),
             'entities' => Entity::all(),
             'cats' => Cat::all(),
             'jobs' => job::all(),
             'num_jobs' => Cat::with('jobs')->has('jobs')->get(),
         ];
         return view('layouts/jobs/dashboard', $data);
     }
 
     // get submit job form
     public function getjobForm($id)
     {
 
         $data = [
            'user' => auth()->user(),
             'job' => job::find($id),
             'entities' => Entity::all(),
             //'entities'=>Cat::all(),
         ];
 
         // get current job id details
         $job = job::find($id);
         $ent = Entity::all();
 
         if ($job = Job::find($id)) {
             $ent = Entity::all();

             $user= auth()->user()->email;
             $email = $job->Entity->email;
             //$email= $job->Entity->email;
 
 
             //session(['email' => '21']);
             Session::put('z', $job->Entity->id);
            Session::put('x', $job->Entity->email);
             Session::put('y', $job->job_title);
             Session::put('aplicant_email',$email );
 
             //session()->set('y', $y);
             return view('layouts/jobs/frontend/submit-form', $data);
 
             //$this->y= $job->Entity->email;
 
 
         }
     }
 
 
 // send form allied
     public function send_mail(Request $request)
     {
         $this->validate($request, [
             "emails.*"  => "required|string|distinct|min:3",
             'message' => 'required',
             'attachment' => 'required',
         ]);
 
         $data = [
            "emails.*"  => "required|string|distinct|min:3",
             'cats'=>Cat::all(),
             'message' => $request->message,
             'attachment' => $request->attachment,
             'title' => session('y'),
             'applicant' =>session('aplicant_email'),
             
 
         ];
         $path = public_path('uploads');
         $attachment = $request->file('attachment');
         $name = time() . '.' . $attachment->getClientOriginalExtension();
 
           if ($email = session('x')) {
 
                 \Mail::to($email)->send(new \App\Mail\JobsAplly($data));
 
         }
 
         
 
         Session::flash('success', 'Felicidades, El correo fue enviado satisfactoriamente.');
         return redirect()->intended('jobs/frontend');
     }
 
}
