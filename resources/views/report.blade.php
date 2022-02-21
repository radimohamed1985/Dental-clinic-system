@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{url('adding')}}" method="post">
        @csrf



<table class="table">
    <thead>
        <tr>
            <td colspan="2">
                Patient Report
            </td>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td>name</td>
            <td><input type="hidden" name="patient_id" id="" value="{{$patient->id}}">{{$patient->patient_name}}</td>
        </tr>

        <tr>
            <td>Diagnosis</td>
            <td><input type="text" name="Diagnosis" id="" class="form-control"></td>
        </tr>
        <tr>
            <td>Prescription</td>
            <td><input type="text" name="Prescription" id="" class="form-control"></td>
        </tr>
        <tr>
            <td>Lab/Rad_Tests</td>
            <td><input type="text" name="Lab" id="" class="form-control"></td>
        </tr>

        <tr>

            <td colspan="2"><input type="submit" value="ADD Report" class="form-control" ></td>
        </tr>

    </tbody>
</table>
</form>
</div>

@endsection

