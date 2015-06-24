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

    private $students_atten_percentage = array(array());
    private $atten_details = null;
    private $no_of_dates_held = null;
    private $s_count =0;

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

            PDF::attendanceReport($this->atten_details,$this->students_atten_percentage);
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


                $stu_atten = array(array());
                $i=0;

                if($month1==$month2 and $year1==$year2){
                    $query2 = $this->db_connection->prepare("SELECT * FROM attendence WHERE student_ID = '$stu_id' AND Current_month = '$month1' AND  Current_year='$year1'");
                    $query2->execute();

                    while($row3 = $query2->fetch(PDO::FETCH_ASSOC)){
                        $atten = $row3['attendence'];
                        $hold_dates = $row3['No_of_dates_hold'];

                        $stu_atten[$i][0] = $atten;
                        $stu_atten[$i][1] = $hold_dates;
                    }

                }
                else{

                    if($month2== 12){
                        $mnth = 1;
                        $yr = $year2 + 1;
                    }else{
                        $mnth = $month2 + 1;
                        $yr = $year2;
                    }

                    while($start_month != $mnth or $start_yr != $yr){




                        $query1 = $this->db_connection->prepare("SELECT * FROM attendence WHERE student_ID = '$stu_id' AND Current_month = '$start_month' AND  Current_year='$start_yr'");
                        $query1->execute();


                        while($row2 = $query1->fetch(PDO::FETCH_ASSOC)){
                            $atten = $row2['attendence'];
                            $hold_dates = $row2['No_of_dates_hold'];


                            $stu_atten[$i][0] = $atten;
                            $stu_atten[$i][1] = $hold_dates;

                        }


                        $i = $i+1;

                        if($start_month == 12){
                            $start_month = 01;
                            $start_yr = $start_yr +1;
                        }
                        else{
                            $start_month = $start_month + 01;
                        }
                    }
                }
                $this->calcAtten($stu_id,$stu_atten);
            }
        }
        $this->otherData($year,$course,$level,$batch);
        return true;

    }

    private function calcAtten($stu_id,$stu_atten){

        $len =count($stu_atten);
//        echo "/////////";
//        echo $len;
        $s_att = 0;
        $hold_date = 0;

        for($x=0;$x<$len;$x++){
            $s_att = $s_att + $stu_atten[$x][0];
            $hold_date = $hold_date + $stu_atten[$x][1];

        }

        if($hold_date!= 0){
//            echo "(".$hold_date.")";
            $att_percentage = round(($s_att/$hold_date)*100,0);

            if($att_percentage<80){
                $att_percentage = $att_percentage." *";
            }

            $this->no_of_dates_held= $hold_date;
            $count = $this->s_count;

            $this->students_atten_percentage[$count][0] = $stu_id;
            $this->students_atten_percentage[$count][1] = $att_percentage ;


            $this->s_count = $count + 1;

//            echo "**".$att_percentage;

            return true;

        }
        return false;

    }

    private function otherData($year,$course,$level,$batch){
        $c = null;
        $batch_name =null;
        $lvl = null;

        if($this->databseConnection()){
            $query3 = $this->db_connection->prepare("SELECT * FROM course WHERE Course_ID ='$course' ");
            $query3->execute();
            $data3 = $query3->fetchObject();
            $c = $data3->Name;
        }

        switch($batch){
            case "B1" : $batch_name = "Batch 01";
                break;
            case "B2" : $batch_name = "Batch 02";
                break;
        }

        switch($level){
            case "L1" : $lvl = "Level 01";
                break;
            case "L2" : $lvl = "Level 02";
                break;
            case "L3" : $lvl = "Level 03";
                break;
            case "L4" : $lvl = "Level 04";
                break;
            case "L5" : $lvl = "Level 05";
                break;
            case "L6" : $lvl = "Level 06";
                break;
            case "L7" : $lvl = "Level 07";
                break;
            case "L8" : $lvl = "Level 08";
                break;
            case "L9" : $lvl = "Level 09";
                break;
            case "L10" : $lvl = "Level 10";
                break;
        }

        $data = array($year,$c,$lvl,$batch_name,$this->no_of_dates_held);
        $this->atten_details = $data;

        return true;

    }
}

$at = new AttenReport();