<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/13/14
 * Time: 7:45 PM
 */

require_once("../../ctrl/queries.php");
require_once("../../conn/db_conn.php");
require_once("../graph/graphs.php");

require_once("../PDF/pdf.php");

class StuReportMaker{

    private $db_connection = null;

    private $student_results = null;


    public function __construct(){
        if(isset($_POST['generate_stu_Report'])){

            $id = $_POST['stu_Id'];


            $this->getDataIndividual($id);

            $stu_details = $this->otherDetails_stu($id);
            PDF::createPDF_student($stu_details,$this->student_results);
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

    //Individual student report making
    private function getDataIndividual($st_id){


        $st_results=array(array());


        if($this->databseConnection()){
            $query = $this->db_connection->prepare("SELECT * FROM marks WHERE Student_ID = '$st_id'");
            $query->execute();

            $i=0;
            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                $s_id = $row['Sub_ID'];

                $query1 = $this->db_connection->prepare("SELECT * FROM subject WHERE Sub_ID ='$s_id'");
                $query1->execute();
                $data1 = $query1->fetchObject();
                $s_name = $data1->Sub_Name;

                $st_results[$i][0]= $s_id;
                $st_results[$i][1]= $s_name;
                $st_results[$i][2]= $row['marks'];
                $st_results[$i][3]= $row['Results'];
                $i++;
            }

            $this->student_results = $st_results;
        }

        return true;


    }


    private function otherDetails_stu($id){

        if($this->databseConnection()){

            $query1= $this->db_connection->prepare("SELECT * FROM student WHERE Student_ID = '$id'");
            $query1->execute();
            $data1= $query1->fetchObject();
            $nic = $data1->Person_NIC;
            $course = $data1->Course_Course_ID;

            $query2 = $this->db_connection->prepare("SELECT * FROM person WHERE NIC='$nic'");
            $query2->execute();
            $data2 = $query2->fetchObject();
            $f_name = $data2->FirstName;
            $l_name = $data2->LastName;
            $name = $f_name." ".$l_name;

            $query3 = $this->db_connection->prepare("SELECT * FROM course WHERE Course_ID ='$course' ");
            $query3->execute();
            $data3 = $query3->fetchObject();
            $c_name = $data3->Name;


            $reportDetails = array($id,$name,$course,$c_name);
            return $reportDetails;

        }

    }


}
$rp = new StuReportMaker();


?>