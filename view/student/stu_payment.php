<html>
<head>
    <link rel="stylesheet"  href="/ACTA_project/res/css/content.css">
    <link rel="stylesheet"  href="/ACTA_project/res/css/admin.css">
</head>
<body>
<div class="panel_upper">
    <p>Payment</p>
</div>
<div class="panel" id="panel">
    <?php
    /**
     * Created by PhpStorm.
     * User: Amali
     * Date: 10/8/14
     * Time: 4:20 PM
     */

    session_start();
    $username=$_SESSION['user_name'];

    require_once("../../mod/student/payment.php");

    $cors = new Payment();
    $cors->newBalance("SELECT * FROM payment WHERE Student_Student_ID = '{$username}'");
    echo "<br>";
    $cors->payStatement("SELECT * FROM payment WHERE Student_Student_ID = '{$username}'");

    ?>
    <table class="table1">
        <tr >
            <td><button class="button1" onclick="myFunction1('/ACTA_project/view/student/stu_home.php')">Back </button></td>
            <td></td>
        </tr>
    </table>
</div>

</body>
</html>