<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/13/14
 * Time: 8:03 PM
 */
//
//require_once("../../mod/parent/reprt.php");
//require_once("../../ctrl/queries.php");
require_once("../../conn/db_conn.php");
//require_once("../../mod/graph/graphs.php");
//
//
//require_once("../../mod/PDF/pdf.php");
//
session_start();
$u_nic = $_SESSION['p_nic'];

//echo $u_nic;

$db = DB_conn::conn();

$query1 = $db->prepare('SELECT * FROM parent WHERE Person_NIC = :u_nic');
$query1->bindValue(':u_nic',$u_nic,PDO::PARAM_STR);
$query1->execute();

$data1 = $query1->fetchObject();
$st_id = $data1->Student_ID;

$replace = "P/";
$student_id = str_replace($replace,'',$st_id);

//echo $st_id;

//$rp = new StuReportMaker("DQS1/L1/2014/B2/001");



?>
<div class="panel_upper">
    <div class="p0">
        <label class="p1"> Reports ></label>
        <label class="p2"> Progress Report</label>
    </div>

</div>
<div class="panel" id="panel">
    <div class="panel_body">
        <div class="panel_bar" >
            <p>Progress Report </p>
        </div>
        <div class="panel_body_cont">
            <form action='/ACTA_project/mod/parent/reprt.php' method="post" id="report_stu">
                <table class="table1">
                    <tr class="row1">
                        <td class="row_label">Student ID</td>
                        <td class="input_data"><input class="input data" type="text" name="stu_Id" id="stu_Id" value="<?php echo$student_id; ?>" readonly="readonly" ></td>
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
            <td><button class="button1" onclick="myFunction1('/ACTA_project/view/parent/gt_report.html')">Back </button></td>
            <td></td>
        </tr>
    </table>
</div>