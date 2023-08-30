<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Province;

class ProvinceSeeder extends Seeder
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
            ['Wele Nzas', 'WN'],
            ['Bioko Norte', 'BN', ],
            ['Centro Sur', 'CS', ],
            ['Litoral', 'LT', ],
        ];

        for($i = 0; sizeof($items) > $i; $i++) {
            Province::create([
                'name' => $items[$i][0],
                'abrev' => $items[$i][1],
            ]);
        }
    }
}
