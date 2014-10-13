<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/21/14
 * Time: 1:53 PM
 */

require_once("../../conn/db_conn.php");

$conn = DB_conn::conn();

if($_POST['search'])
{
    $q=$_POST['search'];

    if($q=="DQS"){

        $qry = $conn->prepare("SELECT * FROM student INNER JOIN person ON student.Person_NIC = person.NIC WHERE student.Student_ID LIKE '%$q%' order by student.Student_ID LIMIT 10");
        $qry->execute();

        echo "<table class='table1'>";

        while($row= $qry->fetch(PDO::FETCH_ASSOC)){
            $name =$row['FirstName'];
            $last =$row['LastName'];
            $st_id = $row['Student_ID'];

//        $name2="<strong>".$q."</strong>";
//        $name3 = str_ireplace($q, $name2, $name);

            $ful_name = $st_id." -  ".$name." ".$last;



            echo "<tr class='row1'>";
            echo "<td class='row_label2' ></td>";
            echo "<td class='input_data'><input class='show' type='text' name='c_ID' id='c_ID' value='".$ful_name."' readonly='readonly' ></td>";
            echo "</tr>";


        }

        echo"</table>";

    }
    else{
        $qry = $conn->prepare("SELECT * FROM person INNER JOIN student ON person.NIC = student.Person_NIC WHERE person.FirstName LIKE '%$q%' order by person.FirstName LIMIT 10");
        $qry->execute();

        echo "<table class='table1'>";

        while($row= $qry->fetch(PDO::FETCH_ASSOC)){
            $name =$row['FirstName'];
            $last =$row['LastName'];
            $st_id = $row['Student_ID'];

//        $name2="<strong>".$q."</strong>";
//        $name3 = str_ireplace($q, $name2, $name);

            $ful_name = $st_id." -  ".$name." ".$last;



            echo "<tr class='row1'>";
            echo "<td class='row_label2' ></td>";

            echo "<td class='input_data'><input class='show' type='text' name='c_ID' id='c_ID' value='".$ful_name."'onclick='autoCompl_get();' ></td>";
//?><!--            <span class="name11" id="name11" onclick="autoCompl_get();">--><?php //echo $ful_name; ?><!--</span><br/> --><?php
//            echo "<td class='input_data'><a class='show' onclick='autoCompl_get();'>".$ful_name."</a></td>";
            echo "</tr>";


        }

        echo"</table>";
    }




}
?>


