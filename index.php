<?php

require_once 'entity/ImagenGaleria.php';

$imagenes=[];
for ($i=1; $i<=12; $i++){
        $imagenes[]=new ImagenGaleria($i.'.jpg', 'descripcion imagen'.$i, $i, $i, $i );
}

require 'utils/utils.php';
require 'views/index.view.php';
