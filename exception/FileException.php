<?php
class FileException extends Exception{
    public function __construct(string $message = "")
    {
        parent::__construct($message);
    }
}