<!--
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/25/14
 * Time: 11:19 PM
 */
 -->
<html>
<div class="panel_upper">
    <p> Course </p>
</div>
<div class="panel">
    <div class="panel_body">
    <div class="panel_bar" >
        <p>Courses Details</p>
    </div>
    <div class="panel_body_cont">
        <div class="details">

<?php
require_once("../../conn/db_conn.php");
require_once("../../ctrl/course.php");

$c = new Courses();
$details = $c->getData();

$ln = count($details);

for($x=0;$x<$ln;$x++){

    $c_id = $details[$x][0];
    $c_name = $details[$x][1];

    $y= ($x%2)+1;

    $qury = "ajaxPost1('/ACTA_project/mod/admin_staff/course_details.php',$('#c_id".$x."'))";
?>
    <div class="<?php echo "details_row".$y ;?>">
        <div class="row_id"><p><?php echo $c_id;?><input type="hidden" name="<?php echo "c_id".$x ;?>" id="<?php echo "c_id".$x ;?>" value="<?php echo $c_id ;?>"></p></div>
        <div class="row_details"><p><?php echo $c_name;?><input type="hidden" name="<?php echo "c_name".$x ;?>" id="<?php echo "c_name".$x ;?>" value="<?php echo $c_name ;?>"></p></div>
        <div class="row_button"><input class="button1" type="button" name="views" id="views" value="View" onclick="<?php echo $qury;?>"></div>
        <div class="inline"></div>
    </div>


<?php
}

?>
        </div>



    </div>
    </div>
    <div class="panel_body">

    <div class="panel_bar" >
        <p>Add New Course </p>
    </div>
    <div class="panel_body_cont">
    <table class="table1">
        <tr>
            <td><button type="button" onclick="myFunction1('/ACTA_project/view/admin_staff/course_add.php')"> <img src="/ACTA_project/res/image/add_courses.png" height="150px" width="150px"></button></td>
        </tr>
    </table>
    </div>
    </div>


</div>
</html>