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
            $c_dura = $_POST['c_dura'];
            $admin_id = $_POST['admin_id'];

            $values = array($c_ID,$c_name,$c_details,$c_level,$c_dura,$admin_id);

            $this->add("course",$values);

            //session_start();
            $_SESSION['cour']= $c_ID;  // i think there is something wrong in this session. check again. but working properly. and if we loged then new session start in login.php page


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
// create a class for courseAdd
$c_add = new CourseAdd();

?>