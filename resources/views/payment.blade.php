<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pagamento Deliveboo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        {{-- Link CSS --}}
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        {{-- Link FontAwesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body>

        @include('partials.header')

        {{-- Content  --}}
        <div class="content container row">

            {{-- Form Pagamento --}}
            <div class="payment-form col-sm-12 col-lg-6">
                <form method="post" id="payment-form" action="{{route('checkout', ['id' => $order->id])}}">
                    @csrf
                    <section>
                        <label for="amount">
                            <span class="input-label">Totale:</span>
                            <div class="input-wrapper amount-wrapper">
                                <input class="amount" readonly id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="{{$order->total_amount}}€">
                            </div>
                        </label>
    
                        <div class="bt-drop-in-wrapper">
                            <div id="bt-dropin"></div>
                        </div>
                    </section>
    
                    <input id="nonce" name="payment_method_nonce" type="hidden" />
                    <button class="btn border" type="submit"><span>Paga</span></button>
                </form>
            </div>
            {{-- End Form Pagamento --}}

            {{-- Riepilogo ordine --}}

            <div class="col-sm-12 col-lg-6">

                <div class="summary">

                    <div class="name">
                        <i class="fas fa-user"></i>
                        <span class="left">Nome:</span> {{$order->customer_name}}
                    </div>

                    <div class="email">
                        <i class="fas fa-envelope"></i>
                        <span class="left">Email:</span> {{$order->customer_email}}
                    </div>

                    <div class="address">
                        <i class="fas fa-map-marker-alt"></i>
                        <span class="left">Indirizzo:</span> {{$order->customer_address}}
                    </div>

                    <div class="phone">
                        <i class="fas fa-mobile-alt"></i>
                        <span class="left">Numero di telefono:</span> {{$order->customer_phone_number}}
                    </div>

                    <div class="order">
                        <i class="fas fa-utensils"></i>
                        <span class="left">Ordine:</span>

                        @foreach ($order->foods as $food)
                            <div>
                                {{$food->name}}:

                                <ul>
                                    <li>
                                        prezzo: {{$food->price}}€
                                    </li>
                                    <li>
                                        quantità: {{$food->pivot->quantity}}
                                    </li>
                                </ul>

                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

            {{-- Fine riepilogo ordine --}}
        </div>





        {{-- Script  --}}
        <script src="https://js.braintreegateway.com/web/dropin/1.33.0/js/dropin.min.js"></script>
        <script>
            var form = document.querySelector('#payment-form');
            var client_token = "{{ $token }}";

            braintree.dropin.create({
            authorization: client_token,
            selector: '#bt-dropin',
            paypal: {
                flow: 'vault'
            }
            }, function (createErr, instance) {
            if (createErr) {
                console.log('Create Error', createErr);
                return;
            }
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                instance.requestPaymentMethod(function (err, payload) {
                if (err) {
                    console.log('Request Payment Method Error', err);
                    return;
                }

                // Add the nonce to the form and submit
                document.querySelector('#nonce').value = payload.nonce;
                form.submit();
                });
            });
            });
        </script>
    </body>
</html>