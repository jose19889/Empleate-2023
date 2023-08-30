<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //
      $items = [
          ['Administrador', 'web'],
          ['Editor', 'web2', ],
          ['aplicant', 'web3', ],
      ];

      for($i = 0; sizeof($items) > $i; $i++) {
          Role::create([
              'name' => $items[$i][0],
              'desc' => $items[$i][1],
          ]);
      }
    }
}
