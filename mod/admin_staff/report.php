<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/5/14
 * Time: 2:23 PM
 */
require_once("../../ctrl/queries.php");
require_once("../../conn/db_conn.php");
require_once("../graph/graphs.php");

require_once("../PDF/pdf.php");

class ReportMaker{

    private $db_connection = null;

    private $results = array("A+","A","A-","B+","B","B-","C+","C","C-","D+","D","D-","E");

    private $batchID = null;
    private $subID = null;
    private $sub_name = null;
    private $lect_name = null;
    private $no_of_students_faceinexam = null;
    private $no_of_students_inbatch = null;

    private $student_results = null;
    private $student_results_percentage = null;

    private $batch_results = null;
    private $batch_results_percentage = null;
    private $pastBatch_results =null;
    private $pastBatch_results_percentage =null;


    public function __construct(){

        if(isset($_POST['generateReport'])){
            $year= $_POST['year'];
            $course= $_POST['course'];
            $level = $_POST['level'];
            $batch = $_POST['batch'];
            $subject = $_POST['subject'];




            $this->getDataOverall($course,$level,$year,$batch,$subject);


            $analysis_data = $this->dataAnalysis($this->batch_results,$this->batch_results_percentage);
            $reportDetails = $this->otherData();
            PDF::createPDF_overall($reportDetails,$analysis_data);
        }
        elseif(isset($_POST['generate_stu_Report'])){

            $id = $_POST['stu_Id'];

            $this->getDataIndividual($id);

            $stu_details = $this->otherDetails_stu($id);
            PDF::createPDF_student($stu_details,$this->student_results);

        }
        elseif(isset($_POST['search'])){

            $id = $_POST['search'];
            $data = $this->getStudentDetails($id);
            PDF::StudentData($data);

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

    private function getStudentDetails($id){
        $stu_data = array(array());
        $i = 0;

        if($this->databseConnection()){

            $query = $this->db_connection->prepare("SELECT * FROM student INNER JOIN person ON student.Person_NIC = person.NIC WHERE student.Student_ID LIKE '$id%'");
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

        return $stu_data;

    }

    private function getDataOverall($course,$level,$year,$batch,$subject){
        $id = $course."/".$level."/".$year."/".$batch."/%";

        $this->batchID = $id;
        $this->subID = $subject;

        $id_l = $course."/".$level."/".($year-1)."/".$batch."/%"; //batch????
        $title = "Students Overall Results";

        $stu_results = array();
        $stu_marks = array();
        $stu_results_lastyr = array();
        $stu_marks_lastyr = array();

        if($this->databseConnection()){
            $query = $this->db_connection->prepare("SELECT * FROM marks WHERE Sub_ID = '$subject' AND Student_ID LIKE '$id'");
            $query->execute();

            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                $stu_results[]= $row['Results'];
                $stu_marks[]= $row['marks'];
            }

            //get last year students results details ... for compare
            $query = $this->db_connection->prepare("SELECT * FROM marks WHERE Sub_ID = '$subject' AND Student_ID LIKE '$id_l'");
            $query->execute();

            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                $stu_results_lastyr[]= $row['Results'];
                $stu_marks_lastyr[]= $row['marks'];
            }

            $this->no_of_students_faceinexam= count($stu_results);



            $this->evaluatingOverall($stu_results,"new");
            $this->evaluatingOverall($stu_results_lastyr,"old");



            $this->barChartMaker($this->batch_results); //,$past_stu_data
            $this->pieChartMaker($this->batch_results_percentage);
            $this->compare_BarChart($this->batch_results,$this->pastBatch_results);


            return true;
        }


    }

    private function evaluatingOverall($data,$batch){
         $total = count($data);
         sort($data);

         $r_count = array_count_values($data);

        if(empty($r_count['A+'])){
            $a_pls = 0;
        }else{$a_pls = $r_count['A+'];}
        if(empty($r_count['A'])){
            $a = 0;
        }else{$a = $r_count['A'];}
        if(empty($r_count['A-'])){
            $a_min = 0;
        }else{$a_min = $r_count['A-'];}
        if(empty($r_count['B+'])){
            $b_pls = 0;
        }else{$b_pls = $r_count['B+'];}
        if(empty($r_count['B'])){
            $b = 0;
        }else{$b = $r_count['B'];}
        if(empty($r_count['B-'])){
            $b_min = 0;
        }else{$b_min = $r_count['B-'];}
        if(empty($r_count['C+'])){
            $c_pls = 0;
        }else{$c_pls = $r_count['C+'];}
        if(empty($r_count['C'])){
            $c = 0;
        }else{$c = $r_count['C'];}
        if(empty($r_count['C-'])){
            $c_min = 0;
        }else{$c_min = $r_count['C-'];}
        if(empty($r_count['D+'])){
            $d_pls = 0;
        }else{$d_pls = $r_count['D+'];}
        if(empty($r_count['D'])){
            $d = 0;
        }else{$d = $r_count['D'];}
        if(empty($r_count['D-'])){
            $d_min = 0;
        }else{$d_min = $r_count['D-'];}
        if(empty($r_count['E'])){
            $e = 0;
        }else{$e = $r_count['E'];}



        //get percentage of data
        $a_pls_p = $this->percentageMkr($a_pls,$total);
        $a_p = $this->percentageMkr($a,$total);
        $a_min_p = $this->percentageMkr($a_min,$total);
        $b_pls_p = $this->percentageMkr($b_pls,$total);
        $b_p = $this->percentageMkr($b,$total);
        $b_min_p = $this->percentageMkr($b_min,$total);
        $c_pls_p = $this->percentageMkr($c_pls,$total);
        $c_p = $this->percentageMkr($c,$total);
        $c_min_p = $this->percentageMkr($c_min,$total);
        $d_pls_p = $this->percentageMkr($d_pls,$total);
        $d_p = $this->percentageMkr($d,$total);
        $d_min_p = $this->percentageMkr($d_min,$total);
        $e_p = $this->percentageMkr($e,$total);

        if($batch=="new"){
            $this->batch_results = array($a_pls,$a,$a_min,$b_pls,$b,$b_min,$c_pls,$c,$c_min,$d_pls,$d,$d_min,$e);
            $this->batch_results_percentage = array($a_pls_p,$a_p,$a_min_p,$b_pls_p,$b_p,$b_min_p,$c_pls_p,$c_p,$c_min_p,$d_pls_p,$d_p,$d_min_p,$e_p);
        }
        else if($batch == "old"){
            $this->pastBatch_results = array($a_pls,$a,$a_min,$b_pls,$b,$b_min,$c_pls,$c,$c_min,$d_pls,$d,$d_min,$e);
            $this->pastBatch_results_percentage = array($a_pls_p,$a_p,$a_min_p,$b_pls_p,$b_p,$b_min_p,$c_pls_p,$c_p,$c_min_p,$d_pls_p,$d_p,$d_min_p,$e_p);
        }

        return true;

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

    private function barChartMaker($data){

        //data send for bar chart
        $rslt= $data;
        $mrk = array("A+","A","A-","B+","B","B-","C+","C","C-","D+","D","D-","E");
        $xAx = "Result";
        $yAx = "No.of Students";

        GraphMaker1::barChart($rslt,$mrk,$xAx,$yAx);

        //data send for pie chart
        return true;



    }

    private function pieChartMaker($data){

        $rslt = array($data[0]+$data[1]+$data[2],$data[3]+$data[4]+$data[5],$data[6]+$data[7]+$data[8],$data[9]+$data[10]+$data[11],$data[12]);
        $mrk = array("A's\n(%.1f%%)","B's\n(%.1f%%)","C's\n(%.1f%%)","D's\n(%.1f%%)","E's\n(%.1f%%)");

        GraphMaker1::pieChart($rslt,$mrk);

        return true;

    }
    private function compare_BarChart($new_data,$past_data){

        $rslt1 = $new_data;
        $rslt2 = $past_data;
        $mrk = array("A+","A","A-","B+","B","B-","C+","C","C-","D+","D","D-","E");

        GraphMaker1::compBarChart($rslt1,$rslt2,$mrk);

        return true;

    }


    private function percentageMkr($value,$fullAmount){

        $val = ($value/$fullAmount)*100 ;

        return $value= round($val,2);

    }


    private function dataAnalysis($results,$results_pr){

        $stu_data = array(array());
        $rsults = $this->results;

        for($i=0;$i<count($rsults);$i++){
            $stu_data[$i][0]= $rsults[$i] ;
            $stu_data[$i][1]= $results[$i];
            $stu_data[$i][2]= $results_pr[$i];

        }

        return $stu_data;

    }

    private function otherData(){

        $id = $this->batchID;
        $subID = $this->subID;

        if($this->databseConnection()){

            $qury = $this->db_connection->prepare("SELECT COUNT(Student_ID) FROM student WHERE Student_ID LIKE '$id'");
            $qury->execute();

            $row = $qury->fetch(PDO::FETCH_NUM);
            $students = $row[0];

            $this->no_of_students_inbatch = $students;

            $qury2 = $this->db_connection->prepare("SELECT * FROM subject WHERE Sub_ID ='$subID' ");
            $qury2->execute();
            $data1 = $qury2->fetchObject();
            $this->sub_name = $data1->Sub_Name;
            $lec_ID = $data1->Aca_Staff_Ac_ID;

            $qury3 = $this->db_connection->prepare("SELECT * FROM aca_staff WHERE Ac_ID ='$lec_ID' ");
            $qury3->execute();
            $data3 = $qury3->fetchObject();
            $lec_nic = $data3->Person_NIC;

            $qury4 = $this->db_connection->prepare("SELECT * FROM person WHERE NIC ='$lec_nic' ");
            $qury4->execute();
            $data4 = $qury4->fetchObject();
            $title = $data4->Title;
            $fname = $data4->FirstName;
            $lname = $data4->LastName;

            $this->lect_name = $title.". ".$fname." ".$lname;

        }

        $pass = $this->batch_results_percentage;
        $pass_rate = $pass[0]+$pass[1]+$pass[2]+$pass[3]+$pass[4]+$pass[5]+$pass[6]+$pass[7];
        $fail_rate = $pass[8]+$pass[9]+$pass[10]+$pass[11]+$pass[12];

        $s_id = $this->subID;
        $s_name = $this->sub_name;
        $l_name = $this->lect_name;
        $b_stu = $this->no_of_students_inbatch; //no.of students in the batch
        $e_stu = $this->no_of_students_faceinexam; //no.of students face to exam
        $pass_pr = $pass_rate;
        $repeat_pr = $fail_rate;

        $reportDetails = array($s_id,$s_name,$l_name,$b_stu,$e_stu,$pass_pr,$repeat_pr);
        return $reportDetails;

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

$rprt = new ReportMaker();

?>