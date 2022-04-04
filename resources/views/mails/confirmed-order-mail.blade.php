<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Ordine confermato</h1>

    <h4>Riepilogo</h4>
    
    <div>Nome: {{$order->customer_name}}</div>
    <div>Email: {{$order->customer_email}}</div>
    <div>Indirizzo: {{$order->customer_address}}</div>
    <div>Telefono: {{$order->customer_phone_number}}</div>
    <div>Totale ordine: {{$order->total_amount}} €</div>

</body>
</html>