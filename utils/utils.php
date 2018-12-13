<?php
function esOpcionMenuActiva($opcion)

{
    if(($opcion==="index") and ($_SERVER['REQUEST_URI']==="/"))
    {
        return true;
    }
    if($_SERVER['REQUEST_URI']=== "/". $opcion . ".php")
        return true;
    else
        return false;
}

function existeOpcionMenuActivaEnArray($datos){
    $activa=false;
    foreach($datos as $opcion){
        if(esOpcionMenuActiva($opcion))
            $activa=true;
    }
    return $activa;

}