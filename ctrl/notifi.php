<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 1/18/15
 * Time: 10:55 AM
 */
include("../../ctrl/queries.php");
require_once("../../conn/db_conn.php");

class notifi{

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

    public function getUser($recei_nic,$users){

        if($this->databaseConnection()){


            $quary1 = $this->db_connection->prepare("SELECT * FROM ".$users." WHERE Person_NIC=:u_nic");
            $quary1->bindValue(':u_nic',$recei_nic,PDO::PARAM_STR);
            $quary1->execute();

            $data2 = $quary1->fetchObject();
//            $p_id = $data2->Ad_ID;


            return $data2;
        }

    }
    public function getMsg($id){

        $msg_details = array();

        if($this->databaseConnection()){

            $query =$this->db_connection->prepare("SELECT * FROM messages WHERE receiver_id='$id' ORDER BY m_id DESC");
            $query->execute();

            $i=0;
            while($rows= $query->fetch(PDO::FETCH_ASSOC)){
                $sender = $rows['sender_id'];

                $query2 = $this->db_connection->prepare("SELECT * FROM person WHERE NIC='$sender';");
                $query2->execute();
                $row1= $query2->fetch(PDO::FETCH_ASSOC);

                $fname = $row1['FirstName'];
                $lname = $row1['LastName'];

                $full= $fname." ".$lname;

                $msg_details[$i][0]= $full;
                $msg_details[$i][1]= $sender;
                $msg_details[$i][2]= $rows['msg'];

                $i++;

            }

            return $msg_details;
        }

    }
}

?>