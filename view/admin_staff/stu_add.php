<?php
///**
// * Created by PhpStorm.
// * User: Rushan Gajanayake
// * Date: 9/11/14
// * Time: 11:07 AM
// */
//


?>
<html>
<head>
    <link rel="stylesheet"  href="/ACTA_project/res/css/content.css">
    <link rel="stylesheet"  href="/ACTA_project/res/css/admin.css">
</head>
<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 9/11/14
 * Time: 11:07 AM
 */
$path = "myFunction1('/ACTA_project/view/admin_staff/stu_check.php')";
if(isset($_POST['add1'])){
    if(empty($_POST["year"])){
////        echo '<p style="color:#e40005;  margin-left: 20px; text-align:center; font-family: Century Gothic; font-size:22px;background-color: #ffebe8;padding: 25px;margin: 25px; border-style: solid; border-color:#dd3c10 ">Please select year</p>';
//        echo "<table class='table1'>
//            <tr >
//            <td><button class='button1' onclick=".$path.">Back </button></td>
//            <td></td>
//            </tr>
//            </table>";
    }
    elseif(empty($_POST["course"])){
//        echo '<p style="color:#e40005;  margin-left: 20px; text-align:center; font-family: Century Gothic; font-size:22px;background-color: #ffebe8;padding: 25px;margin: 25px; border-style: solid; border-color:#dd3c10 ">Please select course</p>';
//        echo "<table class='table1'>
//            <tr >
//            <td><button class='button1' onclick=".$path.">Back </button></td>
//            <td></td>
//            </tr>
//            </table>";
    }
    elseif(empty($_POST["level"])){
//        echo '<p style="color:#e40005;  margin-left: 20px; text-align:center; font-family: Century Gothic; font-size:22px;background-color: #ffebe8;padding: 25px;margin: 25px; border-style: solid; border-color:#dd3c10 ">Please select level</p>';
//        echo "<table class='table1'>
//            <tr >
//            <td><button class='button1' onclick=".$path.">Back </button></td>
//            <td></td>
//            </tr>
//            </table>";
    }
    elseif(empty($_POST["batch"])){
//        echo '<p style="color:#e40005;  margin-left: 20px; text-align:center; font-family: Century Gothic; font-size:22px;background-color: #ffebe8;padding: 25px;margin: 25px; border-style: solid; border-color:#dd3c10 ">Please select batch</p>';
//        echo "<table class='table1'>
//            <tr >
//            <td><button class='button1' onclick=".$path.">Back </button></td>
//            <td></td>
//            </tr>
//            </table>";
    }
    else{
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


}
?>
</html>
