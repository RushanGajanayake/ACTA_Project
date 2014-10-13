<!--
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/13/14
 * Time: 6:42 PM
 */
-->

<body>
<div class="panel_upper">
    <div class="p0">
        <label class="p1">Personal Details  ></label>
        <label class="p2">Student</label>
    </div>
<div class="panel" id="panel">
    <?php
    require_once("../../conn/db_conn.php");

    session_start();


    $u_nic = $_SESSION['p_nic'];

    $db = DB_conn::conn();

    $query1 = $db->prepare('SELECT * FROM parent WHERE Person_NIC = :u_nic');
    $query1->bindValue(':u_nic',$u_nic,PDO::PARAM_STR);
    $query1->execute();

    $data1 = $query1->fetchObject();
    $st_id = $data1->Student_ID;

    $query2 = $db->prepare('SELECT * FROM Student WHERE Student_ID = :st_id');
    $query2->bindValue(':st_id',$st_id,PDO::PARAM_STR);
    $query2->execute();

    $data2 = $query2->fetchObject();
    $s_nic = $data2->Person_NIC;
    $dob = $data2->DateOfBirth;
    $re_date = $data2->Reg_Date;
    $c_id = $data2->Course_Course_ID;

    $query = $db->prepare('SELECT * FROM person WHERE NIC = :s_nic');
    $query->bindValue(':s_nic',$s_nic,PDO::PARAM_STR);
    $query->execute();

    $data = $query->fetchObject();
    $nic1 = $data->NIC;
    $title = $data->Title;
    $fname = $data->FirstName;
    $lname = $data->LastName;
    $street = $data->Street;
    $city = $data->City;
    $p_code = $data->PostalCode;
    $email = $data->Email;
    $p_no = $data->PhoneNo;
    $m_no = $data->MobileNo;




    $query3 = $db->prepare('SELECT * FROM course WHERE Course_ID = :c_id');
    $query3->bindValue(':c_id',$c_id,PDO::PARAM_STR);
    $query3->execute();
    $data3 = $query3->fetchObject();
    $c_name = $data3->Name;


    ?>

    <table class="table1">
        <tr class="row1">
            <td class="row_label"><label>Student ID </label></td>
            <td class="label1"><label><?php echo $st_id; ?></label></td>
        </tr>
        <tr class="row2">
            <td class="row_label"><label>Title</label></td>
            <td class="label1"><label><?php echo $title; ?></label></td>
        </tr>
        <tr class="row1">
            <td class="row_label"><label>First Name </label></td>
            <td class="label1"><label><?php echo $fname; ?></label></td>
        </tr>
        <tr class="row2">
            <td class="row_label"><label>Last Name </label></td>
            <td class="label1"><label><?php echo $lname; ?></label></td>
        </tr>
        <tr class="row1">
            <td class="row_label"><label>NIC </label></td>
            <td class="label1"><label><?php echo $nic1; ?></label></td>
        </tr>
        <tr class="row2">
            <td class="row_label"><label>Address</label></td>
            <td class="label1"><label><?php echo $street; ?></label></td>
        </tr>
        <tr class="row1">
            <td class="row_label"><label>District </label></td>
            <td class="label1"><label><?php echo $city; ?></label></td>
        </tr>
        <tr class="row2">
            <td class="row_label"><label>Postal Code </label></td>
            <td class="label1"><label><?php echo $p_code; ?></label></td>
        </tr>
        <tr class="row1">
            <td class="row_label"><label>Email </label></td>
            <td class="label1"><label><?php echo $email; ?></label></td>
        </tr>
        <tr class="row2">
            <td class="row_label"><label>Phone No </label></td>
            <td class="label1"><label><?php echo $p_no; ?></label></td>
        </tr>
        <tr class="row1">
            <td class="row_label"><label>Mobile No </label></td>
            <td class="label1"><label><?php echo $m_no; ?></label></td>
        </tr>
        <tr class="row2">
            <td class="row_label"><label>Registered Date </label></td>
            <td class="label1"><label><?php echo $re_date; ?></label></td>
        </tr>
        <tr class="row1">
            <td class="row_label"><label>Course </label></td>
            <td class="label1"><label><?php echo $c_name; ?></label></td>
        </tr>

    </table>

    <table class="table1">
        <tr >
            <td><button class="button1" onclick="myFunction1('/ACTA_project/view/parent/parent_details.html')">Back </button></td>
            <td></td>
        </tr>
    </table>
</div>
</body>