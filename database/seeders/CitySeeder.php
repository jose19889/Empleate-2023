<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
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
            ['Anisork', '1'],
            ['Malabo', '2', ],
            ['Ebebiying', '3', ],
            ['Bata', '4', ],
        ];

        for($i = 0; sizeof($items) > $i; $i++) {
            City::create([
                'name' => $items[$i][0],
                'province_id' => $items[$i][1],
            ]);
        }
    }
}
