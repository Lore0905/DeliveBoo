@extends('layouts.login-dashboard')

@section('page-title')
    Il tuo piatto su Deliveboo
@endsection

@section('content')
    <div class="food-show">

        <div class="container">

            <div class="single-food">

                <div class="row row-cols-1 row-cols-lg-2">

                    <div class="col">
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
                            <strong>{{$food->price}}</strong>           
                        </div>
                    </div>

                    <div class="col">
                        {{-- Immagine --}}
                        <div class="img">
                            <div class="left-column">
                                <i class="far fa-image"></i>
                                Copertina:
                            </div>
                            <img src="{{asset('storage/' . $food->img)}}" alt="{{$food->name}}">
                        </div>
                    </div>

                </div>

                

                {{-- Link --}}
                <div class="d-flex align-items-center ">

                    {{-- Edit --}}
                    <div>
                        <a class="btn m_button m-b-992" href="{{ route('admin.foods.edit', ['food' => $food->id]) }}">Modifica piatto</a>
                    </div>
                    {{-- Delete --}}

                    <form action="{{ route('admin.foods.destroy', ['food' => $food->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
            
                        <button class="btn destroy-button-show-food btn-danger mx-4 m-b-992" onclick="return confirm('Sei sicuro di voler eliminare il piatto?')">Elimina</button>
                    </form>
                </div>

            </div>

        </div>

    </div>
@endsection