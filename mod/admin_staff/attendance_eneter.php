<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/27/14
 * Time: 11:28 AM
 */
require_once("../../conn/db_conn.php");
require_once("../../ctrl/queries.php");
class attenEnter{

    private $s_num ;



    public function __construct(){

        if(isset($_POST['Add2'])){
            $s_num = $_POST['s_num'];
            $this->s_num = $s_num;
            //echo $s_num;

            for($y=0; $y<$s_num; $y++){


                $s_id = $_POST['s_id'.$y];
                $year1 = $_POST['year1'];
                $month = $_POST['month'];
                $attend = $_POST['atten'.$y];
                $dates_hold= $_POST['dates'];
                //$st_id = $stu_id_list[$y];



                $values = array('',$s_id,$year1,$month,$attend,$dates_hold);
                $this->addAtten("attendence",$values);

            }

        }

    }
    private function addAtten($table,$val){
        $query = new mysqlQuery();

        if($query->insert($table,$val,$row=null)== true){
//            echo "Data Enetered";
            include("../../view/admin_staff/attendance_add.php");
        }
        else{
            echo "Data not entered";
        }
    }

}


$at= new attenEnter();
?>