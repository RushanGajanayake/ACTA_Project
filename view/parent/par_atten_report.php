<?php

require_once("../../conn/db_conn.php");
require_once("../../ctrl/users.php");

session_start();


$u_nic = $_SESSION['p_nic'];
$id= new Users();
$n = $id->getUserData($u_nic,'parent');
$p_id = $n->Student_ID;
$replace = "P/";
$student_id = str_replace($replace,'',$p_id);

?>
<div class="panel_upper">
    <div class="p0">
        <label class="p1"> Reports ></label>
        <label class="p2"> Attendance Report</label>
    </div>

</div>
<div class="panel" id="panel">
    <div class="panel_body">
        <div class="panel_bar" >
            <p>Student Attendance </p>
        </div>
        <div class="panel_body_cont">
            <form action='/ACTA_project/mod/parent/attendence_data.php' method="post" id="att_report">
                <table class="table1">
                    <tr class="blank_row">
                        <td><input type="hidden" name="student_id" id="student_id" value="<?php echo $student_id;?>"></td>
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
                    </tr>
                    <tr>
                        <td></td>
                        <td><input class="button1" type="submit" value="Generate" name="generateRep"></td>
                        <td></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <table class="table1">
        <tr >
            <td><button class="button1" onclick="myFunction1('/ACTA_project/view/parent/get_report.php')">Back </button></td>
            <td></td>
        </tr>
    </table>

</div>