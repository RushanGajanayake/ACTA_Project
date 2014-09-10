<!--
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 8/23/14
 * Time: 3:41 PM
 */
-->

<title>ACTA | LogIn</title>
<link rel="stylesheet" href="/ACTA_project/res/css/login_style.css">
<body>
<!-- login form -->
    <div class="login_form">
        <form action="/ACTA_project/indx/index.php" method="post" name="login">
            <div class="login">
                <div class="login_h">
                    <div class="login_header">
                        <p >LOGIN</p>
                            <div class="login_head">
                                <table class="content">

                                        <tr>
                                            <td><label class="label1 username" for="login_username">Username </label></td>
                                            <td><input  class="input username" type="text" name="login_username" id="login_username"  autocomplete="off"></td>
                                        </tr>
                                        <tr>
                                            <td><label class="label1 pass" for="login_password">Password </label></td>
                                            <td><input class="input pass" type="password" name="login_password" id="login_password" autocomplete="off"></td>
                                        </tr>
                                        <tr>

                                            <td></td>
                                            <td><input type="checkbox" name="remember_me" id="remember_me" autocomplete="off" value="1">
                                                 <label class="remember" for="remember_me">Remember Username</label></td>
                                        </tr>

                                </table>
                            </div>

                    </div>
                </div>
                <div class="footer">
                    <div class="footer_r">
                        <div class="log_button">
                            <input class="submit" type="submit" value="Log In" name="login">
                        </div>
                    </div>
                    <div class="footer_l">
                        <div class="setting">
                            <img class="setpic" src="/ACTA_project/res/image/loging_setting.png"  height="25" width="25" >
                            <ul class="p">
                                <li class="l"><a class="a" href="/ACTA_project/view/forgot_pass.php">Forgot Password</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>


</body>