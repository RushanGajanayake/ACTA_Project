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
<html>



<div class="panel_upper">
    <div class="p0">
        <label class="p1">Manage Details  ></label>
        <label class="p2"> Student  >  New Student</label>
    </div>

    <!--    <p class="p1"> Manage Details</p>-->
    <!--    <p class="p2"> >  Student  >  New Student </p>-->
</div>

<div class="panel" id="panel">
    <div class="panel_bar" >
        <p>Add New Student </p>
    </div>

    <form action='/ACTA_project/mod/admin_staff/stu_reg.php' method='post' enctype="multipart/form-data" id="stu_reg">
        <table class="table1">
            <tr class="row1">
                <td class="row_label">Student ID</td>
                <td class="input_data"><input class="input data" type='text' name='stu_ID' id='stu_ID' value='<?php echo $i;?>'></td>
            </tr>
            <tr class="row2">
                <td class="row_label">NIC No*</td>
                <td class="input_data"><input class="input data" type='text' name='nic' id='nic' ></td>
            </tr>
            <tr class="row1">
                <td class="row_label">Title* </td>
                <td class="input_data"><select name='title' id='title'><option value=' '></option><option value='Mr'>Mr</option><option value='Mrs'>Mrs</option><option value='Ms'>Ms</option>
                    </select>
                </td>

            </tr>
            <tr class="row2">
                <td class="row_label">First Name*</td>
                <td class="input_data"><input class="input data" type='text' name='firstName' id='firstName'></td>
            </tr>
            <tr class="row1">
                <td class="row_label">Surname*</td>
                <td class="input_data"><input class="input data" class="input data" type='text' name='surname' id='surname'></td>
            </tr>
            <tr class="row1">
                <td class="row_label">Address*</td>
                <td class="input_data"><textarea class="inputArea" name="addr" id="addr" rows="4" cols="20"></textarea></td>
            </tr>
            <tr class="row2">
                <td class="row_label">City*</td>
                <td class="input_data"><input class="input data" type='text' name='city' id='city'></td>
            </tr>
            <tr class="row1">
                <td class="row_label">Postal Code*</td>
                <td class="input_data"><input class="input data" type='text' name='p_code' id='p_code'></td>
            </tr>
            <tr class="row2">
                <td class="row_label">Email*</td>
                <td class="input_data"><input class="input data" type='text' name='email' id='email'></td>
            </tr>
            <tr class="row1">
                <td class="row_label">Telephone No*</td>
                <td class="input_data"><input class="input data" type='text' name='tele_No' id='tele_No'></td>
            </tr>
            <tr class="row2">
                <td class="row_label">Mobile No*</td>
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
                <td class="row_label">Registered Date*</td>
                <td class="input_data"><input class="input data" type='date' name='reg_date' id='reg_date'></td>
            </tr>
            <tr class="row1">
                <td class="row_label">Course ID</td>
                <td class="input_data"><input class="input data" type='text' name='c_ID' id='c_ID' value='<?php echo $c;?>' readonly="readonly" ></td>
            </tr>
            <!--        <tr>-->
            <!--            <td>Profile Picture</td>-->
            <!--            <td><input type='file' name='pic' id='pic'></td>-->
            <!--        </tr>-->
            <tr class="blank_row">
                <td></td>
                <td></td>
            </tr>




            <tr class="row1">
                <td class="row_label">Add Parent</td>
                <td ><label class="radio_lble">YES</label><input type="radio" onclick="javascript:checkParent();" name="yesNo" id="yesCheck" value="yesCheck">
                    <label class="radio_lble">NO</label><input type="radio" onclick="javascript:checkParent();" name="yesNo" id="noCheck" value="noCheck"></td>
            </tr>
        </table>


        <div id="ifYes" style="display: none">
            <div class="panel_bar" >
                <p>Add Parent </p>
            </div>

            <table class="table1">
                <tr class="row2">
                    <td class="row_label">NIC No* </td>
                    <td class="input_data"><input class="input data" type="text" name="nicP" id="nicP"></td>
                </tr>
                <tr class="row1">
                    <td class="row_label">Title*</td>
                    <td class="input_data"><select name="titleP" id="titleP"><option value=" "></option><option value="Mr">Mr</option><option value="Mrs">Mrs</option><option value="Ms">Ms</option>
                        </select>
                    </td>

                </tr>
                <tr class="row2">
                    <td class="row_label">First Name*</td>
                    <td class="input_data"><input class="input data" type="text" name="firstNameP" id="firstNameP"></td>
                </tr>
                <tr class="row1">
                    <td class="row_label">Surname*</td>
                    <td class="input_data"><input class="input data" type="text" name="surnameP" id="surnameP"></td>
                </tr>
                <tr class="row2">
                    <td class="row_label">Address*</td>
                    <td class="input_data"><input class="input data" type="text" name="addrP" id="addrP"></td>
                </tr>
                <tr class="row1">
                    <td class="row_label">City*</td>
                    <td class="input_data"><input class="input data" type="text" name="cityP" id="cityP"></td>
                </tr>
                <tr class="row2">
                    <td class="row_label">Postal Code*</td>
                    <td class="input_data"><input class="input data" type="text" name="p_codeP" id="p_codeP"></td>
                </tr>
                <tr class="row1">
                    <td class="row_label">Email*</td>
                    <td class="input_data"><input class="input data" type="text" name="emailP" id="emailP"></td>
                </tr>
                <tr class="row2">
                    <td class="row_label">Telephone No*</td>
                    <td class="input_data"><input class="input data" type="text" name="tele_NoP" id="tele_NoP"></td>
                </tr>
                <tr class="row1">
                    <td class="row_label">Mobile No*</td>
                    <td class="input_data"><input class="input data" type="text" name="mob_NoP" id="mob_NoP"></td>
                </tr>

            </table>

        </div>


        <table class="table1">

            <tr>
                <td></td>
                <td><input class="button1" type='button' value='Add' name='add1' onclick="ajaxPost('/ACTA_project/mod/admin_staff/stu_reg.php',$('#stu_reg').serialize()+'&add1=Add')" ></td>
                <!--            <td><button><a href='../../view/admin_staff/parent_reg.php'>Add Parent</a></button></td>-->
                <!--                <td><input class="button1"  type='button' value='Parent' name='add1' onclick="ajaxPost('/ACTA_project/view/admin_staff/parent_reg.php',$('#stu_reg').serialize()+'&add1=Parent')" ></td>-->

            </tr>

        </table>


    </form>

    <button class="button1"  onclick="myFunction1('/ACTA_project/view/admin_staff/stu_check.php')">Back </button>

    <script>
        function checkParent(){
            if(document.getElementById('yesCheck').checked){
                document.getElementById('ifYes').style.display = 'block';
            }
            else document.getElementById('ifYes').style.display = 'none';
        }
    </script>

</div>



</html>

