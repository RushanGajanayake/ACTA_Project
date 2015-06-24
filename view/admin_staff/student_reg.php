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
</div>

<div class="panel" id="panel">
    <div class="panel_body">
        <div class="panel_bar" >
            <p>Add New Student </p>
        </div>
        <div class="panel_body_cont">
            <form action='/ACTA_project/mod/admin_staff/stu_reg.php' method='post' enctype="multipart/form-data" id="stu_reg" name="stu_reg">
                <table class="table1">
                    <tr class="row1">
                        <td class="row_label">Student ID</td>  <!-- student registration form-->
                        <td class="input_data"><input class="input data" type='text' name='stu_ID' id='stu_ID' value='<?php echo $i;?>' ></td>
                        <td class="error_msg" id="stu_ID_e"></td>
                    </tr>
                    <tr class="row2">
                        <td class="row_label">NIC No*</td>
                        <td class="input_data"><input class="input data" type='text' name='nic' id='nic' ></td>
                        <td class="error_msg" id="nic_e"></td>
                    </tr>
                    <tr class="row1">
                        <td class="row_label">Title* </td>
                        <td class="input_data"><select class="input data" name='title' id='title'><option value=''></option><option value='Mr'>Mr</option><option value='Mrs'>Mrs</option><option value='Ms'>Ms</option>
                            </select>
                        </td>
                        <td class="error_msg" id="title_e"></td>

                    </tr>
                    <tr class="row2">
                        <td class="row_label">First Name*</td>
                        <td class="input_data"><input class="input data" type='text' name='firstName' id='firstName'></td>
                        <td class="error_msg" id="firstName_e"></td>
                    </tr>
                    <tr class="row1">
                        <td class="row_label">Surname*</td>
                        <td class="input_data"><input class="input data" class="input data" type='text' name='surname' id='surname'></td>
                        <td class="error_msg" id="surname_e"></td>
                    </tr>
                    <tr class="row1">
                        <td class="row_label">Address*</td>
                        <td class="input_data1"><textarea class="input" name="addr" id="addr" rows="4" cols="20"></textarea></td>
                        <td class="error_msg" id="addr_e"></td>
                    </tr>
                    <tr class="row2">
                        <td class="row_label">City*</td>
                        <td class="input_data"><input class="input data" type='text' name='city' id='city'></td>
                        <td class="error_msg" id="city_e"></td>
                    </tr>
                    <tr class="row1">
                        <td class="row_label">Postal Code*</td>
                        <td class="input_data"><input class="input data" type='text' name='p_code' id='p_code'></td>
                        <td class="error_msg" id="p_code_e"></td>
                    </tr>
                    <tr class="row2">
                        <td class="row_label">Email*</td>
                        <td class="input_data"><input class="input data" type='text' name='email' id='email'></td>
                        <td class="error_msg" id="email_e"></td>
                    </tr>
                    <tr class="row1">
                        <td class="row_label">Telephone No*</td>
                        <td class="input_data"><input class="input data" type='text' name='tele_No' id='tele_No'></td>
                        <td class="error_msg" id="tele_No_e"></td>
                    </tr>
                    <tr class="row2">
                        <td class="row_label">Mobile No*</td>
                        <td class="input_data"><input class="input data" type='text' name='mob_No' id='mob_No'></td>
                        <td class="error_msg" id="mob_No_e"></td>
                    </tr>
                    <tr class="row1">
                        <td class="row_label">Company Name</td>
                        <td class="input_data"><input class="input data" type='text' name='cmp_name' id='cmp_name'></td>
                        <td class="error_msg" id="cmp_name_e"></td>
                    </tr>
                    <tr class="row2">
                        <td class="row_label">Company Address</td>
                        <td class="input_data"><input class="input data" type='text' name='cmp_add' id='cmp_add'></td>
                        <td class="error_msg" id="cmp_add_e"></td>
                    </tr>
                    <tr class="row1">
                        <td class="row_label">Company Tele No</td>
                        <td class="input_data"><input class="input data" type='text' name='cmp_No' id='cmp_No'></td>
                        <td class="error_msg" id="cmp_No_e"></td>
                    </tr>
                    <tr class="row2">
                        <td class="row_label">Registered Date*</td>
                        <td class="input_data"><input class="input data" type='date' name='reg_date' id='reg_date'></td>
                        <td class="error_msg" id="reg_date_e"></td>
                    </tr>
                    <tr class="row1">
                        <td class="row_label">Course ID</td>
                        <td class="input_data"><input class="input data" type='text' name='c_ID' id='c_ID' value='<?php echo $c;?>' readonly="readonly" ></td>
                        <td class="error_msg" id="c_ID"></td>
                    </tr>
                    <!--        <tr>-->
                    <!--            <td>Profile Picture</td>-->
                    <!--            <td><input type='file' name='pic' id='pic'></td>-->
                    <!--        </tr>-->
                    <tr class="blank_row">
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>




                    <tr class="row1">
                        <td class="row_label">Add Parent*</td>   <!-- parent registration form-->
                        <td ><label class="radio_lble">YES</label><input type="radio" onclick="javascript:checkParent();" name="yesNo" id="yesCheck" value="yesCheck">
                            <label class="radio_lble">NO</label><input type="radio" onclick="javascript:checkParent();" name="yesNo" id="noCheck" value="noCheck"></td>
                        <td class="error_msg" id="checking"></td>
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
                            <td class="error_msg" id="nicP_e"></td>
                        </tr>
                        <tr class="row1">
                            <td class="row_label">Title*</td>
                            <td class="input_data"><select class="input data" name="titleP" id="titleP"><option value=""></option><option value="Mr">Mr</option><option value="Mrs">Mrs</option><option value="Ms">Ms</option>
                                </select>
                            </td>
                            <td class="error_msg" id="titleP_e"></td>

                        </tr>
                        <tr class="row2">
                            <td class="row_label">First Name*</td>
                            <td class="input_data"><input class="input data" type="text" name="firstNameP" id="firstNameP"></td>
                            <td class="error_msg" id="firstNameP_e"></td>
                        </tr>
                        <tr class="row1">
                            <td class="row_label">Surname*</td>
                            <td class="input_data"><input class="input data" type="text" name="surnameP" id="surnameP"></td>
                            <td class="error_msg" id="surnameP_e"></td>
                        </tr>
                        <tr class="row2">
                            <td class="row_label">Address*</td>
                            <td class="input_data1"><input class="input" type="text" name="addrP" id="addrP"></td>
                            <td class="error_msg" id="addrP_e"></td>
                        </tr>
                        <tr class="row1">
                            <td class="row_label">City*</td>
                            <td class="input_data"><input class="input data" type="text" name="cityP" id="cityP"></td>
                            <td class="error_msg" id="cityP_e"></td>
                        </tr>
                        <tr class="row2">
                            <td class="row_label">Postal Code*</td>
                            <td class="input_data"><input class="input data" type="text" name="p_codeP" id="p_codeP"></td>
                            <td class="error_msg" id="p_codeP_e"></td>
                        </tr>
                        <tr class="row1">
                            <td class="row_label">Email*</td>
                            <td class="input_data"><input class="input data" type="text" name="emailP" id="emailP"></td>
                            <td class="error_msg" id="emailP_e"></td>
                        </tr>
                        <tr class="row2">
                            <td class="row_label">Telephone No*</td>
                            <td class="input_data"><input class="input data" type="text" name="tele_NoP" id="tele_NoP"></td>
                            <td class="error_msg" id="tele_NoP_e"></td>
                        </tr>
                        <tr class="row1">
                            <td class="row_label">Mobile No*</td>
                            <td class="input_data"><input class="input data" type="text" name="mob_NoP" id="mob_NoP"></td>
                            <td class="error_msg" id="mob_NoP_e"></td>
                        </tr>

                    </table>

                </div>


                <table class="table1">

                    <tr>
                        <td></td>
                        <td><input class="button1" type='button' value='Add' name='add1' onclick="javascript:checkEmpty();" ></td>

                    </tr>

                </table>


            </form>
        </div>
    </div>

    <table class="table1">
        <tr>
            <td><button class="button1"  onclick="myFunction1('/ACTA_project/view/admin_staff/stu_check.php')">Back </button>
        </tr>
    </table>


    <script>
        function checkParent(){ //checking the parent will add or no
            if(document.getElementById('yesCheck').checked){
                document.getElementById('ifYes').style.display = 'block';
            }
            else document.getElementById('ifYes').style.display = 'none';
        }

        function checkEmpty(){   //checking the validations of student registration form

            var z = ["stu_ID",'nic','title','firstName','surname',"addr",'city','p_code','email','tele_No','mob_No','reg_date',"nicP","titleP","firstNameP","surnameP","addrP","cityP","p_codeP","emailP","tele_NoP","mob_NoP"];
            var z_e = ["stu_ID_e",'nic_e','title_e','firstName_e','surname_e',"addr_e",'city_e','p_code_e','email_e','tele_No_e','mob_No_e','reg_date_e',"nicP_e","titleP_e","firstNameP_e","surnameP_e","addrP_e","cityP_e","p_codeP_e","emailP_e","tele_NoP_e","mob_NoP_e"];

            var count = 0;
            var z_count = 12;

            if(document.getElementById('yesCheck').checked){ // if parent add then check the parent reg form validation
                z_count= 22;
            }

            for(i=0;i<z_count;i++){
                count++;
                var y = document.getElementById(z[i]).value;
                if(y==null||y==""||y==" "){ //check the null values
                    document.getElementById(z[i]).className = 'input_error';
                    document.getElementById(z_e[i]).innerHTML = '*field is required';

                }
                else if(i==0){  //check the Student ID length is correct or no
                    var f0 = document.getElementById(z[i]).value;
                    if(f0.toString().length==19){
                        document.getElementById(z[i]).className = 'input';
                        document.getElementById(z_e[i]).innerHTML = '';
                        count--;
                    }
                    else{
                        document.getElementById(z[i]).className = 'input_error';
                        document.getElementById(z_e[i]).innerHTML = '*enter correct Student Id';
                    }
                }
                else if(i==1||i==12){
                    var f2 = document.getElementById(z[i]).value;   //checking the Student and parent NIC no. validation
                    if((isNaN(f2)) && (f2.length==10)){
                        idarray = f2.split(/[0-9]+/);   //check the NIC has int characters
                        if(idarray.length==2 && (idarray[1]=='x'||idarray[1]=='v'||idarray[1]=='X'||idarray[1]=='V')){   //check the NIC string characteris correct
                            document.getElementById(z[i]).className = 'input';
                            document.getElementById(z_e[i]).innerHTML = '';
                            count--;
                        }else{
                            document.getElementById(z[i]).className = 'input_error';
                            document.getElementById(z_e[i]).innerHTML = '*enter correct NIC number';
                        }
                    }
                    else{
                        document.getElementById(z[i]).className = 'input_error';
                        document.getElementById(z_e[i]).innerHTML = '*enter correct NIC number';
                    }
                }
                //check the correctness of email address
                else if(i==8 || i==19){
                    var f3 = document.getElementById(z[i]).value;
                    if((f3.indexOf('@')!== -1) && (f3.indexOf('.')!== -1) ){
                        emailarray = f3.split("@");
                        var f4 = emailarray[1];    //get the tail part of email address
                        domainarray = f4.split(".");

                        if(f4.length>=5 && domainarray.length==2 && domainarray[0].length>=2 ){   //check the correctness of domain
                            document.getElementById(z[i]).className = 'input';
                            document.getElementById(z_e[i]).innerHTML = '';
                            count--;

                        }else{
                            document.getElementById(z[i]).className = 'input_error';
                            document.getElementById(z_e[i]).innerHTML = '*enter correct email address';

                        }


                    }else{
                        document.getElementById(z[i]).className = 'input_error';
                        document.getElementById(z_e[i]).innerHTML = '*enter correct email address';
                    }
                }
                else if(i==9||i==10||i==20||i==21){    //check the phone no length are correct
                    var f1 = document.getElementById(z[i]).value;
                    if(isNaN(f1)){
                        document.getElementById(z[i]).className = 'input_error';
                        document.getElementById(z_e[i]).innerHTML = '*enter correct number';
                    }
                    else if(f1.toString().length!=10){
                        document.getElementById(z[i]).className = 'input_error';
                        document.getElementById(z_e[i]).innerHTML = '*enter correct number';
                    }
                    else{
                        document.getElementById(z[i]).className = 'input';
                        document.getElementById(z_e[i]).innerHTML = '';
                        count--;
                    }

                }
                else{  // if there are no errors
                     document.getElementById(z[i]).className = 'input';
                     document.getElementById(z_e[i]).innerHTML = '';
                     count--;
                }


            }
            if(count==0){
                ajaxPost('/ACTA_project/mod/admin_staff/stu_reg.php',$('#stu_reg').serialize()+'&add1=Add');
            }

        }
    </script>

</div>



</html>

