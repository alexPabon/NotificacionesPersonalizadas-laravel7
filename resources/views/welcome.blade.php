@extends('layouts.master')

@section('content')
<div class="flex-center position-ref full-height">   

    <div class="content">
        <div class="col-12 col-md-6 col-lg-3 mx-auto">
            <h1 class="h1 text-center font-weight-bold text-primary">Welcome</h1>
        </div>

        <div class="links text-center">
            <a class="badge badge-info px-4 py-2 mt-2 col-12 col-md-4 col-lg-2" href="https://laravel.com/docs">Docs</a>
            <a class="badge badge-info px-4 py-2 mt-2 col-12 col-md-4 col-lg-2" href="https://laracasts.com">Laracasts</a>
            <a class="badge badge-info px-4 py-2 mt-2 col-12 col-md-4 col-lg-2" href="https://laravel-news.com">News</a>
            <a class="badge badge-info px-4 py-2 mt-2 col-12 col-md-4 col-lg-2" href="https://blog.laravel.com">Blog</a>
            <a class="badge badge-info px-4 py-2 mt-2 col-12 col-md-4 col-lg-2" href="https://nova.laravel.com">Nova</a>
            <a class="badge badge-info px-4 py-2 mt-2 col-12 col-md-4 col-lg-2" href="https://forge.laravel.com">Forge</a>
            <a class="badge badge-info px-4 py-2 mt-2 col-12 col-md-4 col-lg-2" href="https://vapor.laravel.com">Vapor</a>
            <a class="badge badge-info px-4 py-2 mt-2 col-12 col-md-4 col-lg-2" href="https://github.com/laravel/laravel">GitHub</a>
        </div>
    </div>
</div>
<div class="container">
    <p class="mt-3">
        Esta aplicación es para realizar pruebas de notificaciones personalizadas, si quieres ver las notificaciones, debes de registrarte
        y así poder solicitar las notificaciones para la confirmación de email o cuando has olvidado la contraseña.<br><br>
        Esto sería una implementación básica para iniciar un proyecto con Laravel. Ya teniendo esto, puedes comenzar a
        pensar como desarrollar vuestro proyecto.
    </p>
</div>
@endsection