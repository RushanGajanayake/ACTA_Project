<!--
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/27/14
 * Time: 10:53 PM
 */
-->
<div class="panel_upper">
    <div class="p0">
        <label class="p1"> Reports ></label>
        <label class="p2"> Attendance Report</label>
    </div>

</div>
<div class="panel" id="panel">
    <div class="panel_body">
        <div class="panel_bar" >
            <p>Batch Attendance </p>
        </div>
        <div class="panel_body_cont">
            <form action='/ACTA_project/mod/admin_staff/attendance_reports.php' method="post" id="att_report">
                <table class="table1">
                    <tr class="row1">
                        <td class="row_label">Select Year</td>
                        <td class="input_data">
                            <select class="input data" id="year" name="year">
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
                            <select class="input data" id="course" name="course" onchange="myfun(this)">
                                <!-- getting all courses details from database-->
                                <?php
                                require_once("../../conn/db_conn.php");
                                $conn = DB_conn::conn();
                                $query = $conn->prepare("SELECT * FROM course");
                                $query->execute();
                                echo "<option value=' '></option>";
                                while($row= $query->fetch(PDO::FETCH_ASSOC)){
                                    $course_id = $row['Course_ID'];
                                    $course_name = $row['Name'];
                                    ?>
                                    <option value="<?php echo $course_id;?>"><?php echo $course_name;?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </td>
                        <td class="error_msg" id="course_e"></td>
                    </tr>
                    <tr class="row1">
                        <td class="row_label">Select Level</td>
                        <td class="input_data" id="levels">
                            <select class="input data" id="level" name="level">

                            </select>
                        </td>
                        <td class="error_msg" id="level_e"></td>
                    </tr>
                    <tr class="row2">
                        <td class="row_label">Select Batch</td>
                        <td class="input_data">
                            <select class="input data" id="batch" name="batch">
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
                        <td class="row_label">Select Period</td>
                        <td class="input_data">
                            <div class="input_data_div">
                            <select class="input_date" id="month1" name="month1" >
                                <option selected="selected">Month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>

                            <select class="input_date" id="year1" name="year1">
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
                        <td></td>
                        <td class="row_label">To</td>
                    </tr>
                    <tr class="row1">
                        <td></td>
                        <td class="input_data">
                            <div class="input_data_div">
                            <select class="input_date" id="month2" name="month2" >
                                <option selected="selected">Month</option>
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            <select class="input_date" id="year2" name="year2">
                                <option selected="selected">Year</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                            </select>
                            </div>
                        </td>
                        <td class="error_msg" id="year2_e"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input class="button1" type="submit" name="generateReport" id="generateReport" value="Generate" onclick="javascript:checkEmpty_atten_rep();" ></td>
<!--                        <td><input class="button1" type="submit" value="Generate" name="generateReport"></td>-->
<!--                        ajaxPost('/ACTA_project/mod/admin_staff/attendance_reports.php',$('#att_report').serialize()+'&generateReport=Generate');-->
                        <td></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <table class="table1">
        <tr >
            <td><button class="button1" onclick="myFunction1('/ACTA_project/view/admin_staff/reports.php')">Back </button></td>
            <td></td>
        </tr>
    </table>

</div>