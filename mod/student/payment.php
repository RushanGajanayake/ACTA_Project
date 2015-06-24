

<?php
/**
 * Created by PhpStorm.
 * User: Amali
 * Date: 10/8/14
 * Time: 4:21 PM
 */

require_once("../../conn/db_conn.php");

class Payment{
    private $dbConnection;
    public function newBalance($query){
        //new balance
        $this->dbConnection = DB_conn::conn();
        $data = $this->dbConnection->prepare($query);
        $data->execute();
        $row = $data->fetch();

        /*$datetime1 = new DateTime($row[2]);
        $datetime2 = new DateTime(date("Y-m-d"));
        $interval = $datetime2->diff($datetime1);
        $due = $interval->format('%a');*/
        $date1 = $row[2];
        $date2 = date("Y-m-d");

        $diff = abs(strtotime($date2) - strtotime($date1));

        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

        $due = "Y: ".$years." M: ".$months." D: ".$days;

        if(empty($row)){
            echo "<div class='panel'><div class='panel_body'>
                        <div class='panel_bar'><p>New Balance</p>
                        </div>
                        <div class='panel_body_cont'>";
            echo "no payment";
                        echo "</div></div>";
        }
        else{
            echo "<div class='panel'><div class='panel_body'>
                        <div class='panel_bar'><p>New Balance</p>
                        </div>
                        <div class='panel_body_cont'>";
            echo "<table class='table1'>";
            echo "<tr class='row2'>";
            echo "<th class='row_label'> Course </th>";
            echo "<th class='row_label'> Due Date </th>"; #not implement that,,use paid date
            echo "<th class='row_label'> Due Amount </th>";
            echo "</tr>";

            echo "<tr class='row1'>";
            echo "<td class='row_label'>$row[1]</td>";
            echo "<td class='row_label'>$due</td>";
            echo "<td class='row_label'>$row[4]</td>";
            echo "</tr>";
            echo "</table></div></div>";
        }




    }

    public function payStatement($query){
        //pay statement
        $this->dbConnection = DB_conn::conn();
        $data = $this->dbConnection->prepare($query);
        $data->execute();
        $row = $data->fetch();
        if(empty($row)){
            echo "<div class='panel_body'>
                        <div class='panel_bar'><p>New Balance</p>
                        </div>
                        <div class='panel_body_cont'>";
            echo "no payment";
            echo "</div></div></div>";
        }
        else{
            echo "<div class='panel_body'>
                        <div class='panel_bar'><p>Pay Statement</p>
                        </div>
                        <div class='panel_body_cont'>";
            echo "<table class='table1'>";
            echo "<tr class='row2'>";
            echo "<th class='row_label'> Course </th>";
            echo "<th class='row_label'> Paid Date </th>";
            echo "<th class='row_label'> Paid Amount </th>";
            echo "</tr>";

            echo "<tr class='row1'>";
            echo "<td class='row_label'>$row[1]</td>";
            echo "<td class='row_label'>$row[2]</td>";
            echo "<td class='row_label'>$row[3]</td>";
            echo "</tr>";
            echo "</table></div></div></div>";
        }




    }
}
?>
