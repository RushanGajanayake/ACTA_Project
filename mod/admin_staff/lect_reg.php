<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 8/31/14
 * Time: 11:47 PM
 */

include("../../ctrl/queries.php");
require_once("../../conn/db_conn.php");

class Lec_reg{

    //private $db_connection = null;

    public function __construct(){

        if(isset($_POST['add'])){

            $ac_ID = $_POST['ac_ID'];
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
            $desig = $_POST['desig'];
            $enroll_date = $_POST['enroll_date'];

            $values1 =array($nic,$title,$firstName,$surname,$addr,$city,$p_code,$email,$tele_No,$mob_No);

            $values2 = array($ac_ID,$desig,$enroll_date,$nic);


            $this->add("person",$values1);
            $this->add("aca_staff",$values2);

            include("../../view/admin_staff/lecture_reg.php");
        }

    }


    private function add($table,$values){
        //echo implode(',',$values);


        $query_add = new mysqlQuery();

        if($query_add->insert($table,$values,$row=null)==true){

        }
        else{
            echo "not insert";
        }


    }
}
$lec= new Lec_reg();

?>

