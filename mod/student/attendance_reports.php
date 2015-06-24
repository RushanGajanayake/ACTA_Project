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

class StuAttenReport{

    private $db_connection = null;

    private $students_atten_percentage = array(array());
    private $atten_details = null; /*name,prcentage*/
    private $no_of_dates_held = null;
    private $s_count =0;
    private $details = array(array()); /*month no no*/

    public function __construct(){

        if(isset($_POST['generateRep'])){
            $month1 = $_POST['month1'];
            $year1 = $_POST['year1'];

            $month2 = $_POST['month2'];
            $year2 = $_POST['year2'];

            $this->getData($month1,$year1,$month2,$year2);

            PDF::attendanceReportMy($this->atten_details,$this->details);
        }
    }


   public  function getData($month1,$year1,$month2,$year2){

        session_start();
        $username=$_SESSION['user_name'];

        $start_month = $month1;
        $start_yr = $year1;

        $finish_month = $month2;
        $finish_yr = $year2;

        $stu_atten = array(array());
        $i=0;
        if($month1==$month2 and $year1==$year2){
            $this->db_connection = DB_conn::conn();
            $query2 = $this->db_connection->prepare("SELECT * FROM attendence WHERE student_ID = '$username' AND Current_month = '$month1' AND  Current_year='$year1'");
            $query2->execute();
            $row3 = $query2->fetch();
            $atten = $row3['attendence'];
            $hold_dates = $row3['No_of_dates_hold'];
            $stu_atten[$i][0] = $atten;
            $stu_atten[$i][1] = $hold_dates;
            switch($month1){
                case "1" : $this->details[$i][0] = "January";
                    break;
                case "2" : $this->details[$i][0] = "February";
                    break;
                case "3" :$this->details[$i][0] = "March";
                    break;
                case "4" : $this->details[$i][0] = "April";
                    break;
                case "5" : $this->details[$i][0] = "May";
                    break;
                case "6" : $this->details[$i][0] = "June";
                    break;
                case "7" : $this->details[$i][0] = "July";
                    break;
                case "8" : $this->details[$i][0] = "August";
                    break;
                case "9" : $this->details[$i][0] = "September";
                    break;
                case "10" : $this->details[$i][0] = "October";
                    break;
                case "11" : $this->details[$i][0] = "November";
                    break;
                case "12" : $this->details[$i][0] = "December";
                    break;
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
                $this->db_connection = DB_conn::conn();
                $query1 = $this->db_connection->prepare("SELECT * FROM attendence WHERE student_ID = '$username' AND Current_month = '$start_month' AND  Current_year='$start_yr'");
                $query1->execute();


                while($row2 = $query1->fetch(PDO::FETCH_ASSOC)){
                    $atten = $row2['attendence'];
                    $hold_dates = $row2['No_of_dates_hold'];
                    $stu_atten[$i][0] = $atten;
                    $stu_atten[$i][1] = $hold_dates;
                    switch($start_month){
                        case "1" : $this->details[$i][0] = "January";
                            break;
                        case "2" : $this->details[$i][0] = "February";
                            break;
                        case "3" :$this->details[$i][0] = "March";
                            break;
                        case "4" : $this->details[$i][0] = "April";
                            break;
                        case "5" : $this->details[$i][0] = "May";
                            break;
                        case "6" : $this->details[$i][0] = "June";
                            break;
                        case "7" : $this->details[$i][0] = "July";
                            break;
                        case "8" : $this->details[$i][0] = "August";
                            break;
                        case "9" : $this->details[$i][0] = "September";
                            break;
                        case "10" : $this->details[$i][0] = "October";
                            break;
                        case "11" : $this->details[$i][0] = "November";
                            break;
                        case "12" : $this->details[$i][0] = "December";
                            break;
                    }


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

       $this->calcAtten($username,$stu_atten);
       return true;
    }

    public  function calcAtten($stu_id,$stu_atten){

        $len =count($stu_atten);
//        echo "/////////";
//        echo $len;
        $s_att = 0;
        $hold_date = 0;



        for($x=0;$x<$len;$x++){
            $s_att = $s_att + $stu_atten[$x][0];
            $hold_date = $hold_date + $stu_atten[$x][1];
            $this->details[$x][1] = $stu_atten[$x][0];
            $this->details[$x][2] = $stu_atten[$x][1];

        }

        if($hold_date!= 0){
//            echo "(".$hold_date.")";
            $att_percentage = round(($s_att/$hold_date)*100,0);

            if($att_percentage<80){
                $att_percentage = $att_percentage." *";
            }
            $this ->no_of_dates_participated = $s_att;
            $this->no_of_dates_held= $hold_date;
            $count = $this->s_count;

            $this->students_atten_percentage[$count][0] = $stu_id;
            $this->students_atten_percentage[$count][1] = $att_percentage ;


            $this->s_count = $count + 1;
            $this->db_connection = DB_conn::conn();
            $query2 = $this->db_connection->prepare("SELECT * FROM student WHERE student_ID = '$stu_id'");
            $query2->execute();
            $row11 = $query2->fetch();
            $nic = $row11['Person_NIC'];
            $query3 = $this->db_connection->prepare("SELECT * FROM person WHERE NIC = '$nic'");
            $query3->execute();
            $row12 = $query3->fetch();
            $name1 = $row12['Title'];
            $name2 = $row12['FirstName'];
            $name3 = $row12['LastName'];
            $name = $name1.".".$name2." ".$name3;

            $data = array($stu_id,$name,$hold_date,$s_att,$this->students_atten_percentage[0][1]);
            $this->atten_details = $data;


            return true;

        }
        return false;

    }



}

$at = new StuAttenReport();