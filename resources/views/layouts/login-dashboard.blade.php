<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    {{-- font awesome --}}
    <script src="https://kit.fontawesome.com/bfab6b0bc8.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="{{ asset('/img/logo-senza-scritta.png') }}">
</head>
<body>
    <nav>
        <div class="d-flex align-items-center justify-content-between login-dashboard">
            <div>
                <a class="" href="/">
                    <img src="{{ asset('/img/logo-senza-scritta.png') }}" alt="" class="logo">
                    <span>DeliveBoo</span>
                </a>
            </div>
            <div>
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-4 col-lg-3 d-md-block sidebar py-4 nav-dashboard">
                <div class="sidebar-sticky">

                    {{-- ristorante --}}
                    <div class="ristorante-dashboard d-md-inline-block flex-md-column d-lg-flex">
                        <div id="img-ristorante" class="d-xl-inline">
                            <img src="{{ asset('/img/ristorante.png') }}" alt="">
                            {{-- <i class="fa-solid fa-utensils"></i> --}}
                        </div>
                        @if (isset(Auth::user()->restaurant->name))
                            <div class="restaurant-name">{{Auth::user()->restaurant->name}}</div>
                        @else
                            <div class="restaurant-name">Nome del ristorante</div>
                        @endif
                    </div>
                    {{-- end ristorante --}}

                    <ul class="nav flex-column">
                        <li class="nav-item {{((request()->is('admin')) ? 'active' : '' )}}">
                            <a class="nav-link active" href="{{ route('admin.home') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home "><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                Dashboard
                            </a>
                        </li>
                        @if ( Auth::user()->restaurant )
                            <li class="nav-item {{((request()->is('admin/foods')) ? 'active' : '' )}}" >
                                <a class="nav-link active" href="{{ route('admin.foods.index') }}">
                                    <i class="fa-solid fa-burger icon"></i>
                                    Il mio menù
                                </a>
                            </li>
                            <li class="nav-item {{((request()->is('admin/foods/create')) ? 'active' : '' )}}">
                                <a class="nav-link active" href="{{ route('admin.foods.create') }}">
                                    <i class="fa-solid fa-plus icon"></i>
                                    Crea il tuo piatto
                                    
                                </a>
                            </li>
                            <li class="nav-item {{((request()->is('admin/orders')) ? 'active' : '' )}}">
                                <a class="nav-link active" href="{{ route('admin.orders') }}">
                                    <i class="fa-solid fa-cart-shopping icon"></i>
                                    Visualizza i tuoi ordini
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-8 ml-sm-auto col-lg-9 px-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>