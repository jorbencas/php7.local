<?php
/**
 * Created by PhpStorm.
 * User: lliurex
 * Date: 07/12/2018
 * Time: 9:01
 */

class Connection
{
    /**
     * @return PDO
     */
    public static function make()
    {

        try{
            $config=App::get('config')['database'];
            $connection=new PDO(
            $config['connection'].';dbname='.$config['name'],
            $config['username'],
            $config['password'],
            $config['options']
        );
        }catch(PDOException $PDOException){
            die($PDOException->getMessage());
        }
        return $connection;
    }

}