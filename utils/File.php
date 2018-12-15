<?php
/**
 * Created by PhpStorm.
 * User: sportak
 * Date: 04/12/2018
 * Time: 8:47
 */

require_once __DIR__ . '/../exceptions/FileException.php';

class File
{
    private $file;
    private $filename;

    /**
     * File constructor.
     * @param $filename
     * @param array $arrTypes
     * @throws FileException
     */

    public function __construct($filename,array $arrTypes)
    {
        $this->file = $_FILES[$filename];
        $this->filename='';
        if(!isset($this->file)){
            throw new FileException("Debes seleccionar un fichero");
        }
        if($this->file['error']!==UPLOAD_ERR_OK){
            switch ($this->file['error']){
                case UPLOAD_ERR_INI_SIZE:

                case UPLOAD_ERR_FORM_SIZE:
                throw new FileException("El fichero es demasaido grande");
                case UPLOAD_ERR_PARTIAL:
                    throw new FileException("No se ha podido subir el archivo completo.");
                default:
                    throw new FileException("Error al subir el fichero");
                    break;
            }
        }
        if(in_array($this->file['type'],$arrTypes)===false){
            throw new FileException("El tipo de fichero no es soportado");
        }

    }

    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * @param $rutaDestino
     * @throws FileException
     */

    public function saveUploadFile($rutaDestino){
        if(is_uploaded_file($this->file['tmp_name'])===false){
            throw new FileException("El archivo no se ha subido con un formulario");
        }else{
            $this->filename=$this->file['name'];
            $ruta=$rutaDestino.$this->filename;

            if(is_file($ruta)===true){
                $idUnico=time();
                $this->filename=$this->filename.$idUnico;
            }

            if(move_uploaded_file($this->file['tmp_name'],$ruta)){
            }else{
                throw new FileException("No se puede mover el fichero a su destino");
            }
        }
    }

    /**
     * @param $rutaOrigen
     * @param $rutaDestino
     * @throws FileException
     */

    public function copyFile($rutaOrigen,$rutaDestino){
        $origen=$rutaOrigen.$this->filename;
        $destino=$rutaDestino.$this->filename;
        if(is_file($origen)===false){
            throw new FileException("No existe el fichero origen");
        }
        if(is_file($destino)===true){
            throw new FileException("Ya existe el fichero $destino y no se puede copiar");
        }
        if(copy($origen,$destino)===false){
            throw new FileException("No se ha podido copiar $origen con $destino");
        }
    }



}