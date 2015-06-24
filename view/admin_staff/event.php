<!--
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/26/14
 * Time: 6:06 PM
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
        <label class="p1">Manage Details  ></label>
        <label class="p2">Events</label>
    </div>
</div>
<div class="panel">
    <div class="panel_body">
        <div class="panel_bar" >
            <p>Add New Event </p>
        </div>
        <div class="panel_body_cont">
            <form action='/ACTA_project/mod/admin_staff/event_handler.php' method="post" id="event_reg">
                <table class="table1">
                    <tr class="row1">
                        <td class="row_label">Event Name* </td>
                        <td class="input_data"><input class="input data" type="text" name="e_name" id="e_name"></td>
                        <td class="error_msg" id="e_name_e"></td>
                    </tr>
                    <tr class="row2">
                        <td class="row_label">Date*</td>
                        <td class="input_data"><input class="input data" type="date" name="e_date" id="e_date"></td>
                        <td class="error_msg" id="e_date_e"></td>
                    </tr>
                    <tr class="row1">
                        <td class="row_label">Time* </td>
                        <td class="input_data">
                            <div class="input_data_div">
                                <select class="input_date"  name="hour" id="hour">
                                <option value="">hour</option>
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
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                            </select>
                        <input class="input_date" type="text" name="min" id="min" placeholder="minutes"></div></td>
                        <td class="error_msg" id="min_e"></td>

                    </tr>
                    <tr class="row2">
                        <td class="row_label">Admin ID* </td>
                        <td class="input_data"><input class="input data" type="text" name="a_id" id="a_id" value="<?php echo$p_id;?>" readonly="readonly"></td>
                    </tr>
                </table>
                <table class="table2">
                    <tr class="row1">
                        <td class="row_label">Description </td>
                        <td class="input_textarea"><textarea class="input" name="e_desc" id="e_desc" rows="10" cols="20"></textarea></td>
                    </tr>
                </table>
                <table class="table1">
                    <tr>
                        <td><input class="button1" type='button' value='Add' name='add' onclick="javascript:checkEmpty_event();" ></td>

                        <td></td>
                    </tr>

                </table>
            </form>
        </div>
    </div>
    <table class="table1">
        <tr >
            <td><button class="button1" onclick="myFunction1('/ACTA_project/view/admin_staff/manage_detail.php')">Back </button></td>
            <td></td>
        </tr>
    </table>


</div>
</html>