<?php

class File
{
    private $file;
    private $fileName;

    /**
     * File constructor.
     * @param $fileName
     * @param array $arrTypes
     * @throws FileException
     */
    public function __construct($fileName,array $arrTypes)
    {
        $this->file= $_FILES[$fileName];
        $this->fileName='';
        if(!isset($this->file))
        {
           throw new FileException("Debes seleccionar un fichero");
        }
        if($this->file['error']!==UPLOAD_ERR_OK){
            switch($this->file['error'])
            {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new FileException("El fichero es demasiado grande");
                case UPLOAD_ERR_PARTIAL:
                    throw new FileException("No se ha subido fichero completo");
                default:
                    throw new FileException("Error al subir el fichero");
                break;
            }

        }
        if(in_array($this->file['type'],$arrTypes)===false) {
            throw new FileException("Tipo de fichero no soportado");
        }
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @param string $rutaDestino
     * @throws FileException
     */
    public function saveUploadFile(string $rutaDestino)
    {
        if(is_uploaded_file($this->file['tmp_name'])===false)
            throw new FileException("el archivo no se ha subido con un formulario");
        $this->fileName=$this->file['name'];
        $ruta=$rutaDestino . $this->fileName;
        if(is_file($ruta)===true){
            $idUnico=time();
            $this->fileName=$this->fileName . $idUnico;
            $ruta=$rutaDestino . $this->fileName;
        }
        if(move_uploaded_file($this->file['tmp_name'], $ruta)===false)
            throw new FileException('no se puede mover el fichero a su destino');

    }

    /**
     * @param string $rutaOrigen
     * @param string $rutaDestino
     * @throws FileException
     */
    public function copyFile(string $rutaOrigen, string $rutaDestino)
    {
       $origen=$rutaOrigen.$this->fileName;
       $destino=$rutaDestino.$this->fileName;
       if(is_file($origen)===false)
           throw new FileException("No existe el fichero $origen  que estas intentando copiar");
        if(is_file($destino)===true)
            throw new FileException("Ya exite el fichero $destino  y  no se puede sobreescribir");
        if(copy($origen, $destino)===false)
            throw new FileException("No se ha podido copiar $origen en $destino ");
    }

}