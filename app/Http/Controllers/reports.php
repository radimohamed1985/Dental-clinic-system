<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Patient;
use Illuminate\Http\Request;

class reports extends Controller
{
    /**
     * first function to find the patient report with relation with patient model
     * to get name and id
     */
   public function index($id){
      $reports= Assessment::with('patient')->where('patient_id',$id)->get();
      /* check if there is report for this patient if it found continue*/
      if(count($reports) != '0'){
      $patient_name =  $reports->map(function($e){return $e->patient;});

            foreach($patient_name as $name)
             { $p_name = $name->patient_name;
            return view('show_report',compact('reports','p_name'));
             }}
      else{
                /* if Not found return home with phone number to repeat search and error message*/
                $phone = Patient::find($id)->first();
                $msg =[
                    'message'=>'sorry no report available for this client',
                    'phone'=>$phone->patient_phone
                ];
                return redirect()->route('home')->with($msg);
            } }
/*===================================================================================*/

            /* Now its function to go to report Page with Patient Id*/
 /*===================================================================================*/

            public function addreport($id){
                $patient=Patient::find($id)->first();
                return view('report',compact('patient'));
            }
/*===================================================================================*/
//                       Function To Add Report To Data Base
/*===================================================================================*/

   public function adding(Request $req){
    Assessment::create(
    [
        'patient_id'=>$req->patient_id,
        'Diagnosis'=>$req->Diagnosis,
        'Prescription'=>$req->Prescription,
        'Lab/Rad_Tests'=>$req->Lab,

    ]
    );
   }
}
