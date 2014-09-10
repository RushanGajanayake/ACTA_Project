<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 8/27/14
 * Time: 9:48 AM
 */

include("../../ctrl/queries.php");
require_once("../../conn/db_conn.php");

class Stu_reg{

    //private $db_connection = null;

    public function __construct(){




        if(isset($_POST['add1'])){

            $stu_ID = $_POST['stu_ID'];
            $nic = $_POST['nic'];
            $title = $_POST['title'];
            $firstName = $_POST['firstName'];
            $surname = $_POST['surname'];
            //date of birth
            $dob_date = $_POST['dob_date'];
            $dob_month = $_POST['dob_month'];
            $dob_year = $_POST['dob_year'];

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
            //$img = $_FILES['pic'];

            $dob = $dob_year."-".$dob_month."-".$dob_date;

            //$img_path = $this->profImage($img);

            //session_start();

            $_SESSION['course'] = $c_ID;
            $_SESSION['id'] = $stu_ID;

            $values1 =array($nic,$title,$firstName,$surname,$addr,$city,$p_code,$email,$tele_No,$mob_No);

            $values2 = array($stu_ID,$dob,$cmp_name ,$cmp_add,$cmp_No,$reg_date,$nic,$c_ID);



            $this->add("person",$values1);
            $this->add("student",$values2);

            include("../../view/admin_staff/student_reg.php");
        }

    }


    private function add($table,$values){
        //echo implode(',',$values);


        $query_add = new mysqlQuery();

        if($query_add->insert($table,$values,$row=null)==true){
            echo "data insert ";
        }
        else{
            echo "not insert";
        }


    }
    private function profImage($img){

        $img1= $img['tmp_name'];
        $imgfp= fopen($img1,'rb');
        return $imgfp;
    }
}

$st = new Stu_reg();
?>