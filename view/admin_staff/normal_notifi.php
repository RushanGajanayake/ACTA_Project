<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 1/15/15
 * Time: 11:23 PM
 */

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

<div class="panel_upper">
    <div class="p0">
        <label class="p1">Manage Details  ></label>
        <label class="p2">Notifications > New Notification</label>
    </div>

</div>
<div class="panel" id="panel">
    <div class="panel_body">
        <div class="panel_bar" >
            <p>Create New Notification</p>
        </div>
        <div class="panel_body_cont">
            <form action="/ACTA_project/mod/admin_staff/notification.php" method="post" id="notifi">
                <table class="table1">
                    <tr class="row1">
                        <td class="row_label">Administrator ID</td>
                        <td class="input_data"><input class="input data" type="text" name="admin_ID" id="admin_ID" value="<?php echo$p_id;?>" readonly="readonly"></td>
                        <td class="error_msg" id="admin_e"></td>
                    </tr>
                    <tr class="row2">
                        <td class="row_label">Date</td>
                        <td class="input_data"><input class="input data" type="date" name="n_date" id="n_date" value="<?php echo date("Y-m-d");?>" readonly="readonly"></td>
                        <td class="error_msg" id="n_date_e"></td>
                    </tr>
                    <tr class="row1">
                        <td class="row_label">Select Viewers</td>
                        <td class="input_data">
                            <select class="input data" id="viewer1" name="viewer1">
                                <option value=" "></option>
                                <option value="2">Student</option>
                                <option value="3">Academic Staff</option>
                                <option value="4">Parents</option>
                                <option value="5">All </option>
                            </select>
                        </td>
                        <td class="error_msg" id="viewer1_e"></td>
                    </tr>
                    <tr class="row2">
                        <td></td>
                        <td class="input_data">
                            <select class="input data" id="viewer" name="viewer2">
                                <option value=" "></option>
                                <option value="2">Student</option>
                                <option value="3">Academic Staff</option>
                                <option value="4">Parents</option>
                                <option value="5">All </option>
                            </select>
                        </td>

                    </tr>
                </table>
                <table class="table2">
                    <tr class="row1">
                        <td class="row_label">Subject</td>
                        <td class="input_data"><input class="input data" type="text" name="n_subject" id="n_subject" ></td>
                        <td class="error_msg" id="n_subject_e"></td>
                    </tr>
                    <tr class="row2">
                        <td class="row_label">Description</td>
                        <td class="input_textarea"><textarea class="input" type="date" name="n_desc" id="n_desc" rows="15" cols="30"></textarea> </td>
                        <td class="error_msg" id="n_desc_e"></td>
                    </tr>
                </table>
                <table class="table1">
                    <tr>
                        <td><input class="button1" type='button' value='Send' name='send_n' onclick="javascript:checkEmpty_notifi();" ></td>
                        <!--                        <td><input class="button1" type="button" value="Send" name="send_n" onclick="ajaxPost('/ACTA_project/mod/admin_staff/notification.php',$('#notifi').serialize()+'&send_n=Send')"></td>-->
                        <td></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <table class="table1">
        <tr >
            <td><button class="button1" onclick="myFunction1('/ACTA_project/view/admin_staff/notifications.php')">Back </button></td>
            <td></td>
        </tr>
    </table>
</div>