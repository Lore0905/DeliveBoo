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

        <form action="{{route('admin.foods.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')

            {{-- name --}}
            <div class="mb-3">
                <label for="name" class="form-label">Nome del piatto</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="inserisci il nome del piatto">
            </div>

            {{-- img --}}
            <div class="mb-3">
                <label for="img" class="form-label">img</label>
                <input type="file"  id="img" name="img" placeholder="inserisci la tua immagine">
            </div>

            {{-- ingredienti --}}
            <div class="mb-3">
                <label for="ingredienti" class="form-label">Ingredienti</label>
                <input type="text" class="form-control" id="ingredienti" name="ingrediants" placeholder="inserisci i tuoi ingredienti">
            </div>

            {{-- description --}}
            <div class="mb-3">
                <label for="descriptions" class="form-label">description</label>
                <textarea class="form-control" id="descriptions" name="descriptions">test </textarea>
            </div>

            {{-- price --}}
            <div class="mb-3">
                <label for="price" class="form-label">prezzo</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="inserisci il prezzo" step=".01">
            </div>

            {{-- checkbox --}}
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="visible" checked value="1" name="visible">
                <label for="visible"  >
                    visibile
                </label>
            </div>

            {{-- button --}}
            <button type="submit" class="button-create-restaurant">
                Invia
            </button>

        </form>
    </div>
@endsection