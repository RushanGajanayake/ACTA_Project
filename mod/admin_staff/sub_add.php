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
            $veri = $_POST['verifi'];

            $values = array($s_ID,$s_name,$s_credits,$s_details,$c_id,$ac_id);

            if($veri==0){
                $this->addtocourse("subject",$values,$c_id);
            }
            else{

                $this->add("subject",$values,$c_id);
            }

        }
        if(isset($_POST['edit_sub'])){

            $s_ID = $_POST['s_ID'];
            $s_name = $_POST['s_name'];
            $s_credits = $_POST['s_credit'];
            $s_details = $_POST['s_details'];
            $ac_id = $_POST['ac_id'];
            $c_id = $_POST['c_id'];

            $value = array('Sub_ID'=>$s_ID,'Sub_Name'=>$s_name,'Sub_credit'=>$s_credits,'discription'=>$s_details,'Course_Course_ID'=>$c_id,'Aca_Staff_Ac_ID'=>$ac_id);
            $where = array('Sub_ID'=>$s_ID);


            $this->upDate("subject",$value,$where,$c_id);
        }

    }

    private function add($table,$values,$c_ids){

        $query = new mysqlQuery();

        if($query->insert($table,$values,$row=null)== true){
            $qury = "ajaxPost1('/ACTA_project/view/admin_staff/subj_add.php',$('#c_id'))";
            echo "<td><input class='input data' type='hidden' name='c_id' id='c_id' value='".$c_ids."'></td>";
            echo "<td>New Subject Entered<input class='button1' type='button' name='views' id='views' value='OK' onclick=".$qury."></td>";

        }
        else{
            echo "course data not entered";
        }
    }

    private  function addtocourse($table,$values,$c_ids){

        $query = new mysqlQuery();

        if($query->insert($table,$values,$row=null)== true){
            echo "New Subject Entered to the course";

            $qury = "ajaxPost1('/ACTA_project/mod/admin_staff/course_details.php',$('#c_id'))";
            echo "<td><input class='input data' type='hidden' name='c_id' id='c_id' value='".$c_ids."'></td>";
            echo "<td>New Subject Entered<input class='button1' type='button' name='views' id='views' value='OK' onclick=".$qury."></td>";

        }
        else{
            echo "subject data not entered";
        }
    }

    private function upDate($table,$values,$where,$c_id){

        $up_add = new mysqlQuery();

        if($up_add->update($table,$values,$where)){
//            echo "Course data updated";
            $qury = "ajaxPost1('/ACTA_project/mod/admin_staff/course_details.php',$('#c_id'))";
            echo "<td><input class='input data' type='hidden' name='c_id' id='c_id' value='".$c_id."'></td>";
            echo "<td>Subject Edit Successfully..!!<input class='button1' type='button' name='views' id='views' value='OK' onclick=".$qury."></td>";

        }
        else{
            echo "Data not updated";
        }
    }

    private function deleteSubject($table,$where){



        $dlt = new mysqlQuery();

        if($dlt->delete($table,$where)){
            echo "Student Information Deleted";
        }
        else{
            echo "Student not deleted";
        }

    }

}

$subj = new subjAdd();
?>