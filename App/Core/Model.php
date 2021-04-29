<?php 
namespace App\Core;
/**
 * Respnosável pela conexão com Banco de Dados (Modelo singoltom) apenas uma instancia de conexão
 */
class Model {

    private static $instance;
    /**
     * Método responsavel para criar conexão
     *
     * @return void
     */
    public static function getConn(){

        if(!isset(self::$instance)){
            //self::$instance = new \PDO('mysql:root=localhost;dbname=crudfatec;charset=utf8','root','senha');
            self::$instance = new \PDO("mysql:host=teste.cnewaf319j5p.us-east-1.rds.amazonaws.com;port=3306;dbname=crudFatec;charset=utf8",'root','');
        }
        return self::$instance;
    }
}

