<!--
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/26/14
 * Time: 6:06 PM
 */
 -->

<html>
<div class="panel_upper">
    <div class="p0">
        <label class="p1">Manage Details  ></label>
        <label class="p2">Events</label>
    </div>
</div>
<div class="panel">
    <div class="panel_bar" >
        <p>Add New Event </p>
    </div>
    <form action='/ACTA_project/mod/admin_staff/event_handler.php' method="post" id="event_reg">
        <table class="table1">
            <tr class="row1">
                <td class="row_label">Event ID*</td>
                <td class="input_data"><input class="input data" type="text" name="e_ID" id="e_ID"></td>
            </tr>
            <tr class="row2">
                <td class="row_label">Event Name* </td>
                <td class="input_data"><input class="input data" type="text" name="e_name" id="e_name"></td>
            </tr>
            <tr class="row1">
                <td class="row_label">Date*</td>
                <td class="input_data"><input class="input data" type="date" name="e_date" id="e_date"></td>
            </tr>
            <tr class="row2">
                <td class="row_label">Admin ID* </td>
                <td class="input_data"><input class="input data" type="text" name="a_id" id="a_id"></td>
            </tr>
            <tr class="row1">
                <td class="row_label">Description </td>
                <td class="input_data"><textarea class="inputArea" name="e_desc" id="e_desc" rows="4" cols="20"></textarea></td>
            </tr>
            <tr>
                <td><input class="button1" type="button" value="Add" name="add" onclick="ajaxPost('/ACTA_project/mod/admin_staff/event_handler.php',$('#event_reg').serialize()+'&add=Add')"></td>
                <td></td>
            </tr>

        </table>
    </form>

</div>
</html>