<?php
/**
 * Created by PhpStorm.
 * User: Amali
 * Date: 10/10/14
 * Time: 2:48 PM
 */
require_once("getEditData.php");
session_start();
$username=$_SESSION['user_name'];

$dd = new Student1();
$q = "SELECT * FROM authen WHERE user_name = '{$username}'";
$w = "Person_NIC";
if(isset($_POST["street"],$_POST["city"],$_POST["code"],$_POST["email"],$_POST["pno"],$_POST["mno"])){
    $errors = array();
    if(isset($_POST["cname"],$_POST["caddr"],$_POST["cno"])){
        $errors = array();
    }

    if(filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)==false){
        $errors[] = "###Invalid Email Adress,,,No update done";
        echo '<p style="color:#e40005;  margin-left: 20px; text-align:center; font-family: Century Gothic; font-size:22px;background-color: #ffebe8;padding: 25px;margin: 25px; border-style: solid; border-color:#dd3c10 ">Invalid Email Address</p>';
    }
    if(empty($errors)){
        $dd->setData($_POST["street"],$_POST["city"],$_POST["code"],$_POST["email"],$_POST["pno"],$_POST["mno"],$_POST["cname"],$_POST["caddr"],$_POST["cno"]);

    }
}
else{
    echo '<p style="color:#e40005;  margin-left: 20px; text-align:center; font-family: Century Gothic; font-size:22px;background-color: #ffebe8;padding: 25px;margin: 25px; border-style: solid; border-color:#dd3c10 ">No update Done</p>';
}