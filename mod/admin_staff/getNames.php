<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/21/14
 * Time: 1:53 PM
 */

require_once("../../conn/db_conn.php");

class getNames{

    public function __construct(){
        $conn = DB_conn::conn();
        if($_POST['search'])
        {

            $categ = $_POST['person'];
            $q=$_POST['search'];

            $person_cate = null;
            $person_ID = null;
            $person_ID1 = null;


            if($categ == "student"){
                $person_cate = "student";
                $person_ID = "Student_ID";
                $person_ID1 = "DQS";
            }
            elseif($categ = "academic"){
                $person_cate = "aca_staff";
                $person_ID = "Ac_ID";
                $person_ID1 = "ac";
            }

//or is_numeric($q)

            if($q==$person_ID1 ){

                $qry = $conn->prepare("SELECT * FROM {$person_cate} INNER JOIN person ON {$person_cate}.Person_NIC = person.NIC WHERE {$person_cate}.{$person_ID} LIKE '%$q%' order by {$person_cate}.{$person_ID} LIMIT 10");
                $qry->execute();

                echo "<table class='table1'>";

                while($row= $qry->fetch(PDO::FETCH_ASSOC)){
                    $name =$row['FirstName'];
                    $last =$row['LastName'];
                    $id = $row[$person_ID];

//        $name2="<strong>".$q."</strong>";
//        $name3 = str_ireplace($q, $name2, $name);

                    $ful_name = $id." -  ".$name." ".$last;



                    echo "<tr class='row1'>";
                    echo "<td class='row_label2' ></td>";
                    echo "<td class='input_data'><input class='show' type='text' name='c_ID' id='c_ID' value='".$ful_name."' readonly='readonly' ></td>";
                    echo "</tr>";


                }

                echo"</table>";

            }
            else{
                $qry = $conn->prepare("SELECT * FROM person INNER JOIN {$person_cate} ON person.NIC = {$person_cate}.Person_NIC WHERE person.FirstName LIKE '%$q%' OR person.LastName LIKE '%$q%' order by person.FirstName  LIMIT 10");
                $qry->execute();


                echo "<table class='table1'>";

                while($row= $qry->fetch(PDO::FETCH_ASSOC)){
                    $name =$row['FirstName'];
                    $last =$row['LastName'];
                    $id = $row[$person_ID];



                    $ful_name = $id." -  ".$name." ".$last;



                    echo "<tr class='row1'>";
                    echo "<td class='row_label2' ></td>";

                    echo "<td class='input_data'><input class='show' type='text' name='c_ID' id='c_ID' value='".$ful_name."'onclick='autoCompl_get();' ></td>";
                    echo "</tr>";


                }

                echo"</table>";
            }




        }
//        elseif($_POST['']){
//
//        }
    }

}


$n = new getNames();

?>


