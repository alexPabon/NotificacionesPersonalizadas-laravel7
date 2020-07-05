@extends('layouts.master')
@section('content')
<div class="bg-dark hg-container text-light p-3">
    <h2 class="text-center">Formulario de contacto</h2>
    <form id="formContact" autocomplete="off" class="col-12 col-sm-7 col-lg-6 border border-secondary bg-form bg-primary p-3 rounded mx-auto" action="{{route('contact.store')}}" method="post">
        {{csrf_field()}}
        <ul class="p-0">           
            <li class="list-group py-2">        			
                <label style="visibility: hidden;" for="nomb">Nombre</label>
                <input class="entradas bg-light form-control @if($errors->first('nombre')) {{'is-invalid'}} @else {{'border-0'}} @endif" id="nomb" type="text" name="nombre" placeholder="Nombre" value="{{old('nombre')}}">
                {!!$errors->first('nombre','<small class="text-danger mt-1">:message</small>')!!}  			
            </li>
            <li class="list-group py-2">
                <label style="visibility: hidden;" for="email">Email</label>
                
                <input class="entradas bg-light form-control @if($errors->first('email')) {{'is-invalid'}} @else {{'border-0'}} @endif" 
                    id="email" type="email" name="email" placeholder="Email" 
                    value="@if(old('email')) {{old('email')}} @else @auth{{Auth::user()->email}}@endauth @endif">                    
                {!!$errors->first('email','<small class="text-danger mt-1">:message</small>')!!}                
                
            </li>
            <li class="bg d-flex justify-content-between p-0 py-2">
                <div class="col-6 p-0">
                    <label style="visibility: hidden;" for="empresa">Empresa</label>
                    <input class="entradas bg-light form-control border-0" id="empresa" type="text" name="empresa" placeholder="Empresa" value="{{old('empresa')}}">       									
                </div>
                <div class="col-6 p-0 pl-2">
                    <label style="visibility: hidden;" for="tel">Telefono</label>
                    <input class="entradas bg-light form-control border-0" id="tel" type="number" name="tel" placeholder="Telefono" maxlength="15" value="{{old('tel')}}">
                </div>
            </li>
            <li class="list-group py-2">
                <label style="visibility: hidden;" for="asunto">Asunto</label>
                <input class="entradas bg-light form-control @if($errors->first('asunto')) {{'is-invalid'}} @else {{'border-0'}} @endif" id="asunto" type="text" name="asunto" placeholder="Asunto" value="{{old('asunto')}}">
                {!!$errors->first('asunto','<small class="text-danger mt-1">:message</small>')!!}						
            </li>
            <li class="list-group py-3">
                <label style="visibility: hidden;" for="mensaje">Mensaje</label>
                <textarea id="mensaje" class="entradas bg-light form-control @if($errors->first('mensaje')) {{'is-invalid'}} @else {{'border-0'}} @endif" rows="8" name="mensaje" maxlength="500" placeholder="Mensaje">{{old('mensaje')}}</textarea>
                {!!$errors->first('mensaje','<small class="text-danger mt-1">:message</small>')!!}
            </li>
            <li class="list-group p-0 py-2">
                <div class="d-flex justify-content-left align-content-center">
                    <input id="privacidad" class="custom-checkbox @if($errors->first('acepto')) {{'is-invalid'}} @else {{'border-0'}} @endif" type="checkbox" name="acepto" @if(old('acepto')){{'checked'}} @endif value="1">
                    <label id="condiciones" class="m-0 mx-1" for="acepto">Acepto la <a href=""><b>POLITICA DE PRIVACIDAD</b></a></label>
                </div>
                {!!$errors->first('acepto','<small class="col-12 text-danger m-0">:message</small>')!!}		
            </li>
            <li class="list-group">        			
                <input type="submit" class="mt-2 btn btn-primary" name="contacto" value="Enviar">
                <input type="reset" class="mt-2 btn btn-secondary" value="Borrar datos">                
            </li>
        </ul>
    </form>
</div>

@endsection