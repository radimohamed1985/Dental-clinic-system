<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $table ='assessments';
    protected $guarded =[];

    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id');
    }
}
