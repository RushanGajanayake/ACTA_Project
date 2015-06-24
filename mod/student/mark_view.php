<html>
<head>
    <link rel="stylesheet"  href="/ACTA_project/res/css/content.css">
    <link rel="stylesheet"  href="/ACTA_project/res/css/admin.css">

</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Amali
 * Date: 10/8/14
 * Time: 10:58 AM
 */

require_once("../../conn/db_conn.php");

class Mark{
    private $dbConnection;

    public function getDropDown(){

        $this->dbConnection = DB_conn::conn();
        $data1 = $this->dbConnection->prepare("SELECT * FROM course");
        $data1->execute();
        $row1 = $data1->fetchAll();
        if(empty($row1)){
            echo "<div class='panel_body'>
                        <div class='panel_bar'><p>Marks</p>
                        </div>
                        <div class='panel_body_cont'>";
            echo "no subjects";
            echo "</div></div></div>";
        }
        else{


            foreach($row1 as $d){
                echo '<option value="'.$d[0].'">'.$d[0].'</option>';
            }

        }


    }



    public function test($cors){
        $this->dbConnection = DB_conn::conn();
        $data1 = $this->dbConnection->prepare("SELECT * FROM subject WHERE Course_Course_ID = '{$cors}'");
        $data1->execute();
        $row1 = $data1->fetchAll();
        $username=$_SESSION['user_name'];
        if ($row1!= null){

            echo "<table class='table1'>";
            echo "<tr class='row2'>";
            echo "<th class='row_label'> Subject ID </th>";
            echo "<th class='row_label'> Mark </th>";
            echo "</tr>";
            foreach($row1 as $d){
                $subid = $d[0];
                $data2 = $this->dbConnection->prepare("SELECT * FROM marks WHERE Sub_ID = '{$subid}' AND  Student_ID = '{$username}'");
                $data2->execute();

                foreach($data2 as $d1){
                    echo "<tr class='row1'>";
                    echo "<th class='row_label'> $d1[1] </th>";
                    echo "<th class='row_label'> $d1[3]</th>";
                    echo "</tr>";

                }

            }
        }
        else{
            echo '<p style="color:#e40005;  margin-left: 20px; text-align:center; font-family: Century Gothic; font-size:22px;background-color: #ffebe8;padding: 25px;margin: 25px; border-style: solid; border-color:#dd3c10 ">No data</p>';
        }
        $link = "myFunction1('/ACTA_project/view/student/stu_home.php')";
        echo "<table class='table1'>
                <tr >
                <td><button class='button1' onclick=".$link.">Back </button></td>
                <td></td>
                 </tr>
                </table>";
    }
}

?>

</body>
</html>
