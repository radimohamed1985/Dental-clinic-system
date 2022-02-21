<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Patient;
use App\Models\Vist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class Reservation extends Controller
{
        /*===================================================================================*/
//            Function To ADD VIST RESERVATION BY 5 VISTS PER DAY AS MAXIMUM
/*===================================================================================*/
    public function index(Request $req){
        // CHECK VISTS ON THIS DAY IF THERE IS 5 RESERVATION SO YOU CAN'T MAKE RESERVATION
        $validateDate =Vist::where('vist_date',$req->date)->get();
        if(count($validateDate) >= 5){
                    $msg= [
                        'message'=>'Sorry Day Is Full',
                        'phone'=> $req->patient_phone
                    ];
                return redirect()->route('home')->with($msg);
        }
        //IF LESS THAN 5 YOU CAN MAKE RESERVATION
        else{
            // FIRST CHECK IF THESE PATIENT ON DATABASE TO DON'T DUPLICAT PATIENT
            $checkpatient = Patient::where('patient_phone',$req->patient_phone)->get()->first();
            if($checkpatient === null){
                Patient::create([
                    'patient_name'=>$req->patient_name,
                    'patient_phone'=>$req->patient_phone,
                    'patient_age'=>$req->patient_age,
                    'patient_address'=>$req->patient_address,
                ]);
                $patient_id = Patient::get()->last();
                Vist::create([
                    'patient_id'=>$patient_id->id,
                    'vist_date'=>$req->date,
                    'vist_time'=>$req->time,
                    'vist_type'=>$req->visttype,
                    'vist_status'=>$req->status
                ]);
                return redirect()->route('home')->with('message','Reservation Done');
            }
// IF PATIENT ON OUR DATA BASE DON'T CREATE AGAIN AND CREATE ENTRY ON VIST TABLE
                else{
                        Vist::create([
                            'patient_id'=>$checkpatient->id,
                            'vist_date'=>$req->date,
                            'vist_time'=>$req->time,
                            'vist_type'=>$req->visttype,
                            'vist_status'=>$req->status
                        ]);
                        return redirect()->route('home');
                    }} }
 /*===================================================================================*/
//            Function To FIND CLIENT BALANCE ON THESE DAY THAT HE VIST CLINIC
/*===================================================================================*/

    public function today($id){
            $transaction = Bill::with('patient')->where('patient_id',$id)->where('service_date',date('Y-m-d'))->get();
            $services_name =Bill::with('procedure')->where('patient_id',$id)->where('service_date',date('Y-m-d'))->get();

            $ser_name = $services_name->map(function($e){ return $e;});
            if(!count($transaction )== 0){

            $total =$transaction->sum('service_cost');
            foreach($transaction as $transact)
            $client_name =  $transact->patient->patient_name;


            return view('today_invoices',compact('transaction','client_name','total','ser_name'));
        }
        else{
            return 'No Invoice For This Patient Today';
        }
}
 /*===================================================================================*/
//            Function To FIND CLIENT BALANCE ALL INVOICES
/*===================================================================================*/
public function balance($id){
    $transaction = Bill::with('patient')->where('patient_id',$id)->get();
    $services_name =Bill::with('procedure')->where('patient_id',$id)->get();

    $ser_name = $services_name->map(function($e){ return $e;});
    // dd($ser_name);
    if(!count($transaction )== 0){
    $total =$transaction->sum('service_cost');
    foreach($transaction as $transact)
    $client_name =  $transact->patient->patient_name;


    // dd($date);
    return view('today_invoices',compact('transaction','client_name','total','ser_name'));}
    else{
        return 'No Invoice For This Patient';
    }
}
 /*===================================================================================*/
//            Function To FIND ALL RESERVATION ON THESE DAY BY GETTING DATE()
/*===================================================================================*/

    public function todayReservation($date){
        $todayReservations = Vist::with('patient')->where('vist_date',$date)->get();
        $todayReservationss= $todayReservations->map(function($reserve){
          return  $reserve->patient;
        });

        return view('today_reservations',compact('todayReservationss'));
    }
}
