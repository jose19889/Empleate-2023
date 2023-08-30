<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $item = new Module;
        $item->order = 1;
        $item->icon = 'fas fa-user';
        $item->route = 'users';
        $item->name = 'Usuarios';
        $item->save();

        $item = new Module;
        $item->order = 2;
        $item->icon = 'fas fa-shield-alt';
        $item->route = 'roles';
        $item->name = 'Roles';
        $item->save();

        $item = new Module;
        $item->order = 3;
        $item->icon = 'fas fa-list-alt';
        $item->route = 'jobs';
        $item->name = 'Ofertas';
        $item->save();

        $item = new Module;
        $item->order = 4;
        $item->icon = 'fas fa-sensor-alert-alt';
        $item->route = 'cats';
        $item->name = 'Categorias';
        $item->save();

        $item = new Module;
        $item->order = 5;
        $item->icon = 'fas fa-sprinkler-alt';
        $item->route = 'entities';
        $item->name = 'Empresas';
        $item->save();
    }
}
