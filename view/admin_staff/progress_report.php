<!--
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/8/14
 * Time: 11:31 PM
 */
 -->
<div class="panel_upper">
    <div class="p0">
        <label class="p1"> Reports ></label>
        <label class="p2"> Progress Report</label>
    </div>

</div>
<div class="panel" id="panel">
    <div class="panel_body">
        <div class="panel_bar" >
            <p>Batch Progress Report </p>
        </div>
        <div class="panel_body_cont">
            <form action='/ACTA_project/mod/admin_staff/report.php' method="post" id="report">
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
                    </tr>
                    <tr class="row1">
                        <td class="row_label">Select Level</td>
                        <td class="input_data" id="levels">
                            <select class="input data" id="level" name="level">

                            </select>
                        </td
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
                    </tr>
                    <tr class="row1">
                        <td class="row_label">Select Subject</td>
                        <td class="input_data" id="subjects">
                            <select class="input data" id="subject" name="subject">
<!--                                <option value=""></option>-->
<!--                                <option value="sub001">algo</option>-->
<!--                                <option value="sub002">networks</option>-->
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input class="button1" type="submit" value="Generate" name="generateReport"></td>
                        <td></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <div class="panel_body">
        <div class="panel_bar" >
            <p>Individual Progress Report </p>
        </div>
        <div class="panel_body_cont">
            <form action='/ACTA_project/mod/admin_staff/report.php' method="post" id="report_stu">
                <table class="table1">
                    <tr class="row1">
                        <td class="row_label">Student ID</td>
                        <td class="input_data"><input class="input data" type="text" name="stu_Id" id="stu_Id" ></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input class="button1" type="submit" value="Generate" name="generate_stu_Report"></td>
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