<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SST</title>
    @include('layouts.header')
    <!-- Scripts -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> --}}
    
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">

            <a class="navbar-brand" style="margin-left: 5%;" href="{{ route('welcome') }}">SST</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">

                    {{-- <ul class="navbar-nav ml-auto"> --}}
                        @if(Session :: has ('cart'))
                        <li class="nav-item mx-0 mx-lg-1">
                              <a href="{{ route('item.shoppingCart') }}">
                                <i class="fa-solid fa-cart-shopping" style="margin-top: 19px;"></i>
                                <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                            </a>
                        </li>
                        @endif

                    {{-- @if (!(Auth::user -> role == 'customer')) --}}

                    @if(Auth::user())
                        @if(auth()->user()->role != 'customer')
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{route('getCustomer')}}">Customer</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{route('getPet')}}">Pet</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{route('getEmployee')}}">Employee</a></li>
                            <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{route('getGservice')}}">Services</a></li>
                        @endif
                    @endif
                    
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{url('/consult')}}">Consult</a></li>

                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{route('explore')}}">Explore</a></li>

                    <li class="nav-item mx-0 mx-lg-1 dropdown">
                        <a id="navbarDropdown" class="nav-link py-3 px-0 px-lg-3 rounded dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Transactions
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                            <a style="color:black;" class="nav-link py-3 px-0 px-lg-3 rounded dropdown-item" href="{{ route('transactions') }}">Transaction List</a>
                            <a style="color:black;" class="nav-link py-3 px-0 px-lg-3 rounded dropdown-item" href="{{ route('pHistory') }}">Pet History</a>
                            <a style="color:black;" class="nav-link py-3 px-0 px-lg-3 rounded dropdown-item" href="{{ route('cHistory') }}">Customer Transactions</a>

                        </div>
                    </li>

                    <li class="nav-item mx-0 mx-lg-1 dropdown">
                        <a id="navbarDropdown" class="nav-link py-3 px-0 px-lg-3 rounded dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Statistics
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a style="color:black;" class="nav-link py-3 px-0 px-lg-3 rounded dropdown-item" href="{{ route('pchart') }}">Pet Graph</a>
                            <a style="color:black;" class="nav-link py-3 px-0 px-lg-3 rounded dropdown-item" href="{{ route('cchart') }}">Customer Graph</a>
                        </div>
                    </li>

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item mx-0 mx-lg-1">
                                    <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                            <li class="nav-item mx-0 mx-lg-1">
                                <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif

                        @else
                            <li class="nav-item mx-0 mx-lg-1 dropdown">
                                <a id="navbarDropdown" class="nav-link py-3 px-0 px-lg-3 rounded dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a style="color:black;" class="nav-link py-3 px-0 px-lg-3 rounded dropdown-item" href="{{ route('getProfile') }}">Profile</a>

                                    <a style="color:black;" class="nav-link py-3 px-0 px-lg-3 rounded dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                    

                                </div>
                            </li>
                        @endguest
                </div>
            </div>
        </nav>
        {{-- {{dd(auth()->user()->role)}} --}}
        <main class="py-4">
            @yield('content')
        </div>
        </main>
    </div>
</body>
</html>
