<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>
<body>
  <div class="container">
    <h1 class="mt-3 text-capitalize mb-3">Pagamento avvenuto con successo, Il tuo ordine è confermato <span class="wink_custom"><i class="fas fa-check-circle"></i></span></h1>
  
    {{-- <h3 class="mt-5 mb-5"><strong>Dettaglio Ordine:</strong></h3>
    <div class="container-sm mt-3 mb-5">      --}}
      
      {{-- <h4 class="text-capitalize mb-3"><strong>Numero ordine:</strong> N. {{$order->id}}</h4>
      <h4 class="text-capitalize mb-3"><strong>Nome cliente:</strong> {{$order->customer_name}}</h4>
      <h4 class="text-capitalize mb-3"><strong>Recapito telefonico: </strong>{{$order->phone_guest}}</h4>
      <h4 class="text-capitalize mb-3"><strong>Indirizzo:</strong> {{$order->customer_address}}</h4>
      <h4 class="mb-3"><strong>Email:</strong> {{$order->customer_email}}</h4>
      <h4 class="text-capitalize mb-3"><strong>Data ordine:</strong> {{$order->created_at}}</h4>
      <h4 class="text-capitalize mb-3"><strong>Orario di consegna:</strong> {{date("H", strtotime('+4 hours'))}}:30</h4>
      <h4 class="text-capitalize mb-3"><strong>Totale ordine:</strong> {{$order->total_amount = number_format($order->total_amount, 2)}} € </h4> --}}
      {{-- <h4>Totale: </h4><span id="totale_price" >@{{total}}</span> Euro --}}
    </div>
  
    <div class="mt-3 text-center mb-3">
      <a href='/' class="btn m_button">Home</a>
    </div>
  
  </div>
</body>
</html>