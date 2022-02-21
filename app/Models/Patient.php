<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table ='patients';
    protected $guarded =[];


    public function bill(){
        return $this->hasMany(Bill::class,'patient_id');
    }


}
