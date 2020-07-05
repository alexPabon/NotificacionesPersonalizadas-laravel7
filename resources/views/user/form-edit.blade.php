@extends('layouts.master')
@section('titulo','Editar Usuario')

@section('content')   
    <div>
        <h1 class="text-center">Cambiar el nombre de perfil</h1>
        <div class="card-body border rounded bg-form bg-primary">
            <form action="{{route('user.update',$user->id)}}" autocomplete="off" method="post">
                @csrf         
                <input type="hidden" name="_method" value="PUT">
                
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <div class="col-12 col-md-6 m-0">
                        <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{$user->name}}" placeholder="Nombre">  
                        @error('name')                            
                                <small class="text-danger px-2 rounded m-0">{{$message}}</small>                            
                        @enderror
                    </div>                    
                </div>
                <div>
                    <input class="btn btn-primary col-12 col-md-4" type="submit" name="guardar" value="Guardar Cambios">        
                </div>
            </form>
        </div>
        
            
                    
                    
                    
        
    </div>
@endsection