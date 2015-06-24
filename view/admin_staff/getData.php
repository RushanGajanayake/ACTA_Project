<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/20/14
 * Time: 5:08 PM
 */

require_once("../../conn/db_conn.php");


$conn = DB_conn::conn();

if(isset($_POST['search']))
{
    $q=$_POST['search'];

    if($q==null){
        echo "<select class='input data' id='level' name='level'>";
        echo "<option value=' '></option>";
        echo "</select>";
    }

    $qry = $conn->prepare("SELECT * FROM course WHERE Course_ID LIKE '%$q%'");
    $qry->execute();

    $row= $qry->fetch(PDO::FETCH_ASSOC);
    $no_of_levels = $row['No_of_Levels'];



    echo "<select class='input data' id='level' name='level'>";
    echo "<option value=' '></option>";

    for($i=1;$i<($no_of_levels+1);$i++){
        echo "<option value='L".$i."'>Level ".$i."</option>";
    }

    echo "</select>";


}
else if($_POST['search2'])
{
    $q1=$_POST['search2'];

    if($q1==null){
        echo "<select class='input data' id='subject' name='subject'>";
        echo "<option value=' '></option>";
        echo "</select>";
    }

    $qry = $conn->prepare("SELECT * FROM subject WHERE Course_Course_ID LIKE '%$q1%'");
    $qry->execute();

    echo "<select class='input data' id='subject' name='subject'>";
    echo "<option value=' '></option>";

    while($row= $qry->fetch(PDO::FETCH_ASSOC)){
        $sub_id = $row['Sub_ID'];
        $sub_name = $row['Sub_Name'];

        echo "<option value='".$sub_id."'>".$sub_name."</option>";
    }



    echo "</select>";
}


?>