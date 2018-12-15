<?php
function esOpcionMenuActiva($opcion)
{

    if (($opcion === "index") and ($_SERVER['REQUEST_URI'] === "/")) { //Si es la primera vez que entra
        return true;
    }

    if ($_SERVER['REQUEST_URI'] === "/" . $opcion . ".php") { //comprueba si la ruta activa es la que le pasamos ?
        return true;
    } else {
        return false;
    }
}

function existeOpcionMenuActivaEnArray($datos){ //Comprueba si una de las opciones del array que se le pasa es la que está (es para que en los artículos del blog tambiéns alga el blog como elemento ACTIVO)
    $activa = false;
    foreach ($datos as $opcion){
        if(esOpcionMenuActiva($opcion)){
            $activa = true;
        }
    }
    return $activa;
}