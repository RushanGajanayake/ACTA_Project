<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/27/14
 * Time: 8:12 PM
 */

require_once("../../conn/db_conn.php");


if($_POST['search']){

    $s_id= $_POST['search'];

    $conn = DB_conn::conn();


    $query = $conn->prepare("SELECT * FROM subject WHERE Sub_ID= '$s_id'");
    $query->execute();

    $row= $query->fetch(PDO::FETCH_ASSOC);

    $s_name = $row['Sub_Name'];
    $s_credit = $row['Sub_credit'];
    $s_dis = $row['discription'];
    $c_id = $row['Course_Course_ID'];
    $ac_id = $row['Aca_Staff_Ac_ID'];


    ?>

    <div class="panel_upper">
        <div class="p0">
            <label class="p1"> Course ></label>
            <label class="p2"> Edit Subject</label>
        </div>

    </div>
    <div class="panel">
        <div class="panel_bar" >
            <p>Edit Subject </p>
        </div>
        <form action="/ACTA_project/mod/admin_staff/sub_add.php" method="post" id="subj_edit">
            <table class="table1">
                <tr class="row1">
                    <td class="row_label">Subject ID*</td>
                    <td class="input_data"><input class="input data"  type="text" name="s_ID" id="s_ID" value="<?php echo $s_id ; ?>"></td>
                </tr>
                <tr class="row2">
                    <td class="row_label">Subject Name*</td>
                    <td class="input_data"><input class="input data" type="text" name="s_name" id="s_name" value="<?php echo $s_name;?>"></td>
                </tr >
                <tr class="row1">
                    <td class="row_label">Subject Credits*</td>
                    <td class="input_data"><input class="input data" type="text" name="s_credit" id="s_credit" value="<?php echo $s_credit;?>"></td>
                </tr>
                <tr class="row2">
                    <td class="row_label">Lecturer ID*</td>
                    <td class="input_data"><input class="input data" type="text" name="ac_id" id="ac_id" value="<?php echo $ac_id;?>"></td>
                </tr>
                <tr class="row1">
                    <td class="row_label">Course ID*</td>
                    <td class="input_data"><input class="input data" type="text" name="c_id" id="c_id" value="<?php echo $c_id;?>"></td> <!--this should be change as when admin id get from admin login session-->
                </tr>
                <tr class="row2">
                    <td class="row_label">Content and Details*</td>
                    <td class="input_data"><textarea class="inputArea" name="s_details" id="s_details" rows="15" cols="30" ><?php echo $s_dis;?></textarea> </td> <!-- words(500) if this rows, cols can be change -->
                    <!--            <td><input type="text_area" name="c_details" id="c_details" style="height: 100px"></td>-->
                </tr>
                <tr>
                    <td><input class="button1" type="button" name="edit_sub" id="edit_sub" value="Update" onclick="ajaxPost('/ACTA_project/mod/admin_staff/sub_add.php',$('#subj_edit').serialize()+'&edit_sub=Update')"></td>
                    <td></td>
                </tr>
            </table>
        </form>
        <button  class="button1" onclick="myFunction1('/ACTA_project/view/admin_staff/courses.php')">Back </button>
    </div>

<?php } ?>