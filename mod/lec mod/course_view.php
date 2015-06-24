<html>
<head>
    <link rel="stylesheet"  href="/ACTA_project/res/css/content.css">
    <link rel="stylesheet"  href="/ACTA_project/res/css/admin.css">
</head>

<?php
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
                    <p>Course Details </p>
                    </div>";

            echo "No subjects";
        }

        else{
            echo "<div class='panel' id='panel'>
                    <div class='panel_bar' >
                    <p>Course Details </p>
                    </div>";

            echo "<table class='table1'>";
            echo "<tr class='row2'>";
            echo "<th class='row_label'> Subject ID </th>";
            echo "<th class='row_label'> Subject Name </th>";
            echo "<th class='row_label'> Credits </th>";
            echo "<th class='row_label'> Description </th>";
            echo "<th class='row_label'> Course ID</th>";
            echo "</tr>";

            foreach($row as $d){

                echo "<tr class='row1'>";
                echo "<td class='row_label'>$d[0]</td>";//subject ID
                echo "<td class='row_label'>$d[1]</td>";//Subject Name
                echo "<td class='row_label'>$d[2]</td>";//Description
                echo "<td class='row_label'>$d[3]</td>";
                echo "<td class='row_label'>$d[4]</td>";//Assigned lecturer
                echo "</tr>";
            }
            echo "</table>";
        }

    }
}
?>
</div>
</body>
</html>