<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class patiens_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0;$i<=100;$i++){
        Patient::create([
            'patient_name'=>'patient:'.$i,
            'patient_age'=>$i,
            'patient_phone'=>'1234'.$i,
            'patient_address'=>'alex_'.$i,
        ]);
    }
}
}
