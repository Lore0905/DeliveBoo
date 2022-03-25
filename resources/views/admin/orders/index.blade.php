@extends('layouts.login-dashboard')

@section('content')
    <h1>
        Ordini
    </h1>

    <div class="d-flex align-items-center p-2">
        @foreach ($orders as $order)
            <div class="border mx-2 p-2">
                <div class="mb-2 text-center font-weight-bold">
                    {{$order->customer_name}}
                </div>
                {{-- <div class="mb-2">
                    <span class="font-weight-bold">Data:</span>
                    {{dd($order->foods->pivot)}}
                    @foreach ($order->foods as $item)
                        {{$item->pivot->date}}
                        
                    @endforeach
                </div> --}}
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
                    <span class="font-weight-bold">Totale:</span>
                    {{$order->total_amount}}€
                </div>
            </div>
        @endforeach
    </div>
@endsection