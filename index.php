<?php

    require_once __DIR__ . '/entity/ImagenGaleria.php';

    $imagenes=[];
    for($i=1;$i<=12;$i++){
        $imagenes[]=new ImagenGaleria($i.'.jpg','descripcion imagen ' . $i,$i,$i,$i);
    }
    require __DIR__ . '/utils/utils.php';
    require __DIR__ . '/views/index.view.php';

