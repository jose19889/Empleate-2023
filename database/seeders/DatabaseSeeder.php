<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
           // RoleAndPermissionSeeder::class,
            UserSeeder::class,
            RoleSeeder::class,
            ModuleSeeder::class,
            AccessSeeder::class,
            CitySeeder::class,
            ProvinceSeeder::class,
            //JobSeeder::class,
            //EntitySeeder::class,
        ]);
    }
}
