<!--
/**
* Created by PhpStorm.
* User: Rushan Gajanayake
* Date: 9/10/14
* Time: 10:25 AM
*/
-->

<html>

<div class="panel_upper">
    <div class="p0">
        <label class="p1">Manage Details  ></label>
        <label class="p2">Student</label>
    </div>

</div>
<div class="panel" id="panel">
    <div class="panel_body">
        <div class="panel_bar" >
            <p>Add New Student </p>
        </div>
        <div class="panel_body_cont">
            <form action="/ACTA_project/view/admin_staff/stu_add.php" method="post" id="stu_check">
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
                        <td><input class="button1" type='button' value='Next' name='add1' onclick="javascript:checkEmpty_stu();" ></td>
                        <td></td>
                    </tr>
                </table>

            </form>
        </div>
        <div id="result"></div>
    </div>

    <!-- update or delete student data -->
    <div class="panel_body">
        <div class="panel_bar" >
            <p>Update Student Details </p>
        </div>
        <div class="panel_body_cont">
            <form action="/ACTA_project/view/admin_staff/update_form.php" method="post" id="update">
                <table class="table1">
                    <tr class="row1">
                        <td class="row_label">Student ID</td>
                        <td class="input_data2">
                            <input type="text" class="search" name="search" id="searchid" onclick="autoComplete('student');"  placeholder="Enter Name or ID" />

                        </td>
                        <td class="error_msg" id="searchid_e"></td>
                    </tr>
                </table>
                <div id="result1"></div>
                <table class="table1">
                    <tr>
                        <td></td>
                        <td><input class="button1" type="button" value="Next" name="update" onclick="javascript:checkEmpty_search();"></td>
                        <td></td>
                    </tr>

                </table>

            </form>
        </div>
    </div>
    <div class="panel_body">
        <div class="panel_bar" >
            <p>All Students Details </p>
        </div>
        <div class="panel_body_cont">
            <table class="table1">
                <tr>
                    <td><button type="button" onclick="myFunction1('/ACTA_project/view/admin_staff/all_stu.php')"><img src="/ACTA_project/res/image/all_stu.png" height="150px" width="150px"></button></td>
                </tr>
            </table>
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


