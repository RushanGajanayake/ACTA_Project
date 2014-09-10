<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 8/26/14
 * Time: 11:54 PM
 */

require_once("config.php");

class DB_conn extends PDO{

    private static $connection;



    public function __construct(){

        try{
            //self::$connection = new PDO
            parent::__construct('mysql:host='.DB_host.';dbname='.DB_name.';charset=utf8',DB_user,DB_pass);
            //self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        }
        catch(PDOException $e){
            echo $e->getMessage();
            die();
        }

    }


    public static function conn(){

        if(!self::$connection){
            self::$connection = new DB_conn();
        }
        return self::$connection;



    }

}


?>