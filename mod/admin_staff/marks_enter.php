<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 9/11/14
 * Time: 8:41 PM
 */

require_once("../../conn/db_conn.php");
require_once("../../ctrl/queries.php");
class marksEnter{


    public function __construct(){

         if(isset($_POST['Add2'])){
             $s_num = $_POST['s_num'];
             //echo $s_num;

            for($y=0; $y<$s_num; $y++){


                    $s_id = $_POST['s_id'.$y];
                    $sub_num = $_POST['sub_num'];
                    $results = $_POST['mark'.$y];
                    //$st_id = $stu_id_list[$y];

                    //echo $s_id;
                    //echo $results;
                     //echo $sub_num;
                $this->addMarks($s_id,$sub_num,$results);

            }
         }

    }

    private function addMarks($s_id,$sub_num,$mark){

        $course_ID = $this->cID($s_id);
        $result = $this->markResults($mark);

        $values= array('',$sub_num,$s_id,$result,$mark,$course_ID);

        $query = new mysqlQuery();

        if($query->insert("marks",$values,$row=null)==true){
            echo "results entered";
        }
        else{
            echo "not entered";
        }



    }

    private function markResults($mark){

        if($mark=="" or $mark=="ab"){
            return "ab";
        }
        elseif($mark>=90){
            return "A+";
        }
        elseif($mark>=85){
            return "A";
        }
        elseif($mark>=75){
            return "A-";
        }
        elseif($mark>=70){
            return "B+";
        }
        elseif($mark>=65){
            return "B";
        }
        elseif($mark>=60){
            return "B-";
        }
        elseif($mark>=55){
            return "C+";
        }
        elseif($mark>=50){
            return "C";
        }
        elseif($mark>=40){
            return "C-";
        }
        elseif($mark>=35){
            return "D+";
        }
        elseif($mark>=25){
            return "D";
        }
        elseif($mark>=15){
            return "D-";
        }
        else{
            return "E";
        }


    }

    private function cID($s_id){
        $st_id = explode('/',$s_id);
        //echo $st_id[0];
        return $st_id[0];
    }

}


//$stu_id_list=array()
$mks_E = new marksEnter();

?>
