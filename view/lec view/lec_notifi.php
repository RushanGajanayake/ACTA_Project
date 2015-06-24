<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 1/19/15
 * Time: 12:38 PM
 */

require_once("../../conn/db_conn.php");
require_once("../../ctrl/notifi.php");

session_start();

$nic = $_SESSION['p_nic'];
$id = new notifi();
$n= $id->getUser($nic,'aca_staff');
$p_id = $n->Ac_ID;

?>


<table class="table1">
    <tr >
        <td><button class="button1" onclick="myFunction1('/ACTA_project/view/admin_staff/messages.php')">New </button></td>
        <!--        <td class="input_data"><input class="input data" type="text" name="admin_id" id="admin_id" value="--><?php //echo $p_id;?><!--" readonly="readonly"></td>-->

        <td></td>
    </tr>
</table>

<div class="msgs">

    <?php

    $msgs = $id->getMsg($nic);
    $ln = count($msgs);

    for($i=0;$i<$ln;$i++){
        $sender_name= $msgs[$i][0];
        $message= $msgs[$i][2];

        ?>
        <div class="msg_section">
            <div class="avetar">
                <img class="setpic" src="/ACTA_project/res/image/09-user.png"  height="40" width="40" >
            </div>
            <div class="msg">
                <div class="msg_sender">
                    <p><?php echo $sender_name;?></p>
                </div>
                <div class="msg_cont">
                    <p><?php echo $message;?></p>
                    <button class="reply" onclick="myFunction1('/ACTA_project/view/admin_staff/messages.php')">Reply </button>
                </div>

            </div>
        </div>

    <?php
    }
    ?>

</div>