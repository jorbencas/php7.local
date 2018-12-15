<?php
/**
 * Created by PhpStorm.
 * User: jorge
 * Date: 07/12/2018
 * Time: 11:33
 */
require_once __DIR__.'/../core/App.php';
require_once __DIR__.'/../exceptions/QueryException.php';



abstract class QueryBuilder
{
    private $connection;
    private $table;
    private $classEntity;

    /**
     * QueryBuilder constructor.
     * @param PDO $connection
     */
    public function __construct(string $table,string $classEntity)
    {

        $this->connection = App::getConnection();
        $this->table=$table;
        $this->classEntity=$classEntity;
    }

    /**
     * @return array
     * @throws QueryException
     */

    public function findAll(){
        $sql="SELECT * FROM $this->table";
        //$this->connection->query($sql);
        $pdostatement=$this->connection->prepare($sql);
        if($pdostatement->execute()===false){
            throw new QueryException("No se ha podido ejecutar la query");
        }else{
            return $pdostatement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,$this->classEntity);
        }
    }

    /**
     * @param IEntity $entity
     * @throws QueryException
     */
    public function save(IEntity $entity){
        try{
            $parameters=$entity->toArray();
            $sql=sprintf('INSERT INTO %s (%s) VALUES (%s)',
                $this->table,
                implode(', ',array_keys($parameters)),
                ':'.implode(', :', array_keys($parameters)));
            $pdoStatement=$this->connection->prepare($sql);
            $pdoStatement->execute($parameters);
        }catch(PDOException $exception){
            throw new PDOException("Error al insertar en la BDA");
        }
    }




}