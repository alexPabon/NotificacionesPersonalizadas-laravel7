@extends('layouts.master')
@section('titulo','Dar de baja')

@section('content')
    <div class="container pt-4">
        <div class="bg-dark p-3 text-light rounded">
            <h3 class="mt-0 font-weight-bold text-danger">{{ucfirst($user->name)}}</h3>
            <p class="lead">
                Antes de continuar con el <strong>Borrado de datos de tu cuenta</strong>, debes saber que todos
                tus datos seran eliminados y no se podrá recuperar.<br><br>
                Para continuar, has click en eliminar cuenta.
            </p>
            <form action="{{route('user.destroy',$user->id)}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="DELETE">                
                <input class="btn btn-danger col-12 col-md-6 col-lg-3" type="submit" value="Eliminar cuenta">
            </form>
        </div>        
    </div>
@endsection