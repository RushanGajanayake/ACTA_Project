<!--
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 12/9/14
 * Time: 12:23 AM
 */
-->
<html>

<div class="panel_upper">
    <div class="p0">
        <label class="p1">Manage Details  ></label>
        <label class="p2">Students > Details</label>
    </div>


</div>
<div class="panel" id="panel">
    <div class="panel_body">
        <div class="panel_bar" >
            <p>Student Details</p>
        </div>
        <div class="panel_body_cont">
            <form action="/ACTA_project/mod/admin_staff/allStudents.php" method="post" id="all_stu">
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
                    <tr>
                        <td></td>
                        <td><input class="button1" type="button" value="Next" name="add1" onclick="javascript:checkEmpty_All_stu();"></td>
                        <td></td>
                    </tr>
                </table>

            </form>
        </div>
    </div>

    <table class="table1">
        <tr>
            <td><button class="button1"  onclick="myFunction1('/ACTA_project/view/admin_staff/stu_check.php')">Back </button>
        </tr>
    </table>

</div>


</html>