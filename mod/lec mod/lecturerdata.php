<html>
<head>
    <link rel="stylesheet"  href="/ACTA_project/res/css/content.css">
    <link rel="stylesheet"  href="/ACTA_project/res/css/admin.css">

</head>
<body>

<?php
require_once("../../conn/db_conn.php");
class Lecturer{
    public function query($query,$want){

        $dbconnection = DB_conn::conn();
        $data = $dbconnection->prepare($query);
        $data->execute();
        $row = $data->fetch();
        $need = $row[$want]; #person nic of authen table
        //$_SESSION["NIC"] = $need;
        if($need!=null){
            $data2 = $dbconnection->prepare("SELECT * FROM person WHERE NIC = '{$need}'");
            $data2->execute();
            $row2 = $data2->fetch();
            $need2 = $row2["NIC"]; #NIC of student from person table
            $t = $row2["Title"];
            $f = $row2["FirstName"];
            $l = $row2["LastName"];
            $s = $row2["Street"];
            $c = $row2["City"];
            $p = $row2["PostalCode"];
            $e = $row2["Email"];
            $pn = $row2["PhoneNo"];
            $mn = $row2["MobileNo"];
            $un = $_SESSION["user_name"];

            if($need2!=null){
                $data3 = $dbconnection->prepare("SELECT * FROM aca_staff WHERE Person_NIC = '{$need}'");
                $data3->execute();
                $row3 = $data3->fetch();
                $need3 = $row3["Person_NIC"];
                $desg = $row3["Designation"];
                $endate = $row3["Enroll_Date"];

                echo "<table class='table1'>";
                echo "<tr class='row1'>";
                echo "<td class='row_label'> Acadamic Staff ID </td>";
                echo "<td class='input_data'><input class='input data' type='text'  value= $un readonly='readonly'></td>";
                echo "</tr>";

                echo "<tr class='row1'>";
                echo "<td class='row_label'> NIC </td>";
                echo "<td class='input_data'><input class='input data' type='text'  value= $need2 readonly='readonly'></td>";
                echo "</tr>";

                echo "<tr class='row1'>";
                echo "<td class='row_label'> Title </td>";
                echo "<td class='input_data'><input class='input data' type='text'  value= $t readonly='readonly'></td>";
                echo "</tr>";

                echo "<tr class='row1'>";
                echo "<td class='row_label'> First Name </td>";
                echo "<td class='input_data'><input class='input data' type='text'  value= $f readonly='readonly'></td>";
                echo "</tr>";

                echo "<tr class='row1'>";
                echo "<td class='row_label'> Last Name </td>";
                echo "<td class='input_data'><input class='input data' type='text'  value= $l readonly='readonly'></td>";
                echo "</tr>";

                echo "<tr class='row1'>";
                echo "<td class='row_label'> Street </td>";
                echo "<td class='input_data'><input class='input data' type='text'  value= $s readonly='readonly'></td>";
                echo "</tr>";

                echo "<tr class='row1'>";
                echo "<td class='row_label'> City </td>";
                echo "<td class='input_data'><input class='input data' type='text'  value= $c readonly='readonly'></td>";
                echo "</tr>";

                echo "<tr class='row1'>";
                echo "<td class='row_label'> Postal Code </td>";
                echo "<td class='input_data'><input class='input data' type='text'  value=$p readonly='readonly'></td>";
                echo "</tr>";

                echo "<tr class='row1'>";
                echo "<td class='row_label'> Email </td>";
                echo "<td class='input_data'><input class='input data' type='text'  value= $e readonly='readonly'></td>";
                echo "</tr>";

                echo "<tr class='row1'>";
                echo "<td class='row_label'> Phone No </td>";
                echo "<td class='input_data'><input class='input data' type='text'  value= $pn readonly='readonly'></td>";
                echo "</tr>";

                echo "<tr class='row1'>";
                echo "<td class='row_label'> Mobile No </td>";
                echo "<td class='input_data'><input class='input data' type='text'  value= $mn readonly='readonly'></td>";
                echo "</tr>";

                echo "<tr class='row1'>";
                echo "<td class='row_label'> Designation </td>";
                echo "<td class='input_data'><input class='input data' type='text'  value= $desg readonly='readonly'></td>";
                echo "</tr>";

                echo "<tr class='row1'>";
                echo "<td class='row_label'> Enroll Date </td>";
                echo "<td class='input_data'><input class='input data' type='text'  value= $endate readonly='readonly'></td>";
                echo "</tr>";

                echo "</table>";


            }
            else{
                echo "No Lecturer record";
            }
        }
        else{
            echo "No Lecturer record";
        }
    }
}
?>
</body>
</html>