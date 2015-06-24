<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 9/12/14
 * Time: 10:52 AM
 */
require_once("../../ctrl/queries.php");
require_once("../../conn/db_conn.php");
require_once("../../mod/admin_staff/marks_enter.php");

class marks{

    private $db_connection= null;

    public function __construct(){

        if(isset($_POST['next'])){
            //get details from marks_add.php form
            $year= $_POST['year'];
            $course=$_POST['course'];
            $level=$_POST['level'];
            $batch=$_POST['batch'];
            $subject= $_POST['subject'];

            $this->getStudents($year,$course,$level,$batch,$subject);

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

    private function getStudents($year,$course,$level,$batch,$subject){
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
            <p>Manage Details  >  Marks </p>
            </div>
            <div class='panel' id='panel'>
            <div class='panel_body'>
            <div class='panel_bar' >
            </div>
            <div class='panel_body_cont'>
            <form action='/ACTA_project/mod/admin_staff/marks_enter.php' method='post' id='mrks_enter'>
            <table class='table1'>
            <tr class='row2'>
                <th class='row_label'> Student ID</th>
                <th class='row_label'> Result</th>
             </tr>
            ";

            for($x=0; $x<$no_of_st; $x++){
                $a = ($x%2)+1 ;
                $r = "row".$a;

                $st_id = $stu_id_list[$x];
                echo "<tr class='".$r."'>";
                echo "<td class='row_label'>".$st_id."</td>";
                echo "<td class='input_data'><input type='hidden' name='s_id".$x."' id='s_id".$x."' value='$st_id'><input class='input data' type='text' name='mark".$x."' id='mark".$x."'>
                     </td>";
                echo "</tr>";
            }
            $qry= "ajaxPost('/ACTA_project/mod/admin_staff/marks_enter.php',$('#mrks_enter').serialize()+'&Add2=Submit')";
            echo "<tr><td><input type='hidden' name='s_num' id='s_num' value='$no_of_st'>
                          <input type='hidden' name='sub_num' id='sub_num' value='$subject'></td>
                    <td><input class='button1' type='button' name='Add2' value='Submit' onclick=".$qry."></td>
                    </tr>";

            echo "</table></form>";
            $ajx = "myFunction1('/ACTA_project/view/admin_staff/marks_add.php')";
            $m= "javascript:checkEmpty_marks_adding();";
            echo "</div></div><button class='button1' onclick=".$m.">Back </button> </div>";

            //$mkEnter = new marksEnter($stu_id_list);




        }


    }

}


//create a marks class
$mrks = new marks();

?>