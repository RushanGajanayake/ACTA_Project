<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/16/14
 * Time: 11:46 AM
 */
require_once("../../ctrl/queries.php");
require_once("../../conn/db_conn.php");
require_once("../graph/graphs.php");

require_once("../PDF/pdf.php");

class resultsReport{

    private $db_connection = null;

    private $subject = null;
    private $results = null;

    public function __construct(){
        if(isset($_POST['generateReport'])){
            $year= $_POST['year'];
            $course= $_POST['course'];
            $level = $_POST['level'];
            $batch = $_POST['batch'];
            $subject = $_POST['subject'];

            $this->getResults($course,$level,$year,$batch,$subject);

            PDF::createResutls($this->results,$this->subject);

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


    private function getResults($course,$level,$year,$batch,$subject){
        $id = $course."/".$level."/".$year."/".$batch."/%";

        $stu_results = array();
        $stu_id = array();
        $stu_marks = array();

        if($this->databseConnection()){
            $query = $this->db_connection->prepare("SELECT * FROM marks WHERE Sub_ID = '$subject' AND Student_ID LIKE '$id'");
            $query->execute();

            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                $stu_id[] = $row['Student_ID'];
                $stu_results[]= $row['Results'];
//                $stu_marks[]= $row['marks'];
            }

            $query1 = $this->db_connection->prepare("SELECT * FROM subject WHERE Sub_ID ='$subject'");
            $query1->execute();
            $data1 = $query1->fetchObject();
            $this->subject = $data1->Sub_Name;

        }

        $this->resultsData($stu_id,$stu_results);
        return true;



    }

    private function resultsData($st_id,$st_re){

        $st_data = array(array());
        $datacount = count($st_id);

        $st_data[0][0]= "Student ID";
        $st_data[0][1]= "Result";

        for($i=1;$i<$datacount+1;$i++){
            $st_data[$i][0]= $st_id[$i-1];
            $st_data[$i][1]= $st_re[$i-1];
        }

        $this->results = $st_data;
        return true;
    }


}

$rprt = new resultsReport();