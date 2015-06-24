<html>
<head>
    <link rel="stylesheet"  href="/ACTA_project/res/css/content.css">
    <link rel="stylesheet"  href="/ACTA_project/res/css/admin.css">
</head>
<body>
<div class="panel_upper">
    <p>Student Details</p>
</div>
<div class="panel" id="panel">

    <?php
    /**
     * Created by PhpStorm.
     * User: Amali
     * Date: 10/6/14
     * Time: 1:24 PM
     */


    session_start();
    $username=$_SESSION['user_name'];

    require_once("../../mod/student/Studentdata.php");

    $stu = new Student();
    $stu->query("SELECT * FROM authen WHERE user_name = '{$username}'","Person_NIC");

    ?>

</div>
</body>
</html>