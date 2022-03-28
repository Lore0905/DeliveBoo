@extends('layouts.login-dashboard')

@section('content')
    <div class="container">
        @if ($foods)
            <h2 class="py-5">Non hai ancora nessun piatto inserito nel menù...</h2>

            <h3>Ti consiglio di aggiungerlo </h3>

            <a href="/admin/foods/create">aggiungi il tuo piatto</a>
        @endif
        <div class="row row-cols-3">

            @foreach ($foods as $food)
            {{-- col --}}
            <div class="col">

                <div class="card mb-3" >

                    {{-- img --}}
                    <img class="card-img-top" src="{{ asset('storage/' . $food->img) }}" alt="{{$food->name . 'immagine'}}">

                    {{-- body --}}
                    <div class="card-body">
                        <h5 class="card-title">{{$food->name}}</h5>
                        <p class="card-text">{{$food->descriptions}}</p>
                    </div>
                    
                    {{-- buttons --}}
                    <div class="card-body">
                        <a href="{{ route('admin.foods.show', ['food' => $food->id]) }}" class="card-link btn btn-primary">Dettagli piatto</a>
                    </div>
    
                </div>

            </div>
            @endforeach
        </div>
    </div>
@endsection