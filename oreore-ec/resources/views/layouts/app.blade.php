<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}"></script>

    <!-- <title>@yield('title') | {{ config('app.name', 'ichiichiban') }}</title> -->
    <title>{{ config('app.name', 'ichiichiban') }}</title>

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-sm navbar-green mb-3">
        <a class="navbar-brand" href="{{ url('/') }}">IchiIchiban</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4"
            aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="material-icons icon-white">dehaze</i></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav4">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ url('/order') }}" class="nav-link"><i
                            class="material-icons md-light cartColor">receipt</i>注文履歴</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/cart') }}" class="nav-link"><i
                            class="material-icons md-light cartColor">shopping_cart</i>カートに行く</a>
                </li>
                @guest
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link"><i
                            class="material-icons md-light cartColor">input</i>ログイン</a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <i class="material-icons md-light cartColor">input</i>ログアウト
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endguest
            </ul>
        </div>
    </nav>
    <!-- <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">{{ config('app.name', 'Laravel') }}</a>
            <a class="fas fa-shopping-cart" href="{{ route('cart.index') }}">カート</a>
        </div>
    </nav> -->
    @yield('content')
    <footer class="container pt-5 pb-3">
        <div class="row">
            <div class="col-12 text-center text-muted">
                Copyright(C)2019 個人名or会社名,Allright Reserved.
            </div>
        </div>
    </footer>
</body>

</html>
