@extends('layouts.dashboard')

@section('content')
    <h1>
        Ordini
    </h1>

    <div class="d-flex align-items-center">
        @foreach ($orders as $order)
            <div class="border">
                <div>
                    {{$order->customer_name}}
                </div>
                <div>
                    {{$order->customer_email}}
                </div>
                <div>
                    {{$order->total_amount}}$
                </div>
            </div>
        @endforeach
    </div>
@endsection