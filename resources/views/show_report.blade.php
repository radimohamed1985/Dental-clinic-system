@extends('layouts.app')

@section('content')
<div class="container">
<table class="table">
    @foreach ($reports as $report)
    <thead>
        <td colspan="2" class="text-center">Report {{$report->id}}{{$p_name}}</td>
    </thead>
    <tbody>
        <tr>
            <td>Diagnose</td>
            <td>{{$report->Diagnosis}}</td>
        </tr>
        <tr>
            <td>Prescription</td>
            <td>{{$report->Prescription}}</td>
        </tr>
        <tr>
            <td>Lab/Rad_test</td>
            <td>{{$report['Lab/Rad_Tests']}}</td>
        </tr>
    </tbody>
    @endforeach
</table>

</div>
@endsection
