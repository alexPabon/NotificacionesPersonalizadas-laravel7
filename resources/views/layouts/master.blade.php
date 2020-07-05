<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name')}} @yield('titulo')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @section('navigation')
            @includeif('navigation.menu-navigation')
        @show
        @yield('headboard')
        <div class="container hg-container darkness bg-light">
            @includeWhen($errors->any(),'layouts.error')
            @includeWhen(Session::has('success'),'layouts.success')
            @yield('content')
            
        </div>    
    </div>
    @section('footer')
        @includeif('subview.footer')
    @show
</body>
</html>