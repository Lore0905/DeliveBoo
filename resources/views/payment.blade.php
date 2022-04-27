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
    <body id="body-payment">

        @include('partials.header')

        {{-- wave background --}}
        <svg class="wave-background d-none d-xl-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 420">
            <path fill="#00ccbc" fill-opacity="1" d="M0,32L21.8,69.3C43.6,107,87,181,131,213.3C174.5,245,218,235,262,234.7C305.5,235,349,245,393,256C436.4,267,480,277,524,288C567.3,299,611,309,655,272C698.2,235,742,149,785,133.3C829.1,117,873,171,916,197.3C960,224,1004,224,1047,208C1090.9,192,1135,160,1178,144C1221.8,128,1265,128,1309,122.7C1352.7,117,1396,107,1418,101.3L1440,96L1440,0L1418.2,0C1396.4,0,1353,0,1309,0C1265.5,0,1222,0,1178,0C1134.5,0,1091,0,1047,0C1003.6,0,960,0,916,0C872.7,0,829,0,785,0C741.8,0,698,0,655,0C610.9,0,567,0,524,0C480,0,436,0,393,0C349.1,0,305,0,262,0C218.2,0,175,0,131,0C87.3,0,44,0,22,0L0,0Z"></path>
        </svg>

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
                                <input class="amount" readonly id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="{{$order->total_amount}}">
                            </div>
                        </label>
    
                        <div class="bt-drop-in-wrapper">
                            <div id="bt-dropin"></div>
                        </div>
                    </section>
    
                    <input id="nonce" name="payment_method_nonce" type="hidden" />
                    <button class="btn border my-3" type="submit"><span>Paga</span></button>
                </form>
            </div>
            {{-- End Form Pagamento --}}

            {{-- Riepilogo ordine --}}

            <div class="col-sm-12 col-lg-6">

                <div class="summary btn-primary">

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
                        <br>

                        @foreach ($order->foods as $food)
                            <div class="wrapping-order">
                               <strong>{{$food->name}}:</strong> 

                                <ul>
                                    <li>
                                        <strong>prezzo:</strong>  {{$food->price}}€
                                    </li>
                                    <li>
                                       <strong>quantità:</strong>   {{$food->pivot->quantity}}
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