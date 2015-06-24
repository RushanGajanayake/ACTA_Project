<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 1/17/15
 * Time: 11:32 AM
 */

?>

<div class="news_panel">
    <div class="panel_header">
        <p class="panel_header_font"> Site News </p>

    </div>
    <div class="panel_cont">

    <?php

    require_once("../../conn/db_conn.php");

    $conn = DB_conn::conn();
    $query = $conn->prepare("SELECT * FROM notification ORDER BY N_ID DESC LIMIT 3;");
    $query->execute();

    while($rows= $query->fetch(PDO::FETCH_ASSOC)){
        $n_date = $rows['N_Date'];
        $n_topic = $rows['N_topic'];
        $n_desc = $rows['N_description'];
        $staff_id = $rows['Staff_Id'];

        $staff_name = null;

        $query2 = $conn->prepare("SELECT Person_NIC FROM admin_staff WHERE Ad_ID='$staff_id';");
        $query2->execute();
        $row1= $query2->fetch(PDO::FETCH_ASSOC);


        if($row1['Person_NIC']==null){
            $query3 = $conn->prepare("SELECT Person_NIC FROM aca_staff WHERE Ac_ID='$staff_id';");
            $query3->execute();
            $row2= $query3->fetch(PDO::FETCH_ASSOC);
            $staff_nic = $row2['Person_NIC'];

            $query4 = $conn->prepare("SELECT * FROM person WHERE NIC='$staff_nic';");
            $query4->execute();
            $row3= $query4->fetch(PDO::FETCH_ASSOC);

            $fname = $row3['FirstName'];
            $lname = $row3['LastName'];

            $staff_name = $fname." ".$lname ;

        }
        else{
            $staff_nic = $row1['Person_NIC'];

            $query5 = $conn->prepare("SELECT * FROM person WHERE NIC='$staff_nic';");
            $query5->execute();
            $row4= $query5->fetch(PDO::FETCH_ASSOC);

            $fname = $row4['FirstName'];
            $lname = $row4['LastName'];

            $staff_name = $fname." ".$lname ;
        }


    ?>
        <section class="news">
            <span class="news_img">
                <img src="/ACTA_project/res/image/user.png" height="80" width="80">
            </span>
            <div class="media">
                <div class="media_topic">
                    <div class="topic_head">
                        <p><?php echo $n_topic; ?></p>
                    </div>
                    <div class="sender">
                        <p class="s_name"><?php echo $staff_name;?></p>
                        <p class="s_date"><?php echo $n_date;?></p>
                    </div>
                </div>
                <div class="media_news">
                    <p> <?php echo $n_desc;?></p>

                </div>
            </div>

        </section>
        <div class="inline"></div>


    <?php
    }
    ?>
</div>
</div>