<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/27/14
 * Time: 10:50 AM
 */

require_once("../../ctrl/queries.php");
require_once("../../conn/db_conn.php");
require_once("../../mod/admin_staff/attendance_eneter.php");

class Atten{

    private $db_connection= null;

    public function __construct(){

        if(isset($_POST['add1'])){
            //get details from marks_add.php form
            $year= $_POST['year'];
            $course=$_POST['course'];
            $level=$_POST['level'];
            $batch=$_POST['batch'];

            $month = $_POST['month'];
            $yr = $_POST['year1'];
            $dates = $_POST['dates'];

//            this is the type of attendace table month field.
//            $month = $yr."-".$month ;



            $this->getStudents($year,$course,$level,$batch,$yr,$month,$dates);

        }

    }

    private function databseConnection(){
        //check the database connection
        if($this->db_connection != null){
            return true;
        }
        else{//if not connect, create ca new connection
            return $this->db_connection = DB_conn::conn();
        }
    }

    private function getStudents($year,$course,$level,$batch,$yr,$month,$no_of_dates){
        //create id for students
        $id = $course."/".$level."/".$year."/".$batch."/%" ;

        //echo $id;

        $stu_id_list= array();

        if($this->databseConnection()){
            //get students id's from student table
            $query = $this->db_connection->prepare("SELECT * FROM student WHERE Student_ID LIKE '$id' "); //Student_ID LIKE id = :id');Course_Course_ID = 'DQS1'
            $query->execute();

            while($row= $query->fetch(PDO::FETCH_ASSOC)){
                $stu_id_list[]=$row['Student_ID'];
            }

            sort($stu_id_list);
            $no_of_st = count($stu_id_list);




            //interface for enter marks
            echo
            "<div class='panel_upper'>
            <p>Manage Details  >  Attendance Add </p>
            </div>
            <div class='panel' id='panel'>
            <form action='/ACTA_project/mod/admin_staff/attendance_eneter.php' method='post' id='atten_enter'>
            <table class='table1'>
            <tr class='row2'>
                <th class='row_label'> Student ID</th>
                <th class='row_label'> No.of Dates</th>
             </tr>
            ";

            for($x=0; $x<$no_of_st; $x++){
                $a = ($x%2)+1 ;
                $r = "row".$a;

                $st_id = $stu_id_list[$x];
                echo "<tr class='".$r."'>";
                echo "<td class='row_label'>".$st_id."</td>";
                echo "<td class='input_data'><input type='hidden' name='s_id".$x."' id='s_id".$x."' value='$st_id'><input class='input data' type='text' name='atten".$x."' id='atten".$x."'>
                     </td>";
                echo "</tr>";
            }
            $qry= "ajaxPost('/ACTA_project/mod/admin_staff/attendance_eneter.php',$('#atten_enter').serialize()+'&Add2=Submit')";
            echo "<tr><td><input type='hidden' name='s_num' id='s_num' value='$no_of_st'>
                          <input type='hidden' name='year1' id='year1' value='$yr'>
                          <input type='hidden' name='month' id='month' value='$month'>
                          <input type='hidden' name='dates' id='dates' value='$no_of_dates'></td>
                    <td><input class='button1' type='button' name='Add2' value='Submit' onclick=".$qry."></td>
                    </tr>";

            echo "</table></form>";
            $ajx = "myFunction1('/ACTA_project/view/admin_staff/attendance_add.php')";
            echo "<button class='button1' onclick=".$ajx.">Back </button> </div>";

            //$mkEnter = new marksEnter($stu_id_list);




        }


    }

}


$at = new Atten();

?>