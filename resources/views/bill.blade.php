{{-- here the bill page to choose the service and pay for it  --}}
@extends('layouts.app')
@section('content')
<div class="container">
           <table class="table" border="1px solid">
            <form action="{{url('transaction')}}" method="post" >
                @csrf
            <thead>
                <tr>
                <td colspan="2" class="head" style="text-align: center">Recept</td>
            </tr>
            </thead>
            <tbody>
            <tr>

                <td>clientName:  <input type="text" name="patient_name" class="bill" value=" {{$patients->patient_name}}"><input type="hidden" name="patient_id" id="patient_id" value=" {{$patients->id}}"></td>


                    <td>
                    Age:  <input type="text" name="patient_age" value=" {{$patients->patient_age}}" class="bill"> </td>
                </td>
            </tr>
            <tr>
                <td>phone:<input type="text" name="patient_phone" class="bill" value=" {{$patients->patient_phone}}"> </td>
                <td>Address: <input type="text" name="patient_address" class="bill"value=" {{$patients->patient_address}}"></td>
            </tr>


            <tr>
                <td>Service Name </td>
                <td>Service Price</td>
            </tr>
            <tr>
                <td><select name="service" id="service" class="form-control">

                    <option class="text-center headOption"  value="">  &dArr;  -----Please Click Here to Choose service----- &dArr; </option>
                    @foreach ($services  as $service )
                        <option value="{{$service->id}}">{{$service->procedures	}}</option>
                    @endforeach
                    </select> </td>
                <td>

                    {{-- here text to put the price of service  --}}
                    <input type="text" name="servicePrice" id="servicePrice" class="bill">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center">
                    <a class="nav-link" href="{{url('/home')}}" id="addnew"><b>My Dental Clinic</b> </a>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Add Into Patient Account" class="btn btn-success form-control " id="patientAccount"></td>
                {{-- <td colspan="2"><input type="submit" value="Print Invoice" class="btn btn-success form-control "></td> --}}

            </tr>
            <tr>
                <td colspan="2"><a href="{{url('today/'.$patients->id)}}" class="form-control btn btn-dark">Print Today Invoice</a></td>

            </tr>
            <tr>
                <td colspan="2"><a href="{{url('balance/'.$patients->id)}}" class="form-control btn btn-dark">Print Patient BalanceStatment</a></td>

            </tr>
            </tbody>
            </form>
        </div>


            @endsection


