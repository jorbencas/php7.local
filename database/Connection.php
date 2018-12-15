<?php
/**
 * Created by PhpStorm.
 * User: jorge
 * Date: 07/12/2018
 * Time: 10:02
 */

class Connection
{

    /**
     * @return PDO
     */
    public static function make(){


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