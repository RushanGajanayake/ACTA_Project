<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 9/15/14
 * Time: 7:13 PM
 */
require_once("../../ctrl/queries.php");
require_once("../../conn/db_conn.php");

class CourseAdd{

    public function __construct(){

        if(isset($_POST['add_c'])){

            $c_ID = $_POST['c_ID'];
            $c_name = $_POST['c_name'];
            $c_details = $_POST['c_details'];
            $c_level = $_POST['c_level'];

            $c_yr = $_POST['c_yr'];
            $c_months = $_POST['c_months'];
            $admin_id = $_POST['admin_id'];

            $c_dura = $this->duration($c_yr,$c_months);

            $values = array($c_ID,$c_name,$c_details,$c_level,$c_dura,$admin_id);

            $this->add("course",$values,$c_ID);

            //session_start();
//            $_SESSION['cour']= $c_ID;  // i think there is something wrong in this session. check again. but working properly. and if we loged then new session start in login.php page


        }

        if(isset($_POST['edit_course'])){


            $c_ID = $_POST['c_ID'];
            $c_name = $_POST['c_name'];
            $c_details = $_POST['c_details'];
            $c_level = $_POST['c_level'];
            $c_dura = $_POST['c_dura'];
            $admin_id = $_POST['admin_id'];



            $value = array('Course_ID'=>$c_ID,'Name'=>$c_name,'Details'=>$c_details,'No_of_Levels'=>$c_level,'Duration'=>$c_dura,'Admin_Staff_Ad_ID'=>$admin_id);
            $where = array('Course_ID'=>$c_ID);

            $this->upDate("course",$value,$where,$c_ID);
        }


    }

    private function add($table,$values,$c_id){

        $query = new mysqlQuery();

        if($query->insert($table,$values,$row=null)== true){
//            include("../../view/admin_staff/subj_add.php");
            $qury = "ajaxPost1('/ACTA_project/view/admin_staff/subj_add.php',$('#c_id'))";
            echo "<td><input class='input data' type='hidden' name='c_id' id='c_id' value='".$c_id."'></td>";
            echo "<td>New Course Entered..!!<input class='button1' type='button' name='views' id='views' value='OK' onclick=".$qury."></td>";

        }
        else{
            echo "course data not entered";
        }

    }

    private function upDate($table,$values,$where,$c_id){

        $up_add = new mysqlQuery();

        if($up_add->update($table,$values,$where)){
//            echo "Course data updated";
            $qury = "ajaxPost1('/ACTA_project/mod/admin_staff/course_details.php',$('#c_id'))";
            echo "<td><input class='input data' type='hidden' name='c_id' id='c_id' value='".$c_id."'></td>";
            echo "<td>Course Edit Successfully..!!<input class='button1' type='button' name='views' id='views' value='OK' onclick=".$qury."></td>";

        }
        else{
            echo "Data not updated";
        }
    }

    private function deleteCourse($table,$where){



        $dlt = new mysqlQuery();

        if($dlt->delete($table,$where)){
            echo "Student Information Deleted";
        }
        else{
            echo "Student not deleted";
        }

    }

    private function duration($yr,$months){

        $duration = ($yr*12)+$months;
        return $duration;
    }

}
// create a class for courseAdd
$c_add = new CourseAdd();

?>