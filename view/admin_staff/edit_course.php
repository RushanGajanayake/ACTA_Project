<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/27/14
 * Time: 1:30 PM
 */

require_once("../../conn/db_conn.php");


if($_POST['search']){

    $c_id= $_POST['search'];

    $conn = DB_conn::conn();


    $query = $conn->prepare("SELECT * FROM course WHERE Course_ID= '$c_id'");
    $query->execute();

    $row= $query->fetch(PDO::FETCH_ASSOC);

    $c_name = $row['Name'];
    $c_details = $row['Details'];
    $c_levels = $row['No_of_Levels'];
    $c_dur = $row['Duration'];
    $a_id = $row['Admin_Staff_Ad_ID'];


?>

    <div class="panel_upper">
        <div class="p0">
            <label class="p1"> Course ></label>
            <label class="p2"> Edit Course</label>
        </div>

    </div>
    <div class="panel">
        <div class="panel_bar" >
            <p>Edit Course </p>
        </div>
        <form action="/ACTA_project/mod/admin_staff/curs_add.php" method="post" id="cours_edit">
            <table class="table1">
                <tr class="row1">
                    <td class="row_label">Course ID*</td>
                    <td class="input_data"><input class="input data"  type="text" name="c_ID" id="c_ID" value="<?php echo $c_id ; ?>"></td>
                </tr>
                <tr class="row2">
                    <td class="row_label">Course Name*</td>
                    <td class="input_data"><input class="input data" type="text" name="c_name" id="c_name" value="<?php echo $c_name;?>"></td>
                </tr >
                <tr class="row2">
                    <td class="row_label">No. of levels*</td>
                    <td class="input_data"><input class="input data" type="text" name="c_level" id="c_level" value="<?php echo $c_levels;?>"></td>
                </tr>
                <tr class="row1">
                    <td class="row_label">Course Duration*</td>
                    <td class="input_data"><input class="input data" type="text" name="c_dura" id="c_dura" value="<?php echo $c_dur;?>"></td>
                </tr>
                <tr class="row2">
                    <td class="row_label">Administrator ID*</td>
                    <td class="input_data"><input class="input data" type="text" name="admin_id" id="admin_id" value="<?php echo $a_id;?>"></td> <!--this should be change as when admin id get from admin login session-->
                </tr>
                <tr class="row1">
                    <td class="row_label">Content and Details*</td>
                    <td class="input_data"><textarea class="inputArea" name="c_details" id="c_details" rows="15" cols="30" ><?php echo $c_details;?></textarea> </td> <!-- words(500) if this rows, cols can be change -->
                    <!--            <td><input type="text_area" name="c_details" id="c_details" style="height: 100px"></td>-->
                </tr>
                <tr>
                    <td><input class="button1" type="button" name="edit_course" id="edit_course" value="Update" onclick="ajaxPost('/ACTA_project/mod/admin_staff/curs_add.php',$('#cours_edit').serialize()+'&edit_course=Update')"></td>
                    <td></td>
                </tr>
            </table>
        </form>
        <button  class="button1" onclick="myFunction1('/ACTA_project/view/admin_staff/courses.php')">Back </button>
    </div>

<?php } ?>