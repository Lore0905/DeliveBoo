@extends('layouts.login-dashboard')

@section('content')

    <div class="restaurant-show">

        <div class="container">

            <div class="single-restaurant">

                {{-- Nome --}}
                <h1>
                    {{$restaurant_to_show->name}}
                </h1>

                {{-- Slug --}}
                <div class="slug">
                    {{$restaurant_to_show->slug}}
                </div>

                {{-- {{dd($restaurant_to_show->types)}} --}}

                {{-- Tipologie --}}
                @if (isset($restaurant_to_show->types))
                <div class="types">
                    <span class="column-name">
                        <i class="fas fa-utensils"></i>
                        Tipologia/e:
                    </span>
                    @foreach ($restaurant_to_show->types as $type)
                        {{$type->name}}{{$loop->last ? '' : ', '}}
                    @endforeach
                </div>
                @endif

                {{-- Indirizzo --}}
                <div class="address">
                    <span class="column-name">
                        <i class="fas fa-map-pin"></i>
                        Indirizzo:
                    </span> 
                    {{$restaurant_to_show->address}}
                </div>

                {{-- Telefono --}}
                <div class="phone-number">
                    <span class="column-name">
                        <i class="fas fa-phone"></i>
                        Numero di telefono:
                    </span> 
                    {{$restaurant_to_show->phone_number}}
                </div>

                {{-- Vat --}}
                <div class="vat">
                    <span class="column-name">
                        Partita IVA:
                    </span> 
                    {{$restaurant_to_show->vat}}
                </div>

                {{-- Immagine --}}
                <div class="image">
                    <div class="column-name pb-3">
                        <i class="fas fa-camera"></i>
                        Copertina:
                    </div> 
                    <img src="{{asset('storage/' . $restaurant_to_show->image)}}" alt="{{$restaurant_to_show->name}}">
                </div>

            </div>

        </div>

    </div>
    
@endsection