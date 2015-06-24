<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/26/14
 * Time: 6:10 PM
 */
require_once("../../ctrl/queries.php");
require_once("../../conn/db_conn.php");

class Event{

    public function __construct(){

        if(isset($_POST['add'])){

            $e_name = $_POST['e_name'];
            $e_date = $_POST['e_date'];
            $e_desc = $_POST['e_desc'];
            $a_id = $_POST['a_id'];

            $e_hr = $_POST['hour'];
            $e_min = $_POST['min'];
            $e_time = $e_hr.":".$e_min.":"."00";

            $values=array('',$e_name,$e_date,$e_time,$e_desc,$a_id);

            $this->add("event",$values);

        }

    }

    private function add($table,$val){

        $query = new mysqlQuery();

        if($query->insert($table,$val,$row=null)== true){
//            echo "Data Enetered";
            include("../../view/admin_staff/event.php");
        }
        else{
            echo "Data not entered";
        }
    }



}

$e = new Event();

?>