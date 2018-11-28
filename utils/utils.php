<?php
function esOpcionMenuActiva($opcion)
{
    // la primera vez
    if (($opcion === "index") and ($_SERVER['REQUEST_URI'] === "/")) {
            return true;

    }
    if ($_SERVER['REQUEST_URI'] === "/". $opcion . ".php")
        return true;
    else
        return false;

}
function existeOpcionMenuActivaEnArray( $datos){
    $activa = false;

    foreach ($datos as $opcion){
        if(esOpcionMenuActiva($opcion)){
            $activa = true;
        }
    }

    return $activa;
}
function sacaTresAsociados(array $asociados){
    if(sizeof($asociados)>=3)
        return $asociados;
    else{
        shuffle($asociados);
        $aux=array_chunk($asociados, 3);
        return $aux[0];
    }

}


