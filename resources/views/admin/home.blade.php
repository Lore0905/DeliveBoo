@extends('layouts.login-dashboard')

@section('content')

    <div class="admin-home container">
        <h1>Benvenuto {{$user->name}}</h1>

        {{-- {{dd($user)}} --}}

        <div class="email">
            La tua email: {{$user->email}}
        </div>

        @if (isset($user->restaurant->user_id))
            <div>
                <a class="link" href={{ route('admin.restaurant.show', ['id' => $user->restaurant->id])  }}>Visualizza il tuo ristorante</a> 
            </div>        
        @else
            <div>
                <a class="link" href={{ route('admin.restaurant.create') }}>Crea il tuo ristorante</a>
            </div>
        @endif
    </div>
    
    
@endsection