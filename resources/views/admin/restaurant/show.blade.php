@extends('layouts.login-dashboard')

{{-- @section('content')
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
@endsection --}}

@section('content')
    <div class="container">
        <section>
            <h3 style="margin: 10px">Il tuo ristorante:</h3>
            <div class="row">

                <div class="card">
                    <img src="{{ asset('storage/' . $restaurant_to_show->image ) }}" alt="{{ $restaurant_to_show->name . ' image' }}">
                    <div class="card-body">
                      <h3 class="card-title">{{$restaurant_to_show->name}}</h5>
                      <p class="card-text">Some description of the restaurant?</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <p style="font-weight: bolder" class="d-inline-block">Indirizzo:</p>
                            <div>
                                <p class="card-text">{{$restaurant_to_show->address}}</p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <p style="font-weight: bolder" class="d-inline-block">Numero di telefono:</p>
                            <div>
                                <p class="card-text">{{$restaurant_to_show->phone_number}}</p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <p style="font-weight: bolder" class="d-inline-block">Tipologie:</p>
                            <div>
                                @foreach ($restaurant_to_show->types as $type)
                                    <span class="badge badge-light" >{{ $type->name }}</span>
                                @endforeach     
                            </div>
                        </li>
                    </ul>
                  </div>
            
            </div>
        </section>
    </div>
@endsection