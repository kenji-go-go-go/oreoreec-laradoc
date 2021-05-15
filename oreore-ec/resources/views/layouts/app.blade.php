<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">{{ config('app.name', 'Laravel') }}</a>
            <a class="fas fa-shopping-cart" href="{{ route('cart.index') }}">カート</a>
        </div>
    </nav>
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
