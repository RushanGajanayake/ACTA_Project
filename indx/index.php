<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 8/23/14
 * Time: 2:11 PM
 */

//require_once("../conn/config.php");
//require_once("conn/db_conn.php");

require_once("../ctrl/login.php");


$login = new Login();

if($login->isUserLoggedIn() == true  ){

    $pri_level = $_SESSION['pri_level'];

    if($pri_level==1){
        include("../view/home_pages/logged.php");
    }
    elseif($pri_level==2){
        include("../view/home_pages/stu_homepage.php");
    }
    elseif($pri_level==3){
        include("../view/home_pages/lecture_homepage.php");
    }
    elseif($pri_level==4){
        include("../view/home_pages/parent_homepage.php");
    }



}
else{
    include("../view/not_logged.php");
}
