<!--
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/27/14
 * Time: 10:53 PM
 */
-->
<div class="panel_upper">
    <p>Report  >  Attendance Report </p>
</div>
<div class="panel" id="panel">
    <div class="panel_bar" >
        <p>Batch Attendance </p>
    </div>
    <form action='/ACTA_project/mod/admin_staff/attendance_reports.php' method="post" id="att_report">
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
                    <select id="month1" name="month1" >
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
                </td>
                <td class="input_data">
                    <select id="year1" name="year1">
                        <option selected="selected">Year</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                    </select>
                </td>
            </tr>
            <tr class="row2">
                <td></td>
                <td class="row_label">To</td>
            </tr>
            <tr class="row1">
                <td></td>
                <td class="input_data">
                    <select id="month2" name="month2" >
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
                </td>
                <td class="input_data">
                    <select id="year2" name="year2">
                        <option selected="selected">Year</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
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

    <table class="table1">
        <tr >
            <td><button class="button1" onclick="myFunction1('/ACTA_project/view/admin_staff/report.html')">Back </button></td>
            <td></td>
        </tr>
    </table>

</div>