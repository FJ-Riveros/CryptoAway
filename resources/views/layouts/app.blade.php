<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('../resources/css/home.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <div class="container align-items-center margin__top__custom">
            <div class="row justify-content-center">

                <div class="col-8 d-flex justify-content-center align-items-center">
                    <img src="img/logo_recortado.png" width="60px" height="60px" alt="">
                    <span class="page__title ml-2">CryptoAway</span>                    
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 d-flex justify-content-center align-items-center">
                    @yield('content')
                </div>
            </div>
        
        <!-- <div class="container d-flex align-items-center vh-100">
            @yield('content')
        </div> -->

    </div>
</body>

</html>