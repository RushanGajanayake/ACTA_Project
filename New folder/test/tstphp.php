<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/19/14
 * Time: 9:35 PM
 */
require_once("../../conn/db_conn.php");

$conn = DB_conn::conn();

if($_POST)
{
    $q=$_POST['search'];

    $qry = $conn->prepare("SELECT * FROM person WHERE FirstName LIKE '%$q%'");
    $qry->execute();


    while($row= $qry->fetch(PDO::FETCH_ASSOC)){
//        echo "<tr>";
//        echo "<td>".$row['FirstName']."</td>";
//        echo "</tr>";
        $final_username = $row['FirstName'];






//if(empty($row)){
//    echo "<tr>";
//    echo "<td colspan='4'>There were not records</td>";
//    echo "</tr>";
//}
//
//else {
//    foreach ($row as $rows) {
//        echo "<tr>";
//        echo "<td>".$row['Name']."</td>";
//        echo "<td>".$row['Details']."</td>";
//        echo "</tr>";
//    }
//}

?>
    <div class="show" align="left">
       <span class="name1" id="name1"><?php echo $final_username; ?></span>&nbsp;<br/>
    </div>
<?php
    }


}
?>