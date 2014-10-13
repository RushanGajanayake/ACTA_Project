<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 9/16/14
 * Time: 12:27 AM
 */
require_once("../../ctrl/queries.php");
require_once("../../conn/db_conn.php");


class subjAdd{

    public function __construct(){

        if(isset($_POST['add_s'])){

            $s_ID = $_POST['s_ID'];
            $s_name = $_POST['s_name'];
            $s_credits = $_POST['s_credit'];
            $s_details = $_POST['s_details'];
            $ac_id = $_POST['ac_id'];
            $c_id = $_POST['c_id'];

            $values = array($s_ID,$s_name,$s_credits,$s_details,$c_id,$ac_id);

            $this->add("subject",$values);

        }
    }

    private function add($table,$values){

        $query = new mysqlQuery();

        if($query->insert($table,$values,$row=null)== true){
            include("../../view/admin_staff/subj_add.php");

        }
        else{
            echo "course data not entered";
        }
    }

}

$subj = new subjAdd();
?>