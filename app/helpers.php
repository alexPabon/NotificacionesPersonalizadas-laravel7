<?php

// Activa el boton que coincida con la ruta y retorna la clase active
function active($path){
    return request()->is($path)?'active':$path;    
}