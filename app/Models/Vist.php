<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vist extends Model
{
    protected $table ='vists';
    protected $guarded =[];

    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id');
    }

}
