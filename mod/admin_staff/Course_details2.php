<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 1/19/15
 * Time: 1:49 PM
 */
?>
    <div class="panel_upper">
        <div class="p0">
            <label class="p1"> Course ></label>
            <label class="p2"> Course Details</label>
        </div>

    </div>


<?php
require_once("../../conn/db_conn.php");

$conn = DB_conn::conn();

$c_id = null;

if($_POST['search']){
    global $c_id;

    $c_id = $_POST['search'];

    $query = $conn->prepare("SELECT * FROM course WHERE Course_ID= '$c_id'");
    $query->execute();

    $row= $query->fetch(PDO::FETCH_ASSOC);

    $c_name = $row['Name'];
    $c_details = $row['Details'];
    $c_levels = $row['No_of_Levels'];
    $c_dur = $row['Duration'];

    ?>

    <div class="panel">
        <div class="panel_body">
            <div class="panel_bar" >
                <p>Course Details - <?php echo $c_name;?> </p>
            </div>
            <div class="panel_body_cont">
                <table class="table1">
                    <tr class="row1">
                        <td class="row_label"><label>Course ID :</label></td>
                        <td class="label1" ><input class='input data' type='hidden' name='c_ids' id='c_ids' value='<?php echo $c_id; ?>'><label><?php echo $c_id; ?></label></td>
                    </tr>
                    <tr class="row2">
                        <td class="row_label"><label>Course Name :</label></td>
                        <td class="label1"><label><?php echo $c_name; ?></label></td>
                    </tr>
                    <tr class="row1">
                        <td class="row_label"><label>Course Levels :</label></td>
                        <td class="label1"><label><?php echo $c_levels; ?></label></td>
                    </tr>
                    <tr class="row2">
                        <td class="row_label"><label>Course Duration :</label></td>
                        <td class="label1"><label><?php echo $c_dur." Months"; ?></label></td>
                    </tr>
                    <tr class="row1">
                        <td class="row_label"><label>Course Details :</label></td>
                        <td class="label1"><label><?php echo $c_details; ?></label></td>
                    </tr>
                    <tr>
                        <td></td>

                    </tr>

                </table>
            </div>
        </div>

<?php } ?>
    <div class="panel_body">
        <div class="panel_bar" >
            <p>Subjects Details </p>
        </div>
        <div class="panel_body_cont">

<?php


if($conn!=null){
    $query2 = $conn->prepare("SELECT * FROM subject WHERE  Course_Course_ID ='$c_id' ");
    $query2->execute();

    $i = 0;

    while($rows= $query2->fetch(PDO::FETCH_ASSOC)){

        $s_id = $rows['Sub_ID'];
        $s_name = $rows['Sub_Name'];
        $s_credits = $rows['Sub_credit'];
        $s_dscrpt = $rows['discription'];
        $ac_id = $rows['Aca_Staff_Ac_ID'];



        ?>
        <table class="table1">
            <tr class="row1">
                <td class="row_label"><label>Subject ID :</label></td>
                <td class="label1"><input class='input data' type='hidden' name='s_ids<?php echo $i;?>' id='s_ids<?php echo $i;?>' value='<?php echo $s_id; ?>'><label><?php echo $s_id; ?></label></td>
            </tr>
            <tr class="row2">
                <td class="row_label"><label>Subject Name :</label></td>
                <td class="label1"><label><?php echo $s_name; ?></label></td>
            </tr>
            <tr class="row1">
                <td class="row_label"><label>Subject Credits :</label></td>
                <td class="label1"><label><?php echo $s_credits; ?></label></td>
            </tr>
            <tr class="row2">
                <td class="row_label"><label>Subject Details :</label></td>
                <td class="label1"><label><?php echo $s_dscrpt; ?></label></td>
            </tr>
            <tr>
                <td></td>
            </tr>
        </table>


        <?php
        $i++ ;

    }

}

?>
        </div>
        </div>
        <table class="table1">
            <tr >
                <td><button class="button1" onclick="myFunction1('/ACTA_project/view/lec view/lec_course.php')">Back </button></td>
                <td></td>
            </tr>
        </table>
        </div>