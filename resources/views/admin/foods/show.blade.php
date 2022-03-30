@extends('layouts.login-dashboard')

@section('content')
    <div class="food-show">

        <div class="container">

            <div class="single-food">

                {{-- Nome del piatto --}}
                <h1 class="food-name">
                    {{$food->name}}
                </h1>

                {{-- Slug --}}
                <div class="slug">
                    <span class="left-column">
                        Slug:
                    </span>
                    {{$food->slug}}
                </div>

                {{-- Descrizione --}}
                <div class="description">
                    <span class="left-column">
                        Descrizione:
                    </span>
                    {{$food->descriptions}}
                </div>

                {{-- Ingredienti --}}
                <div class="ingrediants">
                    <span class="left-column">
                        <i class="fas fa-hamburger"></i>
                        Ingredienti:
                    </span>
                    {{$food->ingrediants}}
                </div>

                {{-- Prezzo --}}
                <div class="price">
                    <span class="left-column">
                        <i class="fas fa-money-bill-alt"></i>
                        Prezzo:
                    </span>
                    {{$food->price}}
                </div>

                {{-- Immagine --}}
                <div class="img">
                    <div class="left-column">
                        <i class="far fa-image"></i>
                        Copertina:
                    </div>
                    <img src="{{asset('storage/' . $food->img)}}" alt="{{$food->name}}">
                </div>

                {{-- Link --}}
                <div class="d-flex align-items-center justify-content-between">

                    {{-- Edit --}}
                    <div>
                        <a class="btn m_button" href="{{ route('admin.foods.edit', ['food' => $food->id]) }}">Modifica piatto</a>
                    </div>
                    {{-- Delete --}}

                    <form action="{{ route('admin.foods.destroy', ['food' => $food->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
            
                        <button class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare il piatto?')">Elimina</button>
                    </form>
                </div>

            </div>

        </div>

    </div>
@endsection