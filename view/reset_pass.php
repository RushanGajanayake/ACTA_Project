<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 8/24/14
 * Time: 2:36 PM
 */
include("/ACTA_project/view/header.php"); ?>
<form action="/ACTA_project/indx/passwor_reset.php" method="post" name="passowrd_reset">
    <label for="username">User Name</label>
    <input type="text" name="username" id="username" autocomplete="off"><br>

    <label for="current_password">Current Password</label>
    <input type="password" name="current_password" id="current_password" autocomplete="off"><br>

    <label for="new_password">New Password</label>
    <input type="password" name="new_password" id="new_password" autocomplete="off"><br>

    <label for="new_password_repeat">New Password Repeat</label>
    <input type="password" name="new_password_repeat" id="new_password_repeat" autocomplete="off"><br>

    <input type="submit" name="reset_password" value="Reset Password">
</form>

