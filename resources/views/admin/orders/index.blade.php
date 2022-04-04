@extends('layouts.login-dashboard')

@section('page-title')
    I tuoi ordini su Deliveboo
@endsection

@section('content')
    <h1>
        Ordini
    </h1>

    {{-- se l'array è vuoto, significa che il ristorante non ha ordini --}}
    @if (empty($orders))
        <div class="py-5">
            <h2>Non hai ancora ordini</h2> 
        </div>
    @else
    
        <div class="d-flex flex-wrap align-items-center p-2">
            @foreach ($orders as $order)
            
                <div class="border mb-2 mx-2 p-2">
                    <div class="mb-2 text-center font-weight-bold">
                        {{$order->customer_name}}
                    </div>
                    <div class="mb-2">
                        <span class="font-weight-bold">Data:</span>
                        {{ $order->created_at->format('d/m - H:i') }}
                    </div>
                    <div class="mb-2">
                        <span class="font-weight-bold">Indirizzo:</span>
                        {{$order->customer_address}}
                    </div>
                    <div class="mb-2">
                        <span class="font-weight-bold">Telefono:</span>
                        {{$order->customer_phone_number}}
                    </div>
                    <div class="mb-2">
                        <span class="font-weight-bold">Email:</span>
                        {{$order->customer_email}}
                    </div>

                    <div class="mb-2">
                        <span class="font-weight-bold">Piatto ordinato:</span>
                        <ul>
                            @foreach ($order->foods as $item)
                                <li>{{ $item->name }} - {{$item->pivot->quantity}}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="mb-2">
                        <span class="font-weight-bold">Totale:</span>
                        {{$order->total_amount}}€
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    
@endsection