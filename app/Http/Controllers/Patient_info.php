<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Procedure;
use App\Models\Vist;
use Illuminate\Http\Request;

class Patient_info extends Controller
{
    /*===================================================================================*/
//            Function To Find If these Patient Have Reservation and get  status
/*===================================================================================*/
    public function index(Request $req){
                $patients =Patient::where('patient_phone',$req->phoneSearch)->first();
                if($patients){
                    $status =Vist::where('patient_id',$patients->id)->where('vist_status',0)->first();

                    return view('reservation',compact('patients','status'));
                }
                else{
                    return view('reservation',compact('patients'));
                }  }
    public function reserve(){
        return view('reservation');

            }
    /*===================================================================================*/
//            Function To PrePare The Invoice
/*===================================================================================*/
            public function bill(Request $req){
                $patients =Patient::where('patient_phone',$req->patient_phone)->first();
                $services =Procedure::get();

                return view('bill',compact('patients','services'));


                    }
}
