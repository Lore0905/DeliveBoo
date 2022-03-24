@extends('layouts.login-dashboard')

@section('content')

    <h1>Benvenuto {{$user->name}}</h1>

    <div class="mb-3">{{$user->email}}</div>

    @if (isset($user->restaurant->user_id))
        <div class="mb-3">
            <a href={{ route('admin.restaurant.show', ['id' => $user->restaurant->id])  }}>Visualizza il tuo ristorante</a> 
        </div>        
    @else
        <div class="mb-3">
            <a href={{ route('admin.restaurant.create') }}>Crea il tuo ristorante</a>
        </div>
    @endif
    
    
@endsection