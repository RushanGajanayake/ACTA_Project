<!--
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/26/14
 * Time: 12:26 AM
 */
 -->
<div class="panel_upper">
    <div class="p0">
        <label class="p1"> Course ></label>
        <label class="p2"> Course Details</label>
    </div>

</div>


    <?php
        require_once("../../conn/db_conn.php");

        $conn = DB_conn::conn();

        $c_id = null;

        if($_POST['search']){
            global $c_id;

            $c_id = $_POST['search'];

            $query = $conn->prepare("SELECT * FROM course WHERE Course_ID= '$c_id'");
            $query->execute();

            $row= $query->fetch(PDO::FETCH_ASSOC);

            $c_name = $row['Name'];
            $c_details = $row['Details'];
            $c_levels = $row['No_of_Levels'];
            $c_dur = $row['Duration'];

    ?>

<div class="panel">
    <div class="panel_bar" >
        <p>Course Details - <?php echo $c_name;?> </p>
    </div>

    <table class="table1">
        <tr class="row1">
            <td class="row_label"><label>Course ID :</label></td>
            <td class="label1" ><input class='input data' type='hidden' name='c_ids' id='c_ids' value='<?php echo $c_id; ?>'><label><?php echo $c_id; ?></label></td>
        </tr>
        <tr class="row2">
            <td class="row_label"><label>Course Name :</label></td>
            <td class="label1"><label><?php echo $c_name; ?></label></td>
        </tr>
        <tr class="row1">
            <td class="row_label"><label>Course Levels :</label></td>
            <td class="label1"><label><?php echo $c_levels; ?></label></td>
        </tr>
        <tr class="row2">
            <td class="row_label"><label>Course Duration :</label></td>
            <td class="label1"><label><?php echo $c_dur." Months"; ?></label></td>
        </tr>
        <tr class="row1">
            <td class="row_label"><label>Course Details :</label></td>
            <td class="label1"><label><?php echo $c_details; ?></label></td>
        </tr>
        <tr>
            <td></td>
            <td><input class="button1" type="button" name="edit" id="edit" value="Edit" onclick="ajaxPost1('/ACTA_project/view/admin_staff/edit_course.php',$('#c_ids'))"></td>
        </tr>

    </table>

    <?php } ?>

    <div class="panel_bar" >
        <p>Subjects Details </p>
    </div>

       <?php


       if($conn!=null){
           $query2 = $conn->prepare("SELECT * FROM subject WHERE  Course_Course_ID ='$c_id' ");
           $query2->execute();



           while($rows= $query2->fetch(PDO::FETCH_ASSOC)){

               $s_id = $rows['Sub_ID'];
               $s_name = $rows['Sub_Name'];
               $s_credits = $rows['Sub_credit'];
               $s_dscrpt = $rows['discription'];
               $ac_id = $rows['Aca_Staff_Ac_ID'];

               ?>
                    <table class="table1">
                        <tr class="row1">
                            <td class="row_label"><label>Subject ID :</label></td>
                            <td class="label1"><input class='input data' type='hidden' name='s_ids' id='s_ids' value='<?php echo $s_id; ?>'><label><?php echo $s_id; ?></label></td>
                        </tr>
                        <tr class="row2">
                            <td class="row_label"><label>Subject Name :</label></td>
                            <td class="label1"><label><?php echo $s_name; ?></label></td>
                        </tr>
                        <tr class="row1">
                            <td class="row_label"><label>Subject Credits :</label></td>
                            <td class="label1"><label><?php echo $s_credits; ?></label></td>
                        </tr>
                        <tr class="row2">
                            <td class="row_label"><label>Subject Details :</label></td>
                            <td class="label1"><label><?php echo $s_dscrpt; ?></label></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input class="button1" type="button" name="edit" id="edit" value="Edit" onclick="ajaxPost1('/ACTA_project/view/admin_staff/edit_subj.php',$('#s_ids'))"></td>
                        </tr>
                    </table>

                <?php

           }

       }

    ?>

    <table class="table1">

        <tr class="blank_row">
            <td></td>
            <td></td>
        </tr>


        <tr class="row1">
            <td class="row_label">Add Subject</td>
            <td ><label class="radio_lble">YES</label><input type="radio" onclick="javascript:checkParent();" name="yesNo" id="yesCheck" value="yesCheck">
                <label class="radio_lble">NO</label><input type="radio" onclick="javascript:checkParent();" name="yesNo" id="noCheck" value="noCheck"></td>
        </tr>

    </table>



    <div id="ifYes" style="display: none">


        <div class="panel_bar" >
            <p>Add New Subject </p>
        </div>

        <form action="/ACTA_project/mod/admin_staff/course_details.php" method="post" id="sub_add">
            <table class="table1">
                <tr class="row1">
                    <td class="row_label">Subject ID</td>
                    <td class="input_data"><input class="input data" type="text" name="s_ID" id="s_ID"></td>
                </tr>
                <tr class="row2">
                    <td class="row_label">Subject Name</td>
                    <td class="input_data"><input class="input data" type="text" name="s_name" id="s_name"></td>
                </tr>
                <tr class="row1">
                    <td class="row_label">Subject Credits</td>
                    <td class="input_data"><input class="input data" type="text" name="s_credit" id="s_credit"></td>
                </tr>
                <tr class="row2">
                    <td class="row_label">Lecturer ID</td>
                    <td class="input_data"><input class="input data" type="text" name="ac_id" id="ac_id"></td> <!--this should be change as when admin id get from admin login session-->
                </tr>
                <tr class="row1">
                    <td class="row_label">Course ID</td>
                    <td class="input_data"><input class="input data" type="text" name="c_id" id="c_id" value='<?php echo $c_id;?>' readonly="readonly"></td> <!--this should be change as when admin id get from admin login session-->
                </tr>
                <tr class="row2">
                    <td class="row_label">Content and Details</td>
                    <td class="input_data"><textarea class="inputArea" name="s_details" id="s_details" rows="10" cols="30"></textarea> </td>
                </tr>
                <tr>
                    <td><input type="hidden" name="verifi" id="verifi" value="0"></td>
                </tr>
                <tr>
                    <td><input class="button1" type="button" name="add_s" id="add_s" value="Add" onclick="ajaxPost('/ACTA_project/mod/admin_staff/sub_add.php',$('#sub_add').serialize()+'&add_s=Add')"></td>
                    <td></td>
                </tr>
            </table>
        </form>

    </div>

    <button  class="button1" onclick="myFunction1('/ACTA_project/view/admin_staff/courses.php')">Back </button>
</div>


<script>
    function checkParent(){
        if(document.getElementById('yesCheck').checked){
            document.getElementById('ifYes').style.display = 'block';
        }
        else document.getElementById('ifYes').style.display = 'none';
    }
</script>