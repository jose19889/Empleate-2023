<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Requirements;

class ReqsSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //
        $requirements = [
            ['001 - ACTA DE NACIMIENTO', 'Detalles del documento requerido...'],
            ['002 - DIP', 'Detalles del documento requerido...'],
            ['003 - TITULO UNIVERSITARIO', 'Detalles del documento requerido...'],
            ['004 - CERTIFICADO DEL  EMPLEADOR', 'Detalles del documento requerido...'],
            ['004 - TITULO PROEFSIONAL', 'Delles del documento requerido...'],
        
        ];

        for($i = 0; sizeof($requirements) > $i; $i++) {
            Requirements::create([
                'name' => $requirements[$i][0],
                'desc' => $requirements[$i][1],
            ]);
        }
    }

}
