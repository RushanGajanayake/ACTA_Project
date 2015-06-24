<!--
/**
 * Created by PhpStorm.
 * User: Amali
 * Date: 10/8/14
 * Time: 10:36 AM
 */
 -->


<html>
<head>
    <link rel="stylesheet"  href="/ACTA_project/res/css/content.css">
    <link rel="stylesheet"  href="/ACTA_project/res/css/admin.css">
</head>
<body>
<div class="panel_upper">
    <p>Marks</p>
</div>
<div class="panel" id="panel">
    <?php
    require_once("../../conn/db_conn.php");

    $mark = new Mark1();
    $mark->getMark();

    class Mark1{
        private $dbConnection = null;
    public function getMark(){
        session_start();
        $username=$_SESSION['user_name'];
        $this->dbConnection = DB_conn::conn();
        $data1 = $this->dbConnection->prepare("SELECT * FROM student WHERE Student_ID = '{$username}'");
        $data1->execute();
        $row1 = $data1->fetch();
        $course = $row1['Course_Course_ID'];

        $data2 = $this->dbConnection->prepare("SELECT * FROM subject WHERE Course_Course_ID = '{$course}'");
        $data2->execute();
        $row2 = $data2->fetchAll();

        if ($row2!= null){
            echo "<div class='panel_body'>
                        <div class='panel_bar'><p>All Marks</p>
                        </div>
                        <div class='panel_body_cont'>";
            echo "<table class='table1'>";
            echo "<tr class='row2'>";
            echo "<th class='row_label'> Subject ID </th>";
            echo "<th class='row_label'> Subject Name </th>";
            echo "<th class='row_label'> Mark </th>";
            echo "</tr>";
            foreach($row2 as $d){
                $subid = $d[0];
                $data2 = $this->dbConnection->prepare("SELECT * FROM marks WHERE Sub_ID = '{$subid}' AND  Student_ID = '{$username}'");
                $data2->execute();

                foreach($data2 as $d1){
                    echo "<tr class='row1'>";
                    echo "<th class='row_label'> $d1[Sub_ID] </th>";
                    $sub = $d['Sub_ID'];

                    $data3 = $this->dbConnection->prepare("SELECT * FROM subject WHERE Sub_ID = '{$sub}'");
                    $data3->execute();
                    $row2 = $data3->fetch();
                    echo "<th class='row_label'> $row2[1]</th>";
                    echo "<th class='row_label'> $d1[3]</th>";
                    echo "</tr>";

                }
            }
            echo "</table></div></div>";
        }
        else{
            echo '<p style="color:#e40005;  margin-left: 20px; text-align:center; font-family: Century Gothic; font-size:22px;background-color: #ffebe8;padding: 25px;margin: 25px; border-style: solid; border-color:#dd3c10 ">No data</p>';
        }
    }


    }
    $link = "myFunction1('/ACTA_project/view/student/stu_home.php')";
    echo "<table class='table1'>
                <tr >
                <td><button class='button1' onclick=".$link.">Back </button></td>
                <td></td>
                 </tr>
                </table></div>";
    ?>

</div>
</body>
</html>