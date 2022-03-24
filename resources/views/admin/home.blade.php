@extends('layouts.dashboard')

@section('content')

    <h1>Benvenuto {{$user->name}}</h1>

    <p>
        {{$user->name}}
    </p>

    <p>
        {{$user->email}}
    </p>
    
@endsection