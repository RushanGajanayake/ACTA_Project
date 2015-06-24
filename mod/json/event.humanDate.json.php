<?php
header('Content-type: text/json');
require_once("../../conn/db_conn.php");


echo '[';
$separator = "";


$i = 1;
echo $separator;
$initTime = date("Y")."-".date("m")."-".date("d")." ".date("H").":00:00";


$conn = new DB_conn();


$query= $conn->prepare("SELECT * FROM event");
$query->execute();


while($row = $query->fetch(PDO::FETCH_ASSOC)){
    $e_name = $row["Event_Name"];
    $e_date = $row["Date"];
    $e_time = $row["Time"];
    $e_descp = $row["Description"];

    $date = $e_date." ".$e_time ;

    $arr =array('date'=>$date,'type'=>" ",'title'=>$e_name,'description'=>$e_descp,'url'=>"");
    echo json_encode($arr);
    echo ",";


}
    echo '  { "date": "'; echo date("Y-m-d H:i:00"); echo '", "type": "", "title": " '; echo '", "description": "", "url": "" }';



$separator = ",";

echo ']';
?>