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

        <form action="{{route('admin.restaurant.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
        
            <div class="mb-3">
                <label for="name" class="form-label">Nome del ristorante</label>
                <input type="text" class="form-control" id="name" name="name" value="">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo del ristorante</label>
                <input type="text" class="form-control" name="address" id="address" value="">
            </div>
            <div class="mb-3">
                <label for="vat" class="form-label">Partita IVA </label>
                <input type="text" class="form-control" id="vat" name="vat" value="">
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Numero di telefono</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="">
            </div>
            <div class="mb-3">
                @foreach ($types as $type)
                <input type="checkbox" name="types[]" id="type-{{$type->id}}" value="{{$type->id}}">
                <label for="type-{{$type->id}}">
                    {{$type->name}}
                </label>
                @endforeach
            </div>
                
            <button type="submit">
                Invia
            </button>
        </form>
    </div>
    

@endsection