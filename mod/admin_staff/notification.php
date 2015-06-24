<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 1/15/15
 * Time: 11:28 PM
 */
include("../../ctrl/queries.php");
require_once("../../conn/db_conn.php");

class notification {

    public function __construct(){

        if(isset($_POST['send_n'])){

            $admin_ID = $_POST['admin_ID'];
            $n_date = $_POST['n_date'];
            $viewer1 = $_POST['viewer1'];
            $viewer2 = $_POST['viewer2'];
            $n_subject = $_POST['n_subject'];
            $n_desc = $_POST['n_desc'];

            $p_level = $this->privilege_level($viewer1,$viewer2);

            $arry = array('',$n_date,$n_subject,$n_desc,$p_level,$admin_ID);
            $this->add('notification',$arry);

            include("../../view/admin_staff/notifications.php");

        }
        elseif(isset($_POST['send_msg'])){

            $to=$_POST['search'];
            $from = $_POST['msg_from'];
            $msg = $_POST['msg'];


            $piece = explode(" ",$to);
            $to= $piece[0];
            $to= $this->getNIC($to);


            $arry1 = array('',$to,$from,$msg);

            $this->send_msg('messages',$arry1);

            include("../../mod/admin_staff/messages.php");
        }
        elseif(isset($_POST['send_rply_msg'])){

            $to=$_POST['search'];
            $from = $_POST['msg_from'];
            $msg = $_POST['msg'];



            $arry1 = array('',$to,$from,$msg);

            $this->send_msg('messages',$arry1);

//            include("../../view/admin_staff/notifi_inbox.php");
        }


    }

    private function add($table,$values){
        $query_add = new mysqlQuery();

        if($query_add->insert($table,$values,$row=null)==true){

        }
        else{
            echo 'not entered';
        }
    }

    private function privilege_level($v1,$v2){

        if(is_numeric($v1)&& ($v2==" "||$v2=="")){
            return $v1;
        }
        elseif(is_numeric($v2)&& ($v1==" "||$v1=="")){
            return $v2;
        }
        elseif($v1==$v2){
            return $v1;
        }
        elseif(($v1==2 && $v2==3)||($v1==3 && $v2==2)){
            return 6;
        }
        elseif(($v1==2 && $v2==4)||($v1==4 && $v2==2)){
            return 7;
        }
        elseif(($v1==3 && $v2==4)||($v1==4 && $v2==3)){
            return 8;
        }
        else{
            return 5;
        }
    }

    private function send_msg($table,$value){
        $query_add = new mysqlQuery();

        if($query_add->insert($table,$value,$row=null)==true){

        }
        else{
            echo 'not entered';
        }
    }

    private function getNIC($id){
        $conn = DB_conn::conn();

        $users = array('student','aca_staff','admin_staff','parent');
        $userids = array('Student_ID','Ac_ID','Ad_ID','Student_ID');

        $nic =null;

        for($i=0;$i<4;$i++){
            $username= $users[$i];
            $userid= $userids[$i];

            $qry = $conn->prepare("SELECT * FROM person INNER JOIN {$username} ON person.NIC = {$username}.Person_NIC WHERE {$username}.{$userid}='$id'");
            $qry->execute();
            $row= $qry->fetch(PDO::FETCH_ASSOC);

            if($row['NIC']!=null){
                $nic = $row['NIC'];
                break;
            }

        }



        return $nic;
    }

}

$n = new notification();


?>