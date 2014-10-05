<!--
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/8/14
 * Time: 11:31 PM
 */
 -->

<div class="panel" id="panel">
<form action='/ACTA_project/mod/admin_staff/report.php' method="post" id="report">
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
            <td></td>
            <td><input class="button1" type="submit" value="Generate" name="generateReport"></td>
            <td></td>
        </tr>
    </table>
</form>
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