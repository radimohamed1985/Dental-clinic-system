<?php

namespace App\Http\Controllers;

use App\Models\Bill as ModelsBill;
use App\Models\Vist;
use Illuminate\Http\Request;

class bill extends Controller
{
   public function index(Request $req){
 ModelsBill::create([
    'patient_id'=>$req->patient_id,
    'service_id'=>$req->service,
    'service_cost'=>$req->servicePrice,
    'service_date'=>date('Y-m-d')
]);
$vistType =Vist::where('patient_id',$req->patient_id)->where('vist_date',date('Y-m-d'));
$vistType->update([
    'vist_status'=>1
]);
return redirect()->route('home');
   }
}
