@extends('layouts.app')

@section('content')
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('admin.foods.update',['food'=>$food->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- name --}}
            <div class="mb-3">
                <label for="name" class="form-label">Nome del piatto</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="inserisci il nome del piatto" value="{{ old('name', $food->name) }}">
            </div>

            {{-- img --}}
            <div class="mb-3">
                <label for="img" class="form-label">Immagine</label>
                <input type="file"  id="img" name="img" placeholder="inserisci la tua immagine" value="{{ old('img', $food->img) }}">
            </div>

            {{-- ingredienti --}}
            <div class="mb-3">
                <label for="ingrediants" class="form-label">Ingredienti</label>
                <input type="text" class="form-control" id="ingrediants" name="ingrediants" placeholder="inserisci i tuoi ingredienti" value="{{ old('ingrediants', $food->ingrediants) }}">
            </div>

            {{-- description --}}
            <div class="mb-3">
                <label for="descriptions" class="form-label">description</label>
                <textarea class="form-control" id="descriptions" name="descriptions">{{old('descriptions',$food->descriptions)}} </textarea>
            </div>

            {{-- price --}}
            <div class="mb-3">
                <label for="price" class="form-label">prezzo</label>
                <input type="number" step=".01" class="form-control" id="price" name="price" placeholder="inserisci il prezzo" value="{{ old('price', $food->price) }}">
            </div>

            {{-- checkbox --}}
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="visible" checked value="1" name="visible">
                <label for="visible"  >
                    visibile
                </label>
            </div>

            {{-- button --}}
            <button type="submit" class="button-edit-restaurant">
                Invia
            </button>

        </form>
    </div>
@endsection