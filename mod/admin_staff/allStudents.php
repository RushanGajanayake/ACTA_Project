<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 12/9/14
 * Time: 12:33 AM
 */
include("../../ctrl/queries.php");
require_once("../../conn/db_conn.php");

require_once("../PDF/pdf.php");

class All_Data {

    private $db_conn = null;

    public function __construct(){

        if(isset($_POST['add1'])){
            $year= $_POST['year'];
            $course= $_POST['course'];
            $level = $_POST['level'];
            $batch = $_POST['batch'];

            $this->getData($year,$course,$level,$batch);

        }
    }

    private function databaseConnecton(){

        if($this->db_conn!=null){
            return true;
        }
        else{
            return $this->db_conn = DB_conn::conn();
        }

    }

    private function getData($year,$course,$level,$batch){
        $id = $course."/".$level."/".$year."/".$batch."/";

        $stu_data = array(array());
        $i = 0;

        if($this->databaseConnecton()){

            $query = $this->db_conn->prepare("SELECT * FROM student INNER JOIN person ON student.Person_NIC = person.NIC WHERE student.Student_ID LIKE '$id%'");
            $query->execute();

            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                $name =$row['FirstName'];
                $last =$row['LastName'];
                $full_name = $name." ".$last;

                $stu_data[$i][0]= $row["Student_ID"];
                $stu_data[$i][1]= $full_name;

                $i++;
            }

        }

        sort($stu_data);
        $no_data = count($stu_data);

        echo "<div class='panel_upper'>
                <div class='p0'>
                    <label class='p1'>Manage Details  ></label>
                    <label class='p2'>Students > Details</label>
                </div>
            </div>";

        echo "<div class='panel' id='panel'><div class='panel_body'> ";
        echo "<div class='panel_bar' >
            <p> All Students</p>
        </div>";


        echo "<div class='panel_body_cont'><table class='table1'>";
        echo "<tr class='row2'>
                <th class='row_label'> Student ID</th>
                <th class='row_label'> Student Name</th>
             </tr>";

        for($x=0;$x<$i;$x++){
            $a = ($x%2)+1 ;
            $r = "row".$a;

            $st_id = $stu_data[$x][0];
            $st_name = $stu_data[$x][1];
            echo "<tr class='".$r."'>";
            echo "<td class='row_label'>".$st_id."</td>";
            echo "<td class='label1'><label>".$st_name."</label></td>";
            echo "</tr>";

        }

        echo "</table>";

        echo "<table class='table1'>";
        $ajx = "ajaxPost1('/ACTA_project/mod/admin_staff/report.php',$('#id'))";
        echo "<td></td>";
//        echo "<tr><td><input class='input data' type='hidden' name='id' id='id' value='".$id."'></td><td><input type='button' class='button1' name='generate_stu_details' value='Generate PDF' onclick=".$ajx."></td></tr>";
        echo "</table></div></div>";


        echo "<table class='table1'>";
        $ajx = "myFunction1('/ACTA_project/view/admin_staff/all_stu.php')";
        echo "<tr><td><button class='button1' onclick=".$ajx.">Back </button> </td></tr>";
        echo "</table></div>";
    }

}

$a = new All_Data();