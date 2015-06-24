<html>
<head>
    <link rel="stylesheet"  href="/ACTA_project/res/css/content.css">
    <link rel="stylesheet"  href="/ACTA_project/res/css/admin.css">
</head>

<?php
/**
 * Created by PhpStorm.
 * User: Amali
 * Date: 10/8/14
 * Time: 2:18 PM
 */
require_once("../../conn/db_conn.php");


class Course{
    private $dbConnection = null;




    public function getCourse($query,$course){ //get course details

        $this->dbConnection = DB_conn::conn();

        $data = $this->dbConnection->prepare($query);
        $data->execute();
        $row = $data->fetchAll();
        if(empty($row)){
            echo "<div class='panel' id='panel'>
                    <div class='panel_bar' >
                    <p>$course </p>
                    </div>";

            echo "no subjects";
        }

        else{
            $data1 = $this->dbConnection->prepare("SELECT * FROM course WHERE Course_ID = '{$course}'");
            $data1->execute();
            $row1 = $data1->fetch();
            $co = $row1['Name'];

            echo "<div class='panel' id='panel'>
                    <div class='panel_bar' >
                    <p>$co</p>
                    </div>";
            echo "<table class='table1'>";
            echo "<tr class='row2'>";
            echo "<th class='row_label'> Subject Id </th>";
            echo "<th class='row_label'> Subject Name </th>";
            echo "<th class='row_label'> Credits </th>";
            echo "<th class='row_label'> Description </th>";
            echo "<th class='row_label'> Lecturer Name </th>"; /* changed*/
            echo "</tr>";

            foreach($row as $d){

                echo "<tr class='row1'>";
                echo "<td class='row_label'>$d[Sub_ID]</td>";//subject ID
                echo "<td class='row_label'>$d[Sub_Name]</td>";//Subject Name
                echo "<td class='row_label'>$d[Sub_credit]</td>";//Description
                echo "<td class='row_label'>$d[discription]</td>";//Description
                $acc = $d['Aca_Staff_Ac_ID'];
                $data2 = $this->dbConnection->prepare("SELECT * FROM aca_staff WHERE Ac_ID = '{$acc}'");
                $data2->execute();
                $row2 = $data2->fetch();
                $co1 = $row2['Person_NIC'];
                $data3 = $this->dbConnection->prepare("SELECT * FROM person WHERE NIC = '{$co1}'");
                $data3->execute();
                $row3 = $data3->fetch();
                $co2 = $row3['Title'];
                $co4 = $row3['LastName'];
                $name = $co2.".".$co4;
                echo "<td class='row_label'>$name</td>";


                echo "</tr>";
            }
            echo "</table>";
        }
        $link = "myFunction1('/ACTA_project/view/student/stu_course.php')";
        echo "<table class='table1'>
                <tr >
                <td><button class='button1' onclick=".$link.">Back </button></td>
                <td></td>
                 </tr>
                </table>";

    }
}
?>

</div>
</body>
</html>