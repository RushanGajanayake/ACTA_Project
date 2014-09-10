<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 8/24/14
 * Time: 2:45 PM
 */


// if user wants to reset the password then user will set new password. after set new password user will be received a password rest email.
require_once("../conn/config.php");

require_once("../ctrl/login.php");


$login = new Login();

if($login->mailWasSent()== true ){
    echo "Email sent to your account";
}
else{
    echo "## email send failed";
}