@extends('layouts.login-dashboard')

@section('page-title')
    I tuoi ordini su Deliveboo
@endsection

@section('content')
    <h1 class="ml-3">
        Ordini
    </h1>

    {{-- se l'array è vuoto, significa che il ristorante non ha ordini --}}
    @if (empty($orders))
        <div class="py-5">
            <h2>Non hai ancora ordini</h2> 
        </div>
    @else
    
        <div class="d-flex flex-wrap justify-content-around align-items-start">
            @foreach ($orders as $order)
            
                {{-- <div class="border mb-2 mx-2 p-2">
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
                </div> --}}

                <div class="{{ $order->payment_status === "Successful" ? 'border-success' : 'border-warning' }} card m-3 resize" style="min-height: 400px">
                    <div class="card-header">
                        <h5 class="card-title">{{$order->customer_name}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $order->created_at->format('d/m - H:i') }}</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item w-100">
                                <span class="font-weight-bold">Indirizzo:</span>
                                {{$order->customer_address}}
                            </li>
                            <li class="list-group-item w-100">
                                <span class="font-weight-bold">Telefono:</span>
                                {{$order->customer_phone_number}}
                            </li>
                            <li class="list-group-item w-100">
                                <span class="font-weight-bold">Email:</span>
                                {{$order->customer_email}}
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush w-100">
                            <h6 class="ml-3 font-weight-bold">Piatti ordinati:</h6>
                            @foreach ($order->foods as $item)
                                <li class="list-group-item w-100">- {{ $item->name }} / {{$item->pivot->quantity}} pz</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer">
                        <span class="font-weight-bold">Totale:</span>
                        <span class="float-right">{{$order->total_amount}}€</span>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    
@endsection


<style>
    @media (max-width: 1200px){
        .resize{
            width: 30%;
        }
    }

    @media (max-width: 1200px){
        .resize{
            width: 100%;
        }
    }
</style>