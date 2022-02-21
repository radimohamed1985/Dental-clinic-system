<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
   protected $table = 'bill';
   protected $guarded =[];
   public function patient(){
       return $this->belongsTo(Patient::class,'patient_id');
   }
   public function procedure(){
    return $this->belongsTo(Procedure::class,'service_id');
}
}
