@extends('layouts.login-dashboard')

@section('page-title')
    Crea il tuo piatto su Deliveboo
@endsection

@section('content')
    <div class="create-food">
        
        <div class="container">

            <form action="{{route('admin.foods.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
    
                {{-- Nome del piatto --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Nome del piatto</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                </div>
    
                {{-- error --}}
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
    
               {{-- Immagine --}}
                <div class="mb-3">
                    <label class="img-label" for="img" class="form-label">Inserisci la copertina del tuo piatto</label>
                    <input type="file"  id="img" name="img" class="input-type-file-food btn-secondary">
                </div>
    
                {{-- error --}}
                @error('img')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
    
                {{-- Ingredienti --}}
                <div class="mb-3">
                    <label for="ingredienti" class="form-label">Ingredienti</label>
                    <input type="text" class="form-control" id="ingredienti" name="ingrediants" value="{{old('ingrediants')}}">
                </div>
    
                {{-- error --}}
                @error('ingredienti')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
    
                {{-- Descrizione --}}
                <div class="mb-3">
                    <label for="descriptions" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="descriptions" name="descriptions">{{old('descriptions')}}</textarea>
                </div>
    
                {{-- error --}}
                @error('descriptions')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
    
                {{-- Prezzo --}}
                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo</label>
                    <input type="number" class="form-control" id="price" name="price" step=".01" value="{{old('price')}}">
                </div>
    
                {{-- error --}}
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
    
                {{-- Checkbox --}}
                <div class="form-check mb-3">
                    <input 
                    class="form-check-input" 
                    type="checkbox" 
                    id="visible" 
                    value="1" 
                    name="visible" 
                    {{old('visible') == '1' ? 'checked' : ''}}>
                    <label for="visible" class="form-label" >
                        Visibile
                    </label>
                </div>
    
                {{-- Bottone --}}
                <button type="submit" class="btn m_button_form_create">
                    Invia
                </button>
    
            </form>

        </div>

    </div>
@endsection