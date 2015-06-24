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
    public $addParent = null;

    //private $db_connection = null;

    public function __construct(){

        if(isset($_POST['add1'])){

            $stu_ID = $_POST['stu_ID'];
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
            $reg_date = $_POST['reg_date'];
            $c_ID = $_POST['c_ID'];
            $cmp_name = $_POST['cmp_name'];
            $cmp_add = $_POST['cmp_add'];
            $cmp_No = $_POST['cmp_No'];

            $this->addParent = $_POST['yesNo'];

            //$img = $_FILES['pic'];

//            $dob = $dob_year."-".$dob_month."-".$dob_date;


            //$img_path = $this->profImage($img);

            //session_start();

            $_SESSION['course'] = $c_ID;
            $_SESSION['id'] = $stu_ID;

            $values1 =array($nic,$title,$firstName,$surname,$addr,$city,$p_code,$email,$tele_No,$mob_No);

            $values2 = array($stu_ID,$cmp_name ,$cmp_add,$cmp_No,$reg_date,$nic,$c_ID);



            $this->add("person",$values1);
            $this->add("student",$values2);

            if($this->addParent== 'yesCheck'){


                $nic_P = $_POST['nicP'];
                $title_P = $_POST['titleP'];
                $firstName_P = $_POST['firstNameP'];
                $surname_P = $_POST['surnameP'];
                $addr_P = $_POST['addrP'];
                $city_P = $_POST['cityP'];
                $p_code_P = $_POST['p_codeP'];
                $email_P = $_POST['emailP'];
                $tele_No_P = $_POST['tele_NoP'];
                $mob_No_P = $_POST['mob_NoP'];

                $values3 =array($nic_P,$title_P,$firstName_P,$surname_P,$addr_P,$city_P,$p_code_P,$email_P,$tele_No_P,$mob_No_P);

                $parent_id = "P/".$stu_ID;

                $values4 = array($parent_id,$nic_P);


                $this->add("person",$values3);
                $this->add("parent",$values4);
            }
//            elseif($this->addParent== 'noCheck' || $this->addParent==null)break;


            include("../../view/admin_staff/student_reg.php");
        }

    }


    private function add($table,$values){
        //echo implode(',',$values);


        $query_add = new mysqlQuery();

        if($query_add->insert($table,$values,$row=null)==true){
//            echo '<p style="color:#2122e4;  margin-left: 20px; text-align:center; font-family: Century Gothic; font-size:20px;background-color: #e2ebff;padding: 25px;margin: 25px; border-style: solid; border-color:#3c94dd ">Data Inserted</p>';
        }
        else{
            echo '<p style="color:#e40005;  margin-left: 20px; text-align:center; font-family: Century Gothic; font-size:22px;background-color: #ffebe8;padding: 25px;margin: 25px; border-style: solid; border-color:#dd3c10 ">Data Not Inserted</p>';
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