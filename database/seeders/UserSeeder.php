<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
   $object= new \App\Models\User;
   $object->role_id=1;
   $object->entity_id=1;
   $object->name= "jose";
   $object->second_name= "edu";
   $object->email= "jose@gmail.com";
   $object->phone= "222113053";
   $object->password= Hash::make('admin');
   $object->save();


   //user editor
   $object= new \App\Models\User;
   $object->role_id=2;
   $object->entity_id=1;
   $object->name= "tomas";
   $object->second_name= "edu";
   $object->phone= "222113054";
   $object->email= "juan@gmail.com";
   $object->password= Hash::make('editor');
   $object->save();
    }
}
