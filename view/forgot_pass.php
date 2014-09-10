<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 8/24/14
 * Time: 1:13 PM
 */

include("../view/header.php"); ?>

<!-- forgot password form-->



<title>ACTA</title>
<link rel="stylesheet" href="/ACTA_project/res/css/login_style.css">
<body>
<!-- login form -->
<div class="login_form">
    <form action="/ACTA_project/indx/passwor_reset.php" method="post" name="login">
        <div class="f_pass">
            <div class="login_h">
                <div class="login_header">
                    <p >Find Your Account</p>
                    <div class="login_head">
                        <table class="f_content">

                            <tr>
                                <td><label class="label1 username" for="username">Enter User Name or Email</label></td>
                                <td><input  class="input username" type="text" name="username" id="username"  autocomplete="off"></td>
                            </tr>


                        </table>
                    </div>

                </div>
            </div>
            <div class="footer">
                <div class="button">
                    <input class="submit" type="submit" value="Reset Password" name="reset_password">
                    <button class="submit1" name="cancel"><a href="/ACTA_project/view/not_logged.php">Cancel</a></button>
                </div>
            </div>
        </div>

    </form>

</div>


</body>
