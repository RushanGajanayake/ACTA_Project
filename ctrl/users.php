<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 1/19/15
 * Time: 1:00 PM
 */

class Users{
    private $db_connection = null;

    public function __construct(){

    }

    private function databaseConnection(){

        if($this->db_connection != null){
            return true;
        }
        else{
            return $this->db_connection = DB_conn::conn();
        }
    }

    public function getUserData($recei_nic,$users){

        if($this->databaseConnection()){


            $quary1 = $this->db_connection->prepare("SELECT * FROM ".$users." WHERE Person_NIC=:u_nic");
            $quary1->bindValue(':u_nic',$recei_nic,PDO::PARAM_STR);
            $quary1->execute();

            $data2 = $quary1->fetchObject();


            return $data2;
        }

    }

    public function usersPersonalData($recei_nic,$users,$where){

        if($this->databaseConnection()){


            $quary2 = $this->db_connection->prepare("SELECT * FROM ".$users." WHERE ".$where."=:u_nic");
            $quary2->bindValue(':u_nic',$recei_nic,PDO::PARAM_STR);
            $quary2->execute();

            $data3 = $quary2->fetchObject();



            return $data3;
        }
    }
}
?>