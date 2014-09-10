<!--
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 8/31/14
 * Time: 11:48 PM
 */
 -->
<body>
<form action="/ACTA_project/view/admin_staff/lecture_reg.php" method="post" id="lect_reg">
    <table class="table1">
        <tr class="row1">
            <td class="row_label">Academic Staff ID</td>
            <td class="input_data"><input class="input data" type="text" name="ac_ID" id="ac_ID"></td>
        </tr>
        <tr class="row2">
            <td class="row_label">NIC No </td>
            <td class="input_data"><input class="input data" type="text" name="nic" id="nic"></td>
        </tr>
        <tr class="row1">
            <td class="row_label">Title</td>
            <td class="input_data"><select name="title" id="title"><option value=" "></option><option value="Mr">Mr</option><option value="Mrs">Mrs</option><option value="Ms">Ms</option>
                </select>
            </td>

        </tr>
        <tr class="row2">
            <td class="row_label">First Name</td>
            <td class="input_data"><input class="input data" type="text" name="firstName" id="firstName"></td>
        </tr>
        <tr class="row1">
            <td class="row_label">Surname</td>
            <td class="input_data"><input class="input data" type="text" name="surname" id="surname"></td>
        </tr>
        <tr class="row2">
            <td class="row_label">Address</td>
            <td class="input_data"><textarea class="inputArea" name="addr" id="addr" rows="4" cols="20"></textarea></td>
        </tr>
        <tr class="row1">
            <td class="row_label">City</td>
            <td class="input_data"><input class="input data" type="text" name="city" id="city"></td>
        </tr>
        <tr class="row2">
            <td class="row_label">Postal Code</td>
            <td class="input_data"><input class="input data" type="text" name="p_code" id="p_code"></td>
        </tr>
        <tr class="row1">
            <td class="row_label">Email</td>
            <td class="input_data"><input class="input data" type="text" name="email" id="email"></td>
        </tr>
        <tr class="row2">
            <td class="row_label">Telephone No</td>
            <td class="input_data"><input class="input data" type="text" name="tele_No" id="tele_No"></td>
        </tr>
        <tr class="row1">
            <td class="row_label">Mobile No</td>
            <td class="input_data"><input class="input data" type="text" name="mob_No" id="mob_No"></td>
        </tr>
        <tr class="row2">
            <td class="row_label">Designation</td>
            <td class="input_data"><input class="input data" type="text" name="desig" id="desig"></td>
        </tr>
        <tr class="row1">
            <td class="row_label">Enroll Date</td>
            <td class="input_data"><input class="input data" type="date" name="enroll_date" id="enroll_date"></td>
        </tr>
        <tr>
            <td><input class="button1" type="button" value="Add" name="add" onclick="ajaxPost('/ACTA_project/view/admin_staff/lecture_reg.php',$('#lect_reg').serialize()+'&add=Add')"></td>
            <td></td>
        </tr>

    </table>

</form>

<button class="button1" onclick="myFunction1('/ACTA_project/view/admin_staff/manage_details.html')">Back </button>
</body>

<?php
include("../../mod/admin_staff/lect_reg.php");
$lec= new Lec_reg();
?>