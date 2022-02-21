<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    protected $table ='procedures_list_tabel';
    protected $guarded =[];

    public function bill(){
        return $this->belongsTo(Bill::class,'service_id');
    }
}
