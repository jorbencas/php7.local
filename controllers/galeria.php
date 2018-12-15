<?php
require_once  __DIR__. '/../utils/utils.php';
require  __DIR__.'/../utils/File.php';
require  __DIR__.'/../entity/ImagenGaleria.php';
require  __DIR__.'/../database/Connection.php';
#require  __DIR__.'/../database/QueryBuilder.php';
require  __DIR__.'/../Repository/ImagenGaleriaRepository.php';
require_once  __DIR__.'/../core/App.php';
require  __DIR__.'/../exception/QueryException.php';
require  __DIR__.'/../exception/FileException.php';

$config= require_once __DIR__.'/../app/config.php';
App::bind('config',$config);
$connection=App::getConnection();

$errores=[];
$descripcion='';
$mensaje='';
$imagenes='';

try {
    $imagenGalleriaRepository=new ImagenGaleriaRepository();
    if ($_SERVER['REQUEST_METHOD']==='POST'){
            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            $mensaje = 'Datos enviados';
            $tiposAceptados=['image/jpeg','image/png','image/gif'];
            $imagen=new File('imagen',$tiposAceptados);
            $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
            $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY,ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);
            $imagenGalleria = new ImagenGaleria($imagen->getFileName(),$descripcion);
            $imagenGalleriaRepository->save($imagenGalleria);

            $mensaje='Se ha guardado la imagen';
            $descripcion ='';


    }
        $imagenes=$imagenGalleriaRepository->findAll();

    require __DIR__.'/../views/galeria.view.php';
}catch(QueryException $queryException){
    $errores[]=$queryException->getMessage();
}catch (FileException $fileException){
    $errores[]=$fileException->getMessage();
}