<!--
/**
* Created by PhpStorm.
* User: Rushan Gajanayake
* Date: 9/10/14
* Time: 10:25 AM
*/
-->
<link rel="stylesheet"  href="/ACTA_project/res/css/content.css">
<body>
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
                <select id="course" name="course">
                    <option value=""></option>
                    <option value="DQS1">Computer science</option>
                </select>
            </td>
        </tr>
        <tr class="row1">
            <td class="row_label">Select Level</td>
            <td class="input_data">
                <select id="level" name="level">
                    <option value=""></option>
                    <option value="L1">Level 1</option>
                    <option value="L2">Level 2</option>
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

<!-- update or delete student data -->

<form action="/ACTA_project/view/admin_staff/update_form.php" method="post" id="update">
    <table class="table1">
        <tr class="row1">
            <td class="row_label">Student ID</td>
            <td class="input_data"><input class="input data" type="text" name="stu_Id" id="stu_Id" ></td>
        </tr>
        <tr>
            <td></td>
            <td><input class="button1" type="button" value="Next" name="update" onclick="ajaxPost('/ACTA_project/view/admin_staff/update_form.php',$('#update').serialize()+'&update=Next')"></td>
            <td></td>
        </tr>
    </table>

</form>

<table class="table1">
    <tr >
        <td></td>
        <td><button class="button1" onclick="myFunction1('/ACTA_project/view/admin_staff/manage_details.html')">Back </button></td>
        <td></td>
    </tr>
</table>




</body>



