<?php

namespace Database\Seeders;

use App\Models\Procedure;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class procedurelist extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    $services = ['vist','consult','Tooth-Fill','Tooth-wash','service3'];
    foreach($services as $service){


            Procedure::create([
                'procedures'=>$service,
                'price'=>random_int(100,200)

            ]);
        }
    }
}
