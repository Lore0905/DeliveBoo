@extends('layouts.login-dashboard')

@section('content')
    <section>
        <div class="container">
            
            <h1>{{ $food->name }}</h1>
            <div class="my-3"><span class="font-weight-bold">Slug:</span> {{ $food->slug }}</div>

            @if ($food->img)
                <img class="" src="{{ asset('storage/' . $food->img) }}" alt="{{ $food->name }}">
            @endif

            <p>{{ $food->descriptions }}</p>

            <p><span class="font-weight-bold">Ingredienti:</span> {{ $food->ingrediants }}</p>

            <div class="font-weight-bold">{{ $food->price }} €</div>

            {{-- edit / delete buttons  --}}

            <a class="btn btn-primary mb-2" href="{{ route('admin.foods.edit', ['food' => $food->id]) }}">Modifica piatto</a>

            <form action="{{ route('admin.foods.destroy', ['food' => $food->id]) }}" method="post">
                @csrf
                @method('DELETE')
    
                <button class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare il piatto?')">Elimina</button>
            </form>
        </div>
    </section>
@endsection