<!--
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/26/14
 * Time: 10:36 PM
 */
 -->

<div class="panel_upper">
    <div class="p0">
        <label class="p1">Manage Details  ></label>
        <label class="p2">  Attendance Add </label>
    </div>
    <!--    <p>Manage Details  >  Marks </p>-->
</div>
<div class="panel" id="panel">
    <div class="panel_body">
        <div class="panel_bar" >
            <p>Add Attendance </p>
        </div>
        <div class="panel_body_cont">
            <form action="/ACTA_project/mod/admin_staff/attendance.php" method="post" id="atten">
                <table class="table1">
                    <tr class="row1">
                        <td class="row_label">Select Year</td>
                        <td class="input_data">
                            <select class="input data"  id="year" name="year">
                                <option value=""></option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                            </select>
                        </td>
                        <td class="error_msg" id="year_e"></td>
                    </tr>
                    <tr class="row2">
                        <td class="row_label">Select Course</td>
                        <td class="input_data">
                            <select class="input data"  id="course" name="course" onchange="myfun(this)">
                                <option value=" "></option>
                                <option value="DQS1">Computer science</option>
                                <option value="DQS2">Information System</option>
                                <option value="DQS3">Quantity Surveyor</option>
                            </select>
                        </td>
                        <td class="error_msg" id="course_e"></td>
                    </tr>
                    <tr class="row1">
                        <td class="row_label">Select Level</td>
                        <td class="input_data" id="levels">
                            <select class="input data"  id="level" name="level">

                            </select>
                        </td>
                        <td class="error_msg" id="level_e"></td>
                    </tr>
                    <tr class="row2">
                        <td class="row_label">Select Batch</td>
                        <td class="input_data">
                            <select class="input data"  id="batch" name="batch">
                                <option value=""></option>
                                <option value="B1">Batch 1</option>
                                <option value="B2">Batch 2</option>
                            </select>
                        </td>
                        <td class="error_msg" id="batch_e"></td>
                    </tr>
                    <tr class="blank_row">
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="blank_row">
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="row1">
                        <td class="row_label">Select Month</td>
                        <td class="input_data">
                            <div class="input_data_div">
                            <select class="input_date"  id="month" name="month" >
                                <option selected="selected">Month</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>

                            <select class="input_date"  id="year1" name="year1">
                                <option selected="selected">Year</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                            </select>
                            </div>
                        </td>
                        <td class="error_msg" id="year1_e"></td>
                    </tr>
                    <tr class="row2">
                        <td class="row_label">Dates of Lect. held</td>
                        <td class="input_data"><input class="input data" type="text" name="dates" id="dates"></td>
                        <td class="error_msg" id="dates_e"></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td><input class="button1" type='button' value='Next' name='add1' onclick="javascript:checkEmpty_atten();" ></td>
<!--                        <td><input class="button1" type="button" value="Next" name="add1" onclick="ajaxPost('/ACTA_project/mod/admin_staff/attendance.php',$('#atten').serialize()+'&add1=Next')"></td>-->
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

<?

?>