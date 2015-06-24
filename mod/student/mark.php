<?php
/**
 * Created by PhpStorm.
 * User: Amali
 * Date: 10/8/14
 * Time: 10:39 AM
 */
require_once("mark_view.php");

if(empty($_POST["Course"])){

    echo '<p style="color:#e40005;  margin-left: 20px; text-align:center; font-family: Century Gothic; font-size:22px;background-color: #ffebe8;padding: 25px;margin: 25px; border-style: solid; border-color:#dd3c10 ">Enter Course Name</p>';
}


else{
    $cors = $_POST["Course"];
    session_start();
    $username=$_SESSION['user_name'];
    $mark = new Mark();
    $mark->test($cors);
    //$mark->getmark("SELECT * FROM marks WHERE Student_ID = '{$username}' AND Course_Course_ID = '{$cors}'}' ",$cors,$username);

}