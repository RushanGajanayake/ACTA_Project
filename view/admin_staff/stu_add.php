<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 9/11/14
 * Time: 11:07 AM
 */

if(isset($_POST['add1'])){
    $year= $_POST['year'];
    $course= $_POST['course'];
    $level = $_POST['level'];
    $batch = $_POST['batch'];

    if($level==null){
        echo "Enter Details";

    }
    else{
        $id = $course."/".$level."/".$year."/".$batch."/";
//    session_start();
        $_SESSION['course'] = $course;
        $_SESSION['id'] = $id;



        include("../../view/admin_staff/student_reg.php");
    }


}

