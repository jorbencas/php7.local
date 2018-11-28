<?php
$errores=[];
$mensaje='';
$nombre='';
$apellidos='';
$email='';
$asunto='';
$texto='';
if($_SERVER['REQUEST_METHOD']==='POST')
{
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $email=$_POST['email'];
    $asunto=$_POST['asunto'];
    $texto=$_POST['texto'];

    $nombre=trim(htmlspecialchars($nombre));
    $apellidos=trim(htmlspecialchars($apellidos));
    $email=trim(htmlspecialchars($email));
    $asunto=trim(htmlspecialchars($asunto));
    $texto=trim(htmlspecialchars($texto));
    if(empty($nombre))
            $errores[]="El nombre no puede estar vacio";
    if(empty($email))
        $errores[]="El email no puede estar vacio";
    else{
        if(filter_var($email,FILTER_VALIDATE_EMAIL)===false)
            $errores[]="El email no es correcto";
    }
    if(empty($asunto))
        $errores[]="El asunto no puede estar vacio";
    if(empty($errores))
        $mensaje="los datos del formulario son correctos";

}
require 'utils/utils.php';
require 'views/contact.view.php';