<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/20/14
 * Time: 5:08 PM
 */

require_once("../../conn/db_conn.php");


$conn = DB_conn::conn();

if($_POST['search'])
{
    $q=$_POST['search'];

    if($q==null){
        echo "<select id='level' name='level'>";
        echo "<option value=' '></option>";
        echo "</select>";
    }

    $qry = $conn->prepare("SELECT * FROM course WHERE Course_ID LIKE '%$q%'");
    $qry->execute();

    $row= $qry->fetch(PDO::FETCH_ASSOC);
    $no_of_levels = $row['No_of_Levels'];



    echo "<select id='level' name='level'>";
    echo "<option value=' '></option>";

    for($i=1;$i<($no_of_levels+1);$i++){
        echo "<option value='L".$i."'>Level ".$i."</option>";
    }

    echo "</select>";


}

//if($_POST['search_stu'])
//{
//    $q=$_POST['search_stu'];
//
//    $qry = $conn->prepare("SELECT * FROM person WHERE FirstName LIKE '%$q%'");
//    $qry->execute();
//
//
//    while($row= $qry->fetch(PDO::FETCH_ASSOC)){
//
//        echo "<tr>";
//        echo "<td>".$row['FirstName']."</td>";
//        echo "<td>".$row['LastName']."</td>";
//        echo "</tr>";
//
//    }
//
//}

?>