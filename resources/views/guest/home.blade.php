@extends('layouts.guest')

@section('content')

    <div class="container py-5">
        <h1>HOME Pubblica!!</h1>
        <a class="btn btn-dark" href="{{route('admin.home')}}">
            vai al login
        </a>
    </div>

@endsection
