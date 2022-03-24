@extends('layouts.dashboard')

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

        <form action="{{route('admin.restaurant.store')}}" method="post" enctype="multipart/form-data" class="container-input-restaurant">
            @csrf
            @method('POST')
        
            <div class="mb-3">
                <label for="name" class="form-label">Nome del ristorante</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
            </div>
            {{-- Image Input --}}
            <div class="mb-3">
                <input type="file" id="image" name="image" value="">
                <label for="image">Immagine</label>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo del ristorante</label>
                <input type="text" class="form-control" name="address" id="address" value="{{old('address')}}">
            </div>
            <div class="mb-3">
                <label for="vat" class="form-label">Partita IVA </label>
                <input type="text" class="form-control" id="vat" name="vat" value="{{old('vat')}}">
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Numero di telefono</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{old('phone_number')}}">
            </div>
            {{-- checkbox --}}
            <div class="mb-3 wrapping-checkbox">
                @foreach ($types as $type)
                    <div class="checkbox-restaurant">
                        <input 
                        type="checkbox" name="types[]" 
                        id="type-{{$type->id}}" 
                        value="{{$type->id}}"
                        {{ in_array($type->id, old('types', [])) ? 'checked' : '' }}
                        >
                        <label for="type-{{$type->id}}">
                            {{$type->name}}
                        </label>
                    </div>
                @endforeach
            </div>
                
            <button type="submit" class="button-create-restaurant">
                Invia
            </button>
        </form>
    </div>
    

@endsection