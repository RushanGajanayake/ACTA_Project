<!--
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 9/15/14
 * Time: 6:39 PM
 */
 -->

<?php

require_once("../../conn/db_conn.php");
session_start();

$nic = $_SESSION['p_nic'];
$db = DB_conn::conn();
$quary = $db->prepare('SELECT * FROM admin_staff WHERE Person_NIC=:u_nic');
$quary->bindValue(':u_nic',$nic,PDO::PARAM_STR);
$quary->execute();

$data = $quary->fetchObject();
$p_id = $data->Ad_ID;


?>
<html>
<div class="panel_upper">
    <div class="p0">
        <label class="p1"> Course ></label>
        <label class="p2"> Add Course</label>
    </div>

</div>

<div class="panel">
    <div class="panel_body">
    <div class="panel_bar" >
        <p>Add New Course </p>
    </div>
    <div class="panel_body_cont">
    <form name="course_add" action="/ACTA_project/mod/admin_staff/curs_add.php" method="post" id="cours_add" >
        <table class="table1">
            <tr class="row1">
                <td class="row_label">Course ID*</td>
                <td class="input_data"><input class="input data"  type="text" name="c_ID" id="c_ID" ></td>
                <td class="error_msg" id="c_ID_e"></td>
            </tr>
            <tr class="row2">
                <td class="row_label">Course Name*</td>
                <td class="input_data"><input class="input data" type="text" name="c_name" id="c_name"></td>
                <td class="error_msg" id="c_name_e"></td>
            </tr >
            <tr class="row2">
                <td class="row_label">No. of levels*</td>
                <td class="input_data"><input class="input data" type="text" name="c_level" id="c_level"></td>
                <td class="error_msg" id="c_level_e"></td>
            </tr>
            <tr class="row1">
                <td class="row_label">Course Duration*</td>
                <td class="input_data"><div class="input_data_div"><input class="input_date" type="text" name="c_yr" id="c_yr" placeholder="Years">                            <div class="input_data_div">
                            <select class="input_date"  name="c_months" id="c_months">
                                <option value="">Months</option>
                                <option value="00">00</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select></div></td>
                <td class="error_msg" id="c_months_e"></td>
            </tr>
            <tr class="row2">
                <td class="row_label">Administrator ID</td>
                <td class="input_data"><input class="input data" type="text" name="admin_id" id="admin_id" value="<?php echo$p_id;?>" readonly="readonly"></td> <!--this should be change as when admin id get from admin login session-->
            </tr>
        </table>
        <table class="table2">
            <tr class="row1">
                <td class="row_label">Content and Details*</td>
                <td class="input_textarea"><textarea class="input" name="c_details" id="c_details" rows="15" cols="30"></textarea> </td> <!-- words(500) if this rows, cols can be change -->
                <td class="error_msg" id="c_details_e"></td>
            </tr>
        </table>
        <table class="table1">
            <tr>
                <td><input class="button1" type="button" name="add_c" id="add_c" value="Next" onclick="javascript:checkEmpty_course();" ></td><!--<input class="input_date" type="text" name="c_months" id="c_months" placeholder="Months">-->
                <td></td>

            </tr>
        </table>
    </form>
    </div>


    </div>
    <table class="table1">
        <tr >
            <td><button  class="button1" onclick="myFunction1('/ACTA_project/view/admin_staff/courses.php')">Back </button></td>
            <td></td>
        </tr>
    </table>
</div>

</html>