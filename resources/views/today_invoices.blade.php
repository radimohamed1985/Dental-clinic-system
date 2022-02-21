@extends('layouts.app')

@section('content')
<div class="container">

<table class="table">
<thead>
    <tr>
        <td colspan="3" class="text-center">client invoice</td>
    </tr>
</thead>
<tbody>
<td>Patient_Name</td>

<td>{{$client_name}}</td>
<td>DATE OF SERVICE</td>



@foreach ($ser_name as $S_name)

       <tr>

           <td>{{$S_name->procedure->procedures}}</td>

           <td> {{$S_name->procedure->price}}</td>
           {{-- @foreach ($transaction as $transact) --}}

<td> {{$S_name->service_date}}</td>





       </tr>

       {{-- @endforeach --}}

       @endforeach



    <tr>
        <td >Total</td>
        <td >{{$total}}</td>
    </tr>
    <tr id="printbtn">
        <td colspan="3"><a  class="btn btn-secondary form-control" id="print">PrinT</a></td>
    </tr>
</tbody>
</div>
</table>
@endsection

