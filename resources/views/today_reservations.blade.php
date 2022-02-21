@extends('layouts.app')

@section('content')
<div class="container">

<table class="table">
<thead>
    <tr>
        <td colspan="4" class="text-center">Reservation Schedule</td>
    </tr>
</thead>
<tbody>
@foreach ($todayReservationss as $todayReserve )
    <tr class="text-center">
        <td style="background-color: #EEE;text-ali" class="text-center">Name</td>
        <td class="text-center">{{$todayReserve->patient_name}}</td>
        <td style="background-color: #EEE" class="text-center">Phone</td>
        <td class="text-center">{{$todayReserve->patient_phone}}</td>
    </tr>
@endforeach
    <tr id="printbtn">
        <td colspan="4"><a  class="btn btn-secondary form-control" id="print">PrinT</a></td>
    </tr>
</tbody>
</div>
</table>
<a href="{{url('home')}}" class="btn btn-dark">Home</a>
@endsection

