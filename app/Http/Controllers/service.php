<?php

namespace App\Http\Controllers;

use App\Models\Procedure;
use Illuminate\Http\Request;

class service extends Controller
{
/*===================================================================================*/
//            Function To FIND ALL SERVICES AND PRICE OF EACH
/*===================================================================================*/
                public function index($id){
                    $service= Procedure::find($id);

                    return $service->price;
                }
}
