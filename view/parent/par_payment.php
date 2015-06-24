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

require_once("../../conn/db_conn.php");

session_start();
$u_nic=$_SESSION['p_nic'];

$db = DB_conn::conn();

$query = $db->prepare('SELECT * FROM parent WHERE Person_NIC = :u_nic');
$query->bindValue(':u_nic',$u_nic,PDO::PARAM_STR);
$query->execute();

$data = $query->fetchObject();
$username = $data->Student_ID;
$replace = "P/";
$student_id = str_replace($replace,'',$username);

require_once("../../mod/student/payment.php");

$cors = new Payment();
//echo "<p style='padding: 7px 35px;font-family: \"Century Gothic\"; font-size: 25px;color: #ffffff; background: #00519d; margin: 10px'>New Balance </p>";
$cors->newBalance("SELECT * FROM payment WHERE Student_Student_ID = '{$student_id}'");
echo "<br>";
//echo "<p style='padding: 7px 35px;font-family: \"Century Gothic\"; font-size: 25px;color: #ffffff; background: #00519d; margin: 10px'>Pay Statement </p>";
$cors->payStatement("SELECT * FROM payment WHERE Student_Student_ID = '{$student_id}'");

?>
</div>
</body>
</html>