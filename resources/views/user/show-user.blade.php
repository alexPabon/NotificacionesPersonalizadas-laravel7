@extends('layouts.master')
@section('titulo','Mi Perfil')

@section('content')
    <h2 class="text-center">Mi perfil de Usuario</h2>
    <div class="container bg-white p-3 rounded">        
        <p>
            <b>Nombre: </b>{{ucfirst($user->name)}}<br>
            <b>Email: </b>{{ucfirst($user->email)}}<br>
            <b>Email Verificado: </b>{{!is_null($user->email_verified_at)?'SI':'NO'}}<br>
            <b>Fecha de creacion: </b>{{$user->created_at->format('d/m/Y')}}
        </p>        
    </div>
    <a href="{{route('user.delete',Auth::user()->id)}}">Eliminar mi cuenta</a>
@endsection