<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 9/7/14
 * Time: 12:53 AM
 */
include("../../ctrl/queries.php");
require_once("../../conn/db_conn.php");

class Parent_reg{

    public function __construct(){

        if(isset($_POST['add'])){

            $ps_ID = $_POST['ps_ID'];
            $nic = $_POST['nic'];
            $title = $_POST['title'];
            $firstName = $_POST['firstName'];
            $surname = $_POST['surname'];
            $addr = $_POST['addr'];
            $city = $_POST['city'];
            $p_code = $_POST['p_code'];
            $email = $_POST['email'];
            $tele_No = $_POST['tele_No'];
            $mob_No = $_POST['mob_No'];

            $values1 =array($nic,$title,$firstName,$surname,$addr,$city,$p_code,$email,$tele_No,$mob_No);

            $values2 = array($ps_ID,$nic);


            $this->add("person",$values1);
            $this->add("parent",$values2);
        }

    }


    private function add($table,$values){
        //echo implode(',',$values);


        $query_add = new mysqlQuery();

        if($query_add->insert($table,$values,$row=null)==true){
            echo "data insert ";
            include("../../view/admin_staff/student_reg.php");
        }
        else{
            echo "not insert";
        }


    }


}
$parent = new Parent_reg();

?>