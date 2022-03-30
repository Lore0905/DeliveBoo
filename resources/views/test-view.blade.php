<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        {{-- Link CSS --}}
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

    </head>
    <body>

        {{-- Content  --}}
        <div class="content container my-4">

            {{-- test  --}}
            <form method="post" action="{{route('orders.store')}}" class="d-flex flex-column">
                @csrf
                @method('POST')

                <label for="customer_name">Nome</label>
                <input type="text" id="customer_name" name="customer_name">

                <label for="customer_email">Email</label>
                <input type="email" name="customer_email" id="customer_email">

                <label for="customer_address">Indirizzo</label>
                <input type="text" name="customer_address" id="customer_address">

                <label for="customer_phone_number">Numero telefonico</label>
                <input type="text" name="customer_phone_number" id="customer_phone_number">

                <label for="total_amount">Totale</label>
                <input type="text" name="total_amount" id="total_amount">

                <button type="submit">Invia</button>
            </form>
            {{-- end test  --}}

            <form method="post" id="payment-form" action="{{url('/checkout')}}">
                @csrf
                <section>
                    <label for="amount">
                        <span class="input-label">Amount</span>
                        <div class="input-wrapper amount-wrapper">
                            <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="10">
                        </div>
                    </label>

                    <div class="bt-drop-in-wrapper">
                        <div id="bt-dropin"></div>
                    </div>
                </section>

                <input id="nonce" name="payment_method_nonce" type="hidden" />
                <button class="button" type="submit"><span>Test Transaction</span></button>
            </form>
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