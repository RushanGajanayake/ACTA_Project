<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 1/19/15
 * Time: 12:50 PM
 */
?>
<div class="panel_upper">
    <p> Course </p>
</div>
<div class="panel">
    <div class="panel_body">
        <div class="panel_bar" >
            <p>Subject Details</p>
        </div>
        <div class="panel_body_cont">
            <div class="details">

                <?php
                require_once("../../conn/db_conn.php");
                require_once("../../ctrl/course.php");
                require_once("../../ctrl/users.php");

                session_start();

                $nic = $_SESSION['p_nic'];
                $id = new Users();
                $n= $id->getUserData($nic,'aca_staff');
                $p_id = $n->Ac_ID;

                $c = new Courses();
                $details = $c->getSubjectData($p_id);

                $ln = count($details);

                for($x=0;$x<$ln;$x++){

                    $sub_id = $details[$x][0];
                    $sub_name = $details[$x][1];
                    $sub_crdt = $details[$x][2];
//                    $sub_desc = $details[$x][3];
                    $course_id = $details[$x][4];

                    $y= ($x%2)+1;

                    $qury = "ajaxPost1('/ACTA_project/mod/admin_staff/Course_details2.php',$('#c_id".$x."'))";
                    ?>
                    <div class="<?php echo "details_row".$y ;?>">
                        <div class="row_id"><p><?php echo $sub_id;?><input type="hidden" name="<?php echo "c_id".$x ;?>" id="<?php echo "c_id".$x ;?>" value="<?php echo $course_id ;?>"></p></div>
                        <div class="row_details"><p><?php echo $sub_name;?></p></div>
                        <div class="row_button"><input class="button1" type="button" name="views" id="views" value="View" onclick="<?php echo $qury;?>"></div>
                        <div class="inline"></div>
                    </div>


                <?php
                }

                ?>
                <table class="table1">
                    <tr >
                        <td><button class="button1" onclick="myFunction1('/ACTA_project/view/lec view/lec_home.php')">Back </button></td>
                        <td></td>
                    </tr>
                </table>
            </div>