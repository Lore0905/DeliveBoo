@extends('layouts.login-dashboard')

@section('page-title')
    Crea il tuo ristorante su Deliveboo
@endsection

@section('content')
    
    <div class="create-restaurant">

        <div class="container">

            <form action="{{route('admin.restaurant.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')

                {{-- Nome del ristorante --}}
                <label for="name" class="form-label">Nome del ristorante</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">

                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                {{-- Immagine del ristorante --}}
                <label class="image-label" for="image">Immagine del ristorante</label>
                <input class="image-label" type="file" id="image" name="image" value="">

                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                {{-- Indirizzo del ristorante --}}
                <label for="address" class="form-label">Indirizzo del ristorante</label>
                <input type="text" class="form-control" name="address" id="address" value="{{old('address')}}">
            
                @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                {{-- Partita IVA --}}
                <label for="vat" class="form-label">Partita IVA </label>
                <input type="text" class="form-control" id="vat" name="vat" value="{{old('vat')}}">

                @error('vat')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                {{-- Numero di telefono --}}     
                <label for="phone_number" class="form-label">Numero di telefono</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{old('phone_number')}}">

                @error('phone_number')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                {{-- Tipologie --}}
                <div class="checkbox">
                    <div class="types-title">
                        Tipologia del tuo ristorante:
                    </div>
                    @foreach ($types as $type)
                        <label class="checkbox-label" for="type-{{$type->id}}">
                            {{$type->name}}
                        </label>
                        <input 
                        type="checkbox" name="types[]" 
                        id="type-{{$type->id}}" 
                        value="{{$type->id}}"
                        {{ in_array($type->id, old('types', [])) ? 'checked' : '' }}
                        >
                    @endforeach
                </div>

                @error('types')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                {{-- Bottone --}}
                <button type="submit" class="btn m_button_form_create">
                    Invia
                </button>

            </form>

        </div>

    </div>

@endsection