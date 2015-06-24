<?php

require_once("getEditData.php");
session_start();
$username=$_SESSION['user_name'];

$dd = new Student1();
$q = "SELECT * FROM authen WHERE user_name = '{$username}'";
$w = "Person_NIC";

?>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet"  href="/ACTA_project/res/css/content.css">
    <link rel="stylesheet"  href="/ACTA_project/res/css/admin.css">
</head>
<body>
<form action="/ACTA_project/mod/student/editSuccess.php" method="post" id="stu_edi">
    <table class="table1">
        <tr class="row1">
            <td class="row_label">Street</td>
            <td class="input_data"><input class="input data" type='text'  name="street" value='<?php $s = $dd->query($q,$w,1);echo $s;?>'></td>
        </tr>
        <tr class="row1">
            <td class="row_label">City</td>
            <td class="input_data"><input class="input data" type='text' name="city"  value='<?php $s = $dd->query($q,$w,2);echo $s;?>'></td>
        </tr>
        <tr class="row1">
            <td class="row_label">Postal Code</td>
            <td class="input_data"><input class="input data" type='text' name="code" value='<?php $s = $dd->query($q,$w,3);echo $s;?>'></td>
        </tr>
        <tr class="row1">
            <td class="row_label">Email</td>
            <td class="input_data"><input class="input data" type='text' name="email" value='<?php $s = $dd->query($q,$w,4);echo $s;?>'></td>
        </tr>
        <tr class="row1">
            <td class="row_label">Phone No</td>
            <td class="input_data"><input class="input data" type='text' name="pno" value='<?php $s = $dd->query($q,$w,5);echo $s;?>'></td>
        </tr>
        <tr class="row1">
            <td class="row_label">Mobile No</td>
            <td class="input_data"><input class="input data" type='text' name="mno" value='<?php $s = $dd->query($q,$w,6);echo $s;?>'></td>
        </tr>
        <tr class="row1">
            <td class="row_label">Company Name</td>
            <td class="input_data"><input class="input data" type='text'  name="cname" value='<?php $s = $dd->query($q,$w,7);echo $s;?>'></td>
        </tr>
        <tr class="row1">
            <td class="row_label">Office Address</td>
            <td class="input_data"><input class="input data" type='text'  name="caddr" value='<?php $s = $dd->query($q,$w,8);echo $s;?>'></td>
        </tr>
        <tr class="row1">
            <td class="row_label">Office Phone No</td>
            <td class="input_data"><input class="input data" type='text' name="cno"  value='<?php $s = $dd->query($q,$w,9);echo $s;?>'></td>
        </tr>

        <tr>
            <td>  <input class="button1" type="button"  value="Update" name="adding2" onclick="ajaxPost('/ACTA_project/mod/student/editSuccess.php',$('#stu_edi').serialize()+'&adding2=Update')"> </td>
        </tr>

    </table>
</form>
</body>
</html>
