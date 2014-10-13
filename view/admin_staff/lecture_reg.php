<!--
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 8/31/14
 * Time: 11:48 PM
 */
 -->
<div class="panel_upper">
    <div class="p0">
        <label class="p1">Manage Details  ></label>
        <label class="p2">Lecture</label>
    </div>
</div>
<div class="panel" id="panel">
    <div class="panel_bar" >
        <p>Add New Lecturer </p>
    </div>
    <form action='/ACTA_project/mod/admin_staff/lect_reg.php' method="post" id="lect_reg">
        <table class="table1">
            <tr class="row1">
                <td class="row_label">Academic Staff ID*</td>
                <td class="input_data"><input class="input data" type="text" name="ac_ID" id="ac_ID"></td>
            </tr>
            <tr class="row2">
                <td class="row_label">NIC No* </td>
                <td class="input_data"><input class="input data" type="text" name="nic" id="nic"></td>
            </tr>
            <tr class="row1">
                <td class="row_label">Title*</td>
                <td class="input_data"><select name="title" id="title"><option value=" "></option><option value="Mr">Mr</option><option value="Mrs">Mrs</option><option value="Ms">Ms</option>
                    </select>
                </td>

            </tr>
            <tr class="row2">
                <td class="row_label">First Name*</td>
                <td class="input_data"><input class="input data" type="text" name="firstName" id="firstName"></td>
            </tr>
            <tr class="row1">
                <td class="row_label">Surname*</td>
                <td class="input_data"><input class="input data" type="text" name="surname" id="surname"></td>
            </tr>
            <tr class="row2">
                <td class="row_label">Address*</td>
                <td class="input_data"><textarea class="inputArea" name="addr" id="addr" rows="4" cols="20"></textarea></td>
            </tr>
            <tr class="row1">
                <td class="row_label">City*</td>
                <td class="input_data"><input class="input data" type="text" name="city" id="city"></td>
            </tr>
            <tr class="row2">
                <td class="row_label">Postal Code*</td>
                <td class="input_data"><input class="input data" type="text" name="p_code" id="p_code"></td>
            </tr>
            <tr class="row1">
                <td class="row_label">Email*</td>
                <td class="input_data"><input class="input data" type="text" name="email" id="email"></td>
            </tr>
            <tr class="row2">
                <td class="row_label">Telephone No*</td>
                <td class="input_data"><input class="input data" type="text" name="tele_No" id="tele_No"></td>
            </tr>
            <tr class="row1">
                <td class="row_label">Mobile No*</td>
                <td class="input_data"><input class="input data" type="text" name="mob_No" id="mob_No"></td>
            </tr>
            <tr class="row2">
                <td class="row_label">Designation*</td>
                <td class="input_data"><select name="desig" id="desig">
                        <option value=" "></option>
                        <option value="S.Lect 1">Senior Lecture 1</option>
                        <option value="S.Lect 2">Senior Lecture 2</option>
                        <option value="Lect 1">Lecture 1</option>
                        <option value="Lect 2">Lecture 2</option>
                        <option value="Ass. Lect">Assistant Lecture</option>
                    </select></td>
            </tr>
            <tr class="row1">
                <td class="row_label">Enroll Date*</td>
                <td class="input_data"><input class="input data" type="date" name="enroll_date" id="enroll_date"></td>
            </tr>
            <tr>
                <td><input class="button1" type="button" value="Add" name="add" onclick="ajaxPost('/ACTA_project/mod/admin_staff/lect_reg.php',$('#lect_reg').serialize()+'&add=Add')"></td>
                <td></td>
            </tr>

        </table>

    </form>

    <!-- update or delete lect data -->
<!--    <div class="panel_bar" >-->
<!--        <p>Update Student Details </p>-->
<!--    </div>-->
<!--    <form action="/ACTA_project/view/admin_staff/update_form.php" method="post" id="update">-->
<!--        <table class="table1">-->
<!--            <tr class="row1">-->
<!--                <td class="row_label">Lect ID</td>-->
<!--                <td class="input_data">-->
<!--                    <input type="text" class="search" name="search" id="searchid" onclick="autoComplete();"  placeholder="Enter Name or ID" />-->
<!---->
<!--                </td>-->
<!--                <td></td>-->
<!--            </tr>-->
<!--        </table>-->
<!--        <div id="result1"></div>-->
<!--        <table class="table1">-->
<!--            <tr>-->
<!--                <td></td>-->
<!--                <td><input class="button1" type="button" value="Next" name="update" onclick="ajaxPost('/ACTA_project/view/admin_staff/update_form.php',$('#update').serialize()+'&update=Next')"></td>-->
<!--                <td></td>-->
<!--            </tr>-->
<!---->
<!--        </table>-->
<!---->
<!--    </form>-->

<button class="button1" onclick="myFunction1('/ACTA_project/view/admin_staff/manage_details.html')">Back </button>
</div>

<?php
//include("../../mod/admin_staff/lect_reg.php");
//$lec= new Lec_reg();
//?>