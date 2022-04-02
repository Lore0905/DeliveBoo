<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pagamento avvenuto con successo</title>
  
  <link rel="stylesheet" href="{{asset('css/app.css')}}">

  {{-- Link FontAwesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
  <div class="success">

    @include('partials.header')

    <div class="container">
    
      <div class="mt-3 text-capitalize mb-3 main-text">
        Pagamento avvenuto con successo 
        <span class="wink_custom">
          <i class="fas fa-check-circle"></i>
        </span>
      </div>

      <div class="bottom-text">
        Il tuo ordine è in arrivo!
      </div>
      
    
      <div class="mt-3 text-center mb-3">
        <a href='/' class="btn m_button">Torna alla Home per ordinare da altri ristoranti</a>
      </div>
    
    </div>
  </div>
</body>
</html>