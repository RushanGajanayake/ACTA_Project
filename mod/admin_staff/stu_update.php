<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 9/27/14
 * Time: 10:00 AM
 */

include("../../ctrl/queries.php");
require_once("../../conn/db_conn.php");

class StuUpdate{

    public function __construct(){

        if(isset($_POST['updated'])){

            $stu_ID = $_POST['stu_ID'];
            $nic = $_POST['nic'];
            $title = $_POST['title'];
            $firstName = $_POST['firstName'];
            $surname = $_POST['surname'];
//            $dob = $_POST['dob'];

            $addr = $_POST['addr'];
            $city = $_POST['city'];
            $p_code = $_POST['p_code'];
            $email = $_POST['email'];
            $tele_No = $_POST['tele_No'];
            $mob_No = $_POST['mob_No'];
            $reg_date = $_POST['reg_date'];
            $c_ID = $_POST['c_ID'];
            $cmp_name = $_POST['cmp_name'];
            $cmp_add = $_POST['cmp_add'];
            $cmp_No = $_POST['cmp_No'];

            $dob = "2014-08-15";

            $values1 =array('Title'=>$title,'FirstName'=>$firstName,'LastName'=>$surname,'Street'=>$addr,'City'=>$city,'PostalCode'=>$p_code,'Email'=>$email,'PhoneNo'=>$tele_No,'MobileNo'=>$mob_No);
            $where1 = array('NIC'=>$nic);

            $values2 = array('DateOfBirth'=>$dob,'Company'=>$cmp_name ,'Office_address'=>$cmp_add,'Office_TelNo'=>$cmp_No,'Reg_Date'=>$reg_date,'Person_NIC'=>$nic,'Course_Course_ID'=>$c_ID);
            $where2 = array('Student_ID'=>$stu_ID);

            $this->upDate("person",$values1,$where1);
            $this->upDate("student",$values2,$where2);



        }

        if(isset($_POST['deleted'])){
            $stu_ID = $_POST['stu_ID'];
            $nic = $_POST['nic'];

            $whr = "NIC = '".$nic."'";

            $this->deleteStudent('person',$whr);



        }


    }

    private function upDate($table,$values,$where){

        $up_add = new mysqlQuery();

        if($up_add->update($table,$values,$where)){
            echo "Student data updated";
        }
        else{
            echo "Data not updated";
        }
    }

    private function deleteStudent($table,$where){



        $dlt = new mysqlQuery();

        if($dlt->delete($table,$where)){
            echo "Student Information Deleted";
        }
        else{
            echo "Student not deleted";
        }

    }




}

$up = new StuUpdate();

?>