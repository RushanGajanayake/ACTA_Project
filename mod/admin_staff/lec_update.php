<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 11/16/14
 * Time: 6:49 PM
 */

include("../../ctrl/queries.php");
require_once("../../conn/db_conn.php");

class LecUpdate{

    public function __construct(){

        if(isset($_POST['updated'])){

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


            $values1 =array('Title'=>$title,'FirstName'=>$firstName,'LastName'=>$surname,'Street'=>$addr,'City'=>$city,'PostalCode'=>$p_code,'Email'=>$email,'PhoneNo'=>$tele_No,'MobileNo'=>$mob_No);
            $where1 = array('NIC'=>$nic);

            $values2 = array('Ac_ID'=>$ac_ID,'Designation'=>$desig ,'Enroll_Date'=>$enroll_date,'Person_NIC'=>$nic);
            $where2 = array('Person_NIC'=>$nic);

            $this->upDate("person",$values1,$where1);
            $this->upDate("student",$values2,$where2);



        }

        if(isset($_POST['deleted'])){
            $ac_ID = $_POST['ac_ID'];
            $nic = $_POST['nic'];

            $whr = "NIC = '".$nic."'";

            $this->deleteLec('person',$whr);



        }


    }

    private function upDate($table,$values,$where){

        $up_add = new mysqlQuery();

        if($up_add->update($table,$values,$where)){
            echo "Lecturer data updated";
        }
        else{
            echo "Data not updated";
        }
    }

    private function deleteLec($table,$where){



        $dlt = new mysqlQuery();

        if($dlt->delete($table,$where)){
            echo "Lecturer Information Deleted";
        }
        else{
            echo "Lecturer not deleted";
        }

    }




}

$up = new LecUpdate();

?>