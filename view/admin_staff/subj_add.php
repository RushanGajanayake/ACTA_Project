<!--
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 9/15/14
 * Time: 11:02 PM
 */
 -->
<?php
    if($_POST['search']){
       $c_id = $_POST['search'];

?>
<div class="panel_upper">
    <div class="p0">
        <label class="p1"> Course ></label>
        <label class="p2">Add Course > Add Subject</label>
    </div>

</div>
<div class="panel">
    <div class="panel_body">
        <div class="panel_bar" >
            <p>Add Subject </p>
        </div>
        <div class="panel_body_cont">
            <form action="/ACTA_project/mod/admin_staff/sub_add.php" method="post" id="sub_add">
                <table class="table1">
                    <tr class="row1">
                        <td class="row_label">Subject ID*</td>
                        <td class="input_data"><input class="input data" type="text" name="s_ID" id="s_ID"></td>
                        <td class="error_msg" id="s_ID_e"></td>
                    </tr>
                    <tr class="row2">
                        <td class="row_label">Subject Name*</td>
                        <td class="input_data"><input class="input data" type="text" name="s_name" id="s_name"></td>
                        <td class="error_msg" id="s_name_e"></td>
                    </tr>
                    <tr class="row1">
                        <td class="row_label">Subject Credits*</td>
                        <td class="input_data"><input class="input data" type="text" name="s_credit" id="s_credit"></td>
                        <td class="error_msg" id="s_credit_e"></td>
                    </tr>
                    <tr class="row2">
                        <td class="row_label">Lecturer ID*</td>
                        <td class="input_data"><input class="input data" type="text" name="ac_id" id="ac_id"></td> <!--this should be change as when admin id get from admin login session-->
                        <td class="error_msg" id="ac_id_e"></td>
                    </tr>
                    <tr class="row1">
                        <td class="row_label">Course ID</td>
                        <td class="input_data"><input class="input data" type="text" name="c_id" id="c_id" value='<?php echo $c_id; } ?>' readonly="readonly"></td> <!--this should be change as when admin id get from admin login session-->
                    </tr>
                </table>
                <table class="table2">
                    <tr class="row2">
                        <td class="row_label">Content and Details</td>
                        <td class="input_textarea"><textarea class="input" name="s_details" id="s_details" rows="10" cols="30"></textarea> </td>
                        <td class="error_msg" id="s_details_e"></td>
                    </tr>
                </table>
                <table class="table1">
                    <tr>
                        <td><input type="hidden" name="verifi" id="verifi" value="1"></td>
                    </tr>
                    <tr>
                        <td><input class="button1" type="button" name="add_s" id="add_s" value="Add" onclick="javascript:checkEmpty_subj();"></td>
<!--                        <td><input class="button1" type="button" name="add_s" id="add_s" value="Add" onclick="ajaxPost('/ACTA_project/mod/admin_staff/sub_add.php',$('#sub_add').serialize()+'&add_s=Add')"></td>-->
                        <td></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <table class="table1">
        <tr >
            <td><button class="button1" onclick="myFunction1('/ACTA_project/view/admin_staff/courses.php')">Back </button></td>
            <td></td>
        </tr>
    </table>

    <script>
        function checkEmpty_subj(){

            var z = ["s_ID",'s_name','s_credit','ac_id','s_details'];
            var z_e = ["s_ID_e",'s_name_e','s_credit_e','ac_id_e','s_details_e'];

            var count = 0;
            var z_count = 5;


            for(i=0;i<z_count;i++){
                count++;
                var y = document.getElementById(z[i]).value;
                if(y==null||y==""||y==" "){
                    document.getElementById(z[i]).className = 'input_error';
                    document.getElementById(z_e[i]).innerHTML = '*field is required';

                }
                else{
                    document.getElementById(z[i]).className = 'input';
                    document.getElementById(z_e[i]).innerHTML = '';
                    count--;
                }


            }
            if(count==0){
                ajaxPost('/ACTA_project/mod/admin_staff/sub_add.php',$('#sub_add').serialize()+'&add_s=Add');
            }

        }

    </script>


</div>