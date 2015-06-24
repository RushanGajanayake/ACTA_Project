<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 1/18/15
 * Time: 8:16 PM
 */
include("../../ctrl/queries.php");
require_once("../../conn/db_conn.php");

class Courses{
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

    public function getData(){

        if($this->databaseConnection()){

            $query =$this->db_connection->prepare("SELECT * FROM course");
            $query->execute();

            $course_data = array();
            $i = 0;
            while($row= $query->fetch(PDO::FETCH_ASSOC)){
                $c_id = $row['Course_ID'];
                $c_name = $row['Name'];

                $course_data[$i][0]= $c_id;
                $course_data[$i][1]=$c_name;

                $i++;
            }
            return $course_data;
        }

    }
    public function getSubjectData($lec_id){
        if($this->databaseConnection()){

            $query =$this->db_connection->prepare("SELECT * FROM subject WHERE Aca_Staff_Ac_ID='$lec_id'");
            $query->execute();

            $details = array();
            $i=0;
            while($rows= $query->fetch(PDO::FETCH_ASSOC)){

                $sub_id = $rows['Sub_ID'];
                $sub_name = $rows['Sub_Name'];
                $sub_crdt = $rows['Sub_credit'];
                $sub_desc = $rows['discription'];

                $c_id = $rows['Course_Course_ID'];

//                $query1 =$this->db_connection->prepare("SELECT * FROM course WHERE Course_ID='$c_id'");
//                $query1->execute();
//                while($rows1= $query1->fetch(PDO::FETCH_ASSOC)){
//
//                }

                $details[$i][0]= $sub_id;
                $details[$i][1]= $sub_name;
                $details[$i][2]= $sub_crdt;
                $details[$i][3]= $sub_desc;
                $details[$i][4]= $c_id;

                $i++;
            }

        }

        return $details;


    }


}

?>