<!--
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 9/7/14
 * Time: 12:52 AM
 */
 -->
<body>

<form action="<?php $_PHP_SELF ?>" method="post">
    <table class="table1">
        <tr class="row1">
            <td class="row_label">Student ID</td>
            <td class="input_data"><input class="input data" type="text" name="ps_ID" id="ps_ID"></td>
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
            <td class="input_data"><input class="input data" type="text" name="addr" id="addr"></td>
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
        <tr>
            <td></td>
            <td><input type="submit" value="Add" name="add"></td>
        </tr>

    </table>
</form>
<!--<button class="back" onclick="myFunction('/ACTA_project/view/admin_staff/student_reg.php')">Back </button>-->
</body>

<?php

require_once("../../mod/admin_staff/pare_reg.php");
$parent = new Parent_reg();

?>