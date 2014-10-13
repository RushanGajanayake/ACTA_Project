<!--
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 9/11/14
 * Time: 8:40 PM
 */
 -->
<div class="panel_upper">
    <div class="p0">
        <label class="p1">Manage Details  ></label>
        <label class="p2">  Marks </label>
    </div>
<!--    <p>Manage Details  >  Marks </p>-->
</div>
<div class="panel" id="panel">
    <div class="panel_bar" >
        <p>Add Marks </p>
    </div>
    <form action="/ACTA_project/mod/admin_staff/marks.php" method="post" id="marks">
        <table class="table1">
            <tr class="row1">
                <td class="row_label">Select Year</td>
                <td class="input_data">
                    <select id="year" name="year">
                        <option value=""></option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                    </select>
                </td>
            </tr>
            <tr class="row2">
                <td class="row_label">Select Course</td>
                <td class="input_data">
                    <select id="course" name="course" onchange="myfun(this)">
                        <option value=" "></option>
                        <option value="DQS1">Computer science</option>
                        <option value="DQS2">Information System</option>
                    </select>
                </td>
            </tr>
            <tr class="row1">
                <td class="row_label">Select Level</td>
                <td class="input_data" id="levels">
                    <select id="level" name="level">

                    </select>
                </td>
            </tr>
            <tr class="row2">
                <td class="row_label">Select Batch</td>
                <td class="input_data">
                    <select id="batch" name="batch">
                        <option value=""></option>
                        <option value="B1">Batch 1</option>
                        <option value="B2">Batch 2</option>
                    </select>
                </td>
            </tr>
            <tr class="row1">
                <td class="row_label">Select Subject</td>
                <td class="input_data">
                    <select id="subject" name="subject">
                        <option value=""></option>
                        <option value="sub001">algo</option>
                        <option value="sub002">networks</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input class="button1" type="button" value="Next" name="next" onclick="ajaxPost('/ACTA_project/mod/admin_staff/marks.php',$('#marks').serialize()+'&next=Next')"></td>
            </tr>
        </table>
    </form>
<button class="button1" onclick="myFunction1('/ACTA_project/view/admin_staff/manage_details.html')">Back </button>


</div>

<?

?>