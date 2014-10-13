<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/27/14
 * Time: 11:20 PM
 */
require_once("../../ctrl/queries.php");
require_once("../../conn/db_conn.php");
require_once("../graph/graphs.php");

require_once("../PDF/pdf.php");

class AttenReport{

    private $db_connection = null;

    public function __construct(){

        if(isset($_POST['generateReport'])){
            $year= $_POST['year'];
            $course= $_POST['course'];
            $level = $_POST['level'];
            $batch = $_POST['batch'];


            $month1 = $_POST['month1'];
            $year1 = $_POST['year1'];

            $month2 = $_POST['month2'];
            $year2 = $_POST['year2'];

            $this->getData($course,$level,$year,$batch,$month1,$year1,$month2,$year2);



        }
    }

    private function databseConnection(){
        if($this->db_connection != null){
            return true;
        }
        else{
            return $this->db_connection = DB_conn::conn();
        }
    }

    private function getData($course,$level,$year,$batch,$month1,$year1,$month2,$year2){

        $id = $course."/".$level."/".$year."/".$batch."/%";

        if($this->databseConnection()){
            $query = $this->db_connection->prepare("SELECT * FROM student WHERE Student_ID LIKE '$id'");
            $query->execute();

            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                $stu_id = $row['Student_ID'];

                $start_month = $month1;
                $start_yr = $year1;

                $finish_month = $month2;
                $finish_yr = $year2;

                while($start_month != $month2 and $start_yr!=$year2){

                    $query1 = $this->db_connection->prepare("SELECT * FROM attendence WHERE student_ID = '$stu_id' AND Current_month = '$start_month' AND  Current_year='$start_yr'");
                    $query1->execute();

                    while($row2 = $query1->fetch(PDO::FETCH_ASSOC)){
                        $atten = $row2['attendence'];
                        $hold_dates = $row2['No_of_dates_hold'];
                    }
                }
            }


            }

    }
}

$at = new AttenReport();