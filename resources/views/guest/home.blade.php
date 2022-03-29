<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- Link CSS --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    {{-- Link FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Link Braintree --}}
    <script src="https://js.braintreegateway.com/web/dropin/1.33.0/js/dropin.js"></script>

    {{-- Includes JQuery --}}
    <script src="http://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>

</head>
<body>

    <div id="root">

    </div>

    <script src="{{asset('js/front.js')}}"></script>
</body>
</html>