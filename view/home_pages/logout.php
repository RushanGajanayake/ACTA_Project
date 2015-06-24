<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 1/8/15
 * Time: 12:01 PM
 */

session_start();
session_destroy();
header("location:../../index.php");

?>