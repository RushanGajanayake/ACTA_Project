<html>
<head>
    <link rel="stylesheet"  href="/ACTA_project/res/css/content.css">
    <link rel="stylesheet"  href="/ACTA_project/res/css/admin.css">
</head>
<body>
<div class="panel_upper">
    <p>Lecturer Details</p>
</div>
<div class="panel" id="panel">
    <div class="panel_body">
        <div class="panel_bar" >
        </div>
        <div class="panel_body_cont">

    <?php
    
    session_start();
    $username=$_SESSION['user_name'];

    require_once("../../mod/lec mod/lecturerdata.php");

    $lec = new Lecturer();
    $lec->query("SELECT * FROM authen WHERE user_name = '{$username}'","Person_NIC");

    ?>

</div>
        </div>

    </div>
</body>
</html>