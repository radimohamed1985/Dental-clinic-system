@extends('layouts.app')

@section('content')
<div class="container">




@if (empty($_POST))


<table class="table" border="1px solid gray">
    <form action="{{url('reservation')}}" method="post" id="add">
        @csrf
    <thead>

        <tr>
        <td colspan="2" class="head">RESERVATION FORM</td>
    </tr>

    </thead>
    <tbody>
    <tr>
        <td>clientName: </td>

        <td><input type="text" name="patient_name" class="form-control" value="{{$_GET['patient_name']}} "></td>
    </tr>
    <tr>
        <td>phone: </td>
        <td><input type="text" name="patient_phone" class="form-control" value="{{ $_GET['phoneSearch']}}"></td>
    </tr>
    <tr>
        <td>address: </td>
        <td><input type="text" name="patient_address" class="form-control" value=" {{$_GET['patient_address']}}"></td>
    </tr>
    <tr>
        <td>Age: </td>
        <td><input type="text" name="patient_age" class="form-control" value="{{$_GET['patient_age']}} "></td>
    </tr>
    <tr>
        <td>Date: </td>
        <td><input type="date" name="date" value=" "></td>
    </tr>
    <tr>
        <td>Time: </td>
        <td><input type="time" name="time" value=" "></td>
    </tr>




<tr>
    <td>vist_type: </td>
    <td>
        <label for="vist">vist</label>
        <input type="radio" name="visttype" id="vist" value="0">
        <label for="consult">consult</label>
    <input type="radio" name="visttype" id="consult" value="1">
    </td>
</tr>
<input type="hidden" name="status" value="0">

<tr>
    <td colspan="2"><input type="submit" value="reserve" class="form-control"></td>
</tr>
</tbody>
</form>
</table>



@else
                            @if ($patients != null)
                            <table class="table" border="1px solid">
                                <form action="{{url('bill')}}" method="post">
                                    @csrf
                                <thead>
                                    <tr>
                                    <td colspan="2" class="head">RESERVATION FORM</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>clientName: </td>
                                    <td><input type="text" name="patient_name" class="form-control" value=" {{$patients->patient_name}}"></td>
                                </tr>
                                <tr>
                                    <td>phone: </td>
                                    <td><input type="text" name="patient_phone" class="form-control" value=" {{$patients->patient_phone}}"></td>
                                </tr>
                                <tr>
                                    <td>Age: </td>
                                    <td><input type="text" name="patient_age" value=" {{$patients->patient_age}}"></td>
                                </tr>
                                <tr>
                                    <td>Address: </td>
                                    <td><input type="text" name="patient_address" class="form-control" value=" {{$patients->patient_address}}"></td>
                                </tr>
                                <tr>
                                    <td>status</td>
                                    <td>
                                        @if ($status)


                                        @if ($status->vist_status === 0)
                                            reservation {{$status->vist_date}}
                                            @elseif ($status->vist_status === 1 )
                                            No new resevation
                                        @endif
                                        @else
                                        No new resevation
                                        @endif
                                        </td>
                                </tr>
                                <tr>
                                    <td>
                                    <input type="submit" value="Invoice & confirm vist" class="form-control btn btn-primary">
                                    </td>
                                    <td>
                                    </form>
                                        <form action="{{url('reserve')}}" method="get">
                                            <input type="hidden" name="phoneSearch" class="form-control" value=" {{$patients->patient_phone}}">
                                            <input type="hidden" name="patient_name" class="form-control" value=" {{$patients->patient_name}}">
                                            <input type="hidden" name="patient_age" value=" {{$patients->patient_age}}">
                                            <input type="hidden" name="patient_address" value=" {{$patients->patient_address}}">
                                            <input type="submit" value="new reservation" class="form-control btn btn-danger">
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1"><a href="{{url('report/'.$patients->id)}}" class="btn btn-dark form-control">Patient Report</a></td>
                                    <td colspan="1"><a href="{{url('addreport/'.$patients->id)}}" class="btn btn-dark form-control">ADD Patient Report</a></td>
                                </tr>

      @else

   <h1 class="text-center"> NEw Patient</h1>
   <table class="table" border="1px solid gray">
    <form action="{{url('reservation')}}" method="post" id="add">
        @csrf
    <thead>
        <tr>
        <td colspan="2" class="head text-center">RESERVATION FORM</td>
    </tr>

    </thead>
    <tbody>
    <tr>
        <td>clientName: </td>
        <td><input type="text" name="patient_name" class="form-control" value=" "></td>
    </tr>
    <tr>
        <td>phone: </td>
        <td><input type="text" name="patient_phone" class="form-control" value="<?php echo $_POST['phoneSearch'] ?> "></td>
    </tr>
    <tr>
        <td>Age: </td>
        <td><input type="text" name="patient_age" class="form-control" value=" "></td>
    </tr>
    <tr>
        <td>address: </td>
        <td><input type="text" name="patient_address" class="form-control" value=" "></td>
    </tr>
    <tr>
        <td>Date: </td>
        <td><input type="date" name="date" value=" ">

        </td>

    </tr>
    <tr>
        <td>Time: </td>
        <td><input type="time" name="time" value=" "></td>
    </tr>
    <tr>
        <td>vist_type: </td>
        <td>
            <label for="vist">vist</label>
            <input type="radio" name="visttype" id="vist" value="0">
            <label for="consult">consult</label>
        <input type="radio" name="visttype" id="consult" value="1">
        </td>
    </tr>
        <input type="hidden" name="status" value="0">
        <tr>
            <td colspan="2"><input type="submit" value="Book Reservation" class="form-control btn btn-primary"></td>
        </tr>
        </tbody>
        </form>
        </table>


   @endif
    @endif
</tbody>
</form>
</table>




</div>

<div id="result">



     </div>

@endsection
