<?php
require_once __DIR__.'/../utils/utils.php';
require __DIR__.'/../utils/File.php';
require __DIR__.'/../entity/ImagenGaleria.php';
require __DIR__.'/../database/Connection.php';
require __DIR__.'/../repository/ImagenGaleriaRepository.php';
require_once __DIR__.'/../exceptions/QueryException.php';
require_once __DIR__.'/../exceptions/FileException.php';
require_once __DIR__.'/../core/App.php';

$errores=[];
$descripcion='';
$mensaje='';
try {
    $config= require_once __DIR__.'/../app/config.php';
    App::bind('config',$config);
    $imagenGaleriaRepository=new ImagenGaleriaRepository();
    $imagenes='';

    if ($_SERVER['REQUEST_METHOD']==='POST'){

            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            $mensaje = 'Datos enviados';
            $tiposAceptados=['image/jpeg','image/png','image/gif'];
            $imagen=new File('imagen',$tiposAceptados);

            $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
            $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY,ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);


            $imagenGaleria=new ImagenGaleria($imagen->getFilename(),$descripcion);
            $imagenGaleriaRepository->save($imagenGaleria);
            $mensaje='Se ha guardado la imagen';
            $descripcion='';



    }

    $imagenes=$imagenGaleriaRepository->findAll();


}catch (QueryException $exception){
    throw new QueryException('Error de BDA');
}catch (FileException $exception){
    throw new FileException('Error a insertar en fichero');
}


require __DIR__.'/../views/galeria.view.php';