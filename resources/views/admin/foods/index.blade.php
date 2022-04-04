@extends('layouts.login-dashboard')

@section('page-title')
    Il tuo menù su Deliveboo
@endsection

@section('content')
    
    <div class="foods-index">

        <div class="container">

            @if ($foods->isEmpty())

                <h2 class="py-5">Non hai ancora nessun piatto inserito nel menù...</h2>

                <h5>Ti consiglio di aggiungerlo </h5>

                <a href="/admin/foods/create">Aggiungi il tuo primo piatto</a>

            @endif

            <div class="foods row">

                @foreach ($foods as $food)
                <div class="single-food col-xs-12 col-sm-12 col-md-6 col-lg-4">

                    {{-- {{dd($food)}} --}}

                    {{-- Immagine --}}
                    <div class="food-img">
                        <img src="{{asset('storage/' . $food->img)}}" alt="{{$food->name}}">
                    </div>

                    {{-- Nome piatto --}}
                    <div class="food-name">
                        {{$food->name}}
                    </div>

                    {{-- Descrizione --}}
                    <div class="food-description">
                        <span class="left-column">
                            Descrizione:
                        </span>
                        {{$food->descriptions}}
                    </div>

                    {{-- Ingredienti --}}
                    {{-- <div class="food-ingrediants">
                        <span class="left-column">
                            Ingredienti:
                        </span>
                        {{$food->ingrediants}}
                    </div> --}}

                    {{-- Prezzo --}}
                    <div class="price-food">
                        <span class="left-column">
                            Prezzo:
                        </span>
                        {{$food->price}} €
                    </div>

                    {{-- Visualizza --}}
                    <div class="mt-2">
                        <a class="link m_button" href="{{route('admin.foods.show', ['food' => $food->id])}}">
                            Visualizza il piatto
                        </a>
                    </div>

                </div>
                @endforeach

            </div>

        </div>

    </div>

@endsection