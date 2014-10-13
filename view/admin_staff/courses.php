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
    <div class="panel_bar" >
        <p>Courses Details</p>
    </div>

<?php
require_once("../../conn/db_conn.php");
$conn = DB_conn::conn();



$query = $conn->prepare("SELECT * FROM course");
$query->execute();

echo "<table class='table1'>";

$i=0;

while($row= $query->fetch(PDO::FETCH_ASSOC)){


    $c_id = $row['Course_ID'];
    $c_name = $row['Name'];

    $qury = "ajaxPost1('/ACTA_project/mod/admin_staff/course_details.php',$('#c_id".$i."'))";

    echo "<tr class='row1'>";
    echo "<td class='input_data'><input class='input data' type='text' name='c_id".$i."' id='c_id".$i."' value='".$c_id."'></td>";
    echo "<td class='input_data'><input class='input data' type='text' name='c_name".$i."' id='c_name".$i."' value='".$c_name."'></td>";
    echo "<td></td>";
    echo "<td><input class='button1' type='button' name='views' id='views' value='View' onclick=".$qury."></td>";
    echo "</tr>";

    $i++;
}

echo "</table>";

?>


    <div class="panel_bar" >
        <p>Add New Course </p>
    </div>
    <table class="table1">
        <tr>
            <td><button type="button" onclick="myFunction1('/ACTA_project/view/admin_staff/course_add.php')"> <img src="/ACTA_project/res/image/co.png"></button></td>
        </tr>
    </table>


    <!--<button type="button" onclick="myFunction1('/ACTA_project/view/admin_staff/courses.html')">asdf</button>-->
</div>
</html>