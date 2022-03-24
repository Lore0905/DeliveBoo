@extends('layouts.login-dashboard')

@section('content')
    <div class="container">
        <h1>{{$restaurant_to_show->name}}</h1>
        <img src="{{ asset('storage/' . $restaurant_to_show->image ) }}" alt="{{ $restaurant_to_show->name . 'image' }}">
        <div>Indirizzo: {{$restaurant_to_show->address}}</div>
        <div>Telefono: {{$restaurant_to_show->phone_number}}</div>

        <div>
            Tipologie:
            @foreach ($restaurant_to_show->types as $type)
                {{ $type->name }}
                @if (!$loop->last)
                    ,
                @endif
            @endforeach
        </div>
    </div>
@endsection