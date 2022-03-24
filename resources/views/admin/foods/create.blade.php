@extends('layouts.app')

@section('content')
    <div class="container">
        
        <form action="{{route('admin.foods.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')

            {{-- name --}}
            <div class="mb-3">
                <label for="name" class="form-label">Nome del piatto</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="inserisci il nome del piatto" value="{{old('name')}}">
            </div>
            {{-- error --}}
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- img --}}
            <div class="mb-3">
                <label for="img" class="form-label">img</label>
                <input type="file"  id="img" name="img" placeholder="inserisci la tua immagine">
            </div>
            {{-- error --}}
            @error('img')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- ingredienti --}}
            <div class="mb-3">
                <label for="ingredienti" class="form-label">Ingredienti</label>
                <input type="text" class="form-control" id="ingredienti" name="ingrediants" placeholder="inserisci i tuoi ingredienti" value="{{old('ingrediants')}}">
            </div>
            {{-- error --}}
            @error('ingredienti')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- description --}}
            <div class="mb-3">
                <label for="descriptions" class="form-label">description</label>
                <textarea class="form-control" id="descriptions" name="descriptions">{{old('descriptions')}}</textarea>
            </div>
            {{-- error --}}
            @error('descriptions')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- price --}}
            <div class="mb-3">
                <label for="price" class="form-label">prezzo</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="inserisci il prezzo" step=".01" value="{{old('price')}}">
            </div>
            {{-- error --}}
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            {{-- checkbox --}}
            <div class="form-check mb-3">
                <input 
                class="form-check-input" 
                type="checkbox" 
                id="visible" 
                value="1" 
                name="visible" 
                {{old('visible') == '1' ? 'checked' : ''}}>
                <label for="visible"  >
                    Visibile
                </label>
            </div>

            {{-- button --}}
            <button type="submit" class="button-create-restaurant">
                Invia
            </button>

        </form>
    </div>
@endsection