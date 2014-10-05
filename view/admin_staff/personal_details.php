<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 9/28/14
 * Time: 11:13 AM
 */
require_once("../../conn/db_conn.php");


        //$u_nic = $_SESSION['p_nic'];

        $u_nic = "123456789v";

        $db = DB_conn::conn();

        $query = $db->prepare('SELECT * FROM person WHERE NIC = :u_nic');
        $query->bindValue(':u_nic',$u_nic,PDO::PARAM_STR);
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

        $query1 = $db->prepare('SELECT * FROM admin_staff WHERE Person_NIC = :u_nic');
        $query1->bindValue(':u_nic',$u_nic,PDO::PARAM_STR);
        $query1->execute();

        $data1 = $query1->fetchObject();
        $a_id = $data1->Ad_ID;
        $enroll_date= $data1->Enroll_Date;



?>

<body>
<div class="panel_upper">
    <p>Manage Details</p>
</div>
<div class="panel" id="panel">
    <table class="table1">
        <tr class="row1">
            <td><label>Staff ID :</label></td>
            <td><label><?php echo $a_id; ?></label></td>
        </tr>
        <tr class="row2">
            <td><label>NIC :</label></td>
            <td><label><?php echo $nic1; ?></label></td>
        </tr>
        <tr class="row1">
            <td><label>Title :</label></td>
            <td><label><?php echo $title; ?></label></td>
        </tr>
        <tr class="row2">
            <td><label>First Name :</label></td>
            <td><label><?php echo $fname; ?></label></td>
        </tr>
        <tr class="row1">
            <td><label>Last Name :</label></td>
            <td><label><?php echo $lname; ?></label></td>
        </tr>
        <tr class="row2">
            <td><label>Address :</label></td>
            <td><label><?php echo $street; ?></label></td>
        </tr>
        <tr class="row1">
            <td><label>District :</label></td>
            <td><label><?php echo $city; ?></label></td>
        </tr>
        <tr class="row2">
            <td><label>Postal Code :</label></td>
            <td><label><?php echo $p_code; ?></label></td>
        </tr>
        <tr class="row1">
            <td><label>Email :</label></td>
            <td><label><?php echo $email; ?></label></td>
        </tr>
        <tr class="row2">
            <td><label>Phone No :</label></td>
            <td><label><?php echo $p_no; ?></label></td>
        </tr>
        <tr class="row1">
            <td><label>Mobile No :</label></td>
            <td><label><?php echo $m_no; ?></label></td>
        </tr>
        <tr class="row2">
            <td><label>Enroll Date :</label></td>
            <td><label><?php echo $enroll_date; ?></label></td>
        </tr>
    </table>
</div>
</body>