<!--
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 9/15/14
 * Time: 6:39 PM
 */
 -->
<div class="panel_upper">
    <div class="p0">
        <label class="p1"> Course ></label>
        <label class="p2"> Add Course</label>
    </div>

</div>
<div class="panel">
    <div class="panel_bar" >
        <p>Add New Course </p>
    </div>
    <form action="/ACTA_project/mod/admin_staff/curs_add.php" method="post" id="cours_add">
        <table class="table1">
            <tr class="row1">
                <td class="row_label">Course ID*</td>
                <td class="input_data"><input class="input data"  type="text" name="c_ID" id="c_ID"></td>
            </tr>
            <tr class="row2">
                <td class="row_label">Course Name*</td>
                <td class="input_data"><input class="input data" type="text" name="c_name" id="c_name"></td>
            </tr >
            <tr class="row2">
                <td class="row_label">No. of levels*</td>
                <td class="input_data"><input class="input data" type="text" name="c_level" id="c_level"></td>
            </tr>
            <tr class="row1">
                <td class="row_label">Course Duration*</td>
                <td class="input_data"><input class="input data" type="text" name="c_yr" id="c_yr" placeholder="Years"></td>
                <td class="input_data"><input class="input data" type="text" name="c_months" id="c_months" placeholder="Months"></td>
            </tr>
            <tr class="row2">
                <td class="row_label">Administrator ID*</td>
                <td class="input_data"><input class="input data" type="text" name="admin_id" id="admin_id"></td> <!--this should be change as when admin id get from admin login session-->
            </tr>
            <tr class="row1">
                <td class="row_label">Content and Details*</td>
                <td class="input_data"><textarea class="inputArea" name="c_details" id="c_details" rows="15" cols="30"></textarea> </td> <!-- words(500) if this rows, cols can be change -->
                <!--            <td><input type="text_area" name="c_details" id="c_details" style="height: 100px"></td>-->
            </tr>
            <tr>
                <td><input class="button1" type="button" name="add_c" id="add_c" value="Next" onclick="ajaxPost('/ACTA_project/mod/admin_staff/curs_add.php',$('#cours_add').serialize()+'&add_c=Next')"></td>
                <td></td>
            </tr>
        </table>
    </form>
<button  class="button1" onclick="myFunction1('/ACTA_project/view/admin_staff/courses.php')">Back </button>
</div>