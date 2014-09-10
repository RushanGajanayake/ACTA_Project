<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 8/31/14
 * Time: 10:38 PM
 */


    $c= $_SESSION['course'];
    $i=$_SESSION['id'] ;
?>

<body>

<form action='/ACTA_project/mod/admin_staff/stu_reg.php' method='post' enctype="multipart/form-data" id="stu_reg">
    <table class="table1">
        <tr class="row1">
            <td class="row_label">Student ID</td>
            <td class="input_data"><input class="input data" type='text' name='stu_ID' id='stu_ID' value='<?php echo $i;?>'></td>
        </tr>
        <tr class="row2">
            <td class="row_label">NIC No </td>
            <td class="input_data"><input class="input data" type='text' name='nic' id='nic' ></td>
        </tr>
        <tr class="row1">
            <td class="row_label">Title</td>
            <td class="input_data"><select name='title' id='title'><option value=' '></option><option value='Mr'>Mr</option><option value='Mrs'>Mrs</option><option value='Ms'>Ms</option>
                </select>
            </td>

        </tr>
        <tr class="row2">
            <td class="row_label">First Name</td>
            <td class="input_data"><input class="input data" type='text' name='firstName' id='firstName'></td>
        </tr>
        <tr class="row1">
            <td class="row_label">Surname</td>
            <td class="input_data"><input class="input data" class="input data" type='text' name='surname' id='surname'></td>
        </tr>
        <tr class="row2">
            <td class="row_label">Date of Birth</td>
            <td class="input_data"><input class="inputSmall data" type='text' name='dob_date' id='dob_date' placeholder="Date" ><input class="inputSmall data" type='text' name='dob_month' id='dob_month' placeholder="Month"><input class="inputSmall data" type='text' name='dob_year' id='dob_year' placeholder="Year" style="width: 83px"></td>
        </tr>
        <tr class="row1">
            <td class="row_label">Address</td>
            <td class="input_data"><textarea class="inputArea" name="addr" id="addr" rows="4" cols="20"></textarea></td>
        </tr>
        <tr class="row2">
            <td class="row_label">City</td>
            <td class="input_data"><input class="input data" type='text' name='city' id='city'></td>
        </tr>
        <tr class="row1">
            <td class="row_label">Postal Code</td>
            <td class="input_data"><input class="input data" type='text' name='p_code' id='p_code'></td>
        </tr>
        <tr class="row2">
            <td class="row_label">Email</td>
            <td class="input_data"><input class="input data" type='text' name='email' id='email'></td>
        </tr>
        <tr class="row1">
            <td class="row_label">Telephone No</td>
            <td class="input_data"><input class="input data" type='text' name='tele_No' id='tele_No'></td>
        </tr>
        <tr class="row2">
            <td class="row_label">Mobile No</td>
            <td class="input_data"><input class="input data" type='text' name='mob_No' id='mob_No'></td>
        </tr>
        <tr class="row1">
            <td class="row_label">Company Name</td>
            <td class="input_data"><input class="input data" type='text' name='cmp_name' id='cmp_name'></td>
        </tr>
        <tr class="row2">
            <td class="row_label">Company Address</td>
            <td class="input_data"><input class="input data" type='text' name='cmp_add' id='cmp_add'></td>
        </tr>
        <tr class="row1">
            <td class="row_label">Company Tele No</td>
            <td class="input_data"><input class="input data" type='text' name='cmp_No' id='cmp_No'></td>
        </tr>
        <tr class="row2">
            <td class="row_label">Registered Date</td>
            <td class="input_data"><input class="input data" type='date' name='reg_date' id='reg_date'></td>
        </tr>
        <tr class="row1">
            <td class="row_label">Course ID</td>
            <td class="input_data"><input class="input data" type='text' name='c_ID' id='c_ID' value='<?php echo $c;?>'></td>
        </tr>
<!--        <tr>-->
<!--            <td>Profile Picture</td>-->
<!--            <td><input type='file' name='pic' id='pic'></td>-->
<!--        </tr>-->
        <tr>
            <td></td>
            <td><input type='button' value='Add' name='add1' onclick="ajaxPost('/ACTA_project/mod/admin_staff/stu_reg.php',$('#stu_reg').serialize()+'&add1=Add')" ></td>
<!--            <td><button><a href='../../view/admin_staff/parent_reg.php'>Add Parent</a></button></td>-->
            <td><input  type='button' value='Parent' name='add1' onclick="ajaxPost('/ACTA_project/view/admin_staff/parent_reg.php',$('#stu_reg').serialize()+'&add1=Parent')" ></td>

        </tr>

    </table>
</form>
<button class="button1"  onclick="myFunction('/ACTA_project/view/admin_staff/stu_check.php')">Back </button>
</body>
