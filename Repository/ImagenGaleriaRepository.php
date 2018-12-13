<?php
/**
 * Created by PhpStorm.
 * User: jorge
 * Date: 13/12/2018
 * Time: 12:14
 */
require __DIR__.'/../database/QueryBuilder.php';
class ImagenGaleriaRepository extends QueryBuilder
{
    /**
     * ImagenGaleriaRepository constructor.
     */
    public function __construct($table='imagenes',$classEntity='imagenGaleria')
    {
        parent::__construct($table,$classEntity);
    }
}