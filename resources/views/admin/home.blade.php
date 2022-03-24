@extends('layouts.dashboard')

@section('content')

    <h1>Benvenuto {{$user->name}}</h1>

    <p>
        {{$user->name}}
    </p>

    <p>
        {{$user->email}}
    </p>

    @if (isset($user->restaurant->user_id))
        <p>
            <a href="#">visualizza il tuo ristorante</a> 
        </p>        
    @else
        <p>
            <a href="#">crea il tuo ristorante</a>
        </p>
    @endif
    
    
@endsection