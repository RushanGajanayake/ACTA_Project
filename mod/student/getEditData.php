<?php
require_once("../../conn/db_conn.php");

class Student1{
    private $dbConnection;

    public  function query($query,$want,$num){
        $this->dbConnection = DB_conn::conn();
        $data = $this->dbConnection->prepare($query);
        $data->execute();
        $row = $data->fetch();
        $need = $row[$want]; #NIC no of Student(authen table)
        if($need!= null){
            $data2 = $this->dbConnection->prepare("SELECT * FROM person WHERE NIC = '{$need}'");
            $data2->execute();
            $row2 = $data2->fetch();
            $need2 = $row2["NIC"];#NIC no of Student(person table)
            if($need2!=null){
                $data3 = $this->dbConnection->prepare("SELECT * FROM student WHERE Person_NIC = '{$need}'");
                $data3->execute();
                $row3 = $data3->fetch();
                if($num==1){return $row2["Street"];}
                if($num==2){return $row2["City"];}
                if($num==3){return $row2["PostalCode"];}
                if($num==4){return $row2["Email"];}
                if($num==5){return $row2["PhoneNo"];}
                if($num==6){return $row2["MobileNo"];}
                if($num==7){return $row3["Company"];}
                if($num==8){return $row3["Office_address"];}
                if($num==9){return $row3["Office_TelNo"];}



            }
        }
    }

    public function setData($str,$cit,$pos,$eml,$pno,$mno,$cname,$caddr,$cno){
        $this->dbConnection = DB_conn::conn();

        $username=$_SESSION['user_name'];
        $data2 = $this->dbConnection->prepare("SELECT * FROM authen WHERE user_name = '{$username}'");
        $data2->execute();
        $row2 = $data2->fetch();
        $need1 = $row2["Person_NIC"];
        $query1 = $this->dbConnection->prepare("UPDATE person SET Street = '{$str}', City = '{$cit}',PostalCode = '{$pos}',Email = '{$eml}',PhoneNo = '{$pno}',MobileNo = '{$mno}' WHERE NIC = '{$need1}'");
        $query1->execute();
        $query2 = $this->dbConnection->prepare("UPDATE student SET Company = '{$cname}', Office_address = '{$caddr}',Office_TelNo = '{$cno}' WHERE Person_NIC = '{$need1}'");
        $query2->execute();
        echo '<p style="color:#e40005;  margin-left: 20px; text-align:center; font-family: Century Gothic; font-size:22px;background-color: #ffebe8;padding: 25px;margin: 25px; border-style: solid; border-color:#dd3c10 ">Update Successful!!</p>';

    }
}

?>