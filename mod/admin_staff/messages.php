<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 1/17/15
 * Time: 9:37 PM
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
        <label class="p2">Notifications</label>
    </div>

</div>
<div class="panel" id="panel">
    <div class="panel_body">
        <div class="panel_bar" >
        </div>
        <div class="panel_body_cont">
            <form name="new_msg" action="/ACTA_project/mod/admin_staff/notification.php" method="post" id="new_msg" >
                <table class="table2">
                    <tr class="row1">
                        <td class="row_label">To</td>
                        <td class="input_data"><input type="text" class="search" name="search" id="searchid" onclick="autoComplete('student');"  placeholder="Enter Name or ID" /></td>
<!--                        <td class="input_data"><input class="input data"  type="text" name="msg_to" id="msg_to" ></td>-->
                        <td class="error_msg" id="msg_to_e"></td>
                    </tr>
                    <tr>
                        <td><div id="result1"></div></td>
                    </tr>

                    <tr class="row2">
                        <td class="input_data"><input class="input data" type="hidden" name="msg_from" id="msg_from" value="<?php echo $nic;?>"></td>
                    </tr >
                </table>
                <table class="table2">
                    <tr class="row2">
                        <td class="row_label"></td>
                        <td class="input_textarea"><textarea class="input" name="msg" id="msg" rows="15" cols="30"></textarea> </td>
                    </tr>
                </table>
                <table class="table1">
                    <tr>
                        <td><input class="button1" type="button" name="send_msg" id="send_msg" value="Send" onclick="javascript:checkEmpty_msg();" ></td>
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
