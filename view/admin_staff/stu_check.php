<!--
/**
* Created by PhpStorm.
* User: Rushan Gajanayake
* Date: 9/10/14
* Time: 10:25 AM
*/
-->

<html>
<!--<link rel="stylesheet"  href="/ACTA_project/res/css/content.css">-->
<div class="panel_upper">
    <div class="p0">
        <label class="p1">Manage Details  ></label>
        <label class="p2">Student</label>
    </div>

    <!--    <div class="p2"> Student</div></label>-->
    <!--    <p>Manage Details  >  Student </p>-->
</div>
<div class="panel" id="panel">
    <div class="panel_bar" >
        <p>Add New Student </p>
    </div>
    <form action="/ACTA_project/view/admin_staff/stu_add.php" method="post" id="stu_check">
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
                        <!--                        <option value=""></option>-->
                        <!--                        <option value="L1">Level 1</option>-->
                        <!--                        <option value="L2">Level 2</option>-->
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
            <tr>
                <td></td>
                <td><input class="button1" type="button" value="Next" name="add1" onclick="ajaxPost('/ACTA_project/view/admin_staff/stu_add.php',$('#stu_check').serialize()+'&add1=Next')"></td>
                <td></td>
            </tr>
        </table>

    </form>
    <div id="result"></div>

    <!-- update or delete student data -->
    <div class="panel_bar" >
        <p>Update Student Details </p>
    </div>
    <form action="/ACTA_project/view/admin_staff/update_form.php" method="post" id="update">
        <table class="table1">
            <tr class="row1">
                <td class="row_label">Student ID</td>
                <td class="input_data">
                    <input type="text" class="search" name="search" id="searchid" onclick="autoComplete();"  placeholder="Enter Name or ID" />

                </td>
                <td></td>
            </tr>
        </table>
        <div id="result1"></div>
        <table class="table1">
            <tr>
                <td></td>
                <td><input class="button1" type="button" value="Next" name="update" onclick="ajaxPost('/ACTA_project/view/admin_staff/update_form.php',$('#update').serialize()+'&update=Next')"></td>
                <td></td>
            </tr>

        </table>

    </form>


    <table class="table1">
        <tr >
            <td><button class="button1" onclick="myFunction1('/ACTA_project/view/admin_staff/manage_details.html')">Back </button></td>
            <td></td>
        </tr>
    </table>
</div>




</html>


