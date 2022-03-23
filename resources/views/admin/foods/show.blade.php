@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            
            <h1>{{ $food->name }}</h1>
            <div class="my-3"><span class="font-weight-bold">Slug:</span> {{ $food->slug }}</div>

            {{-- @if ($food->img)
                <img class="" src="{{ asset('storage/' . $food->img) }}" alt="{{ $food->name }}">
            @endif --}}

            <p>{{ $food->descriptions }}</p>

            {{-- <a class="btn btn-primary mb-2" href="{{ route('admin.restaurant.edit', ['food' => $food->id]) }}">Modifica piatto</a> --}}

            <p><span class="font-weight-bold">Ingredienti:</span> {{ $food->ingrediants }}</p>

            <div class="font-weight-bold">{{ $food->price }} €</div>
        </div>
    </section>
@endsection