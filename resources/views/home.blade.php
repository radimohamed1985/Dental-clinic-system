@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">

        <div class="col-md-8">

        </div>
    </div>

    <div class="antialiased">
        <div class="container home">
            @if (Session::has('message'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('message')}}
        </div>
        @endif
    </div>
</div>

@endsection
