
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Rushan Gajanayake-->
<!-- * Date: 9/28/14-->
<!-- * Time: 11:13 AM-->
<!-- */-->


<body>
<div class="panel_upper">
    <p>Personal Details</p>
</div>
<div class="panel" id="panel">
    <div class="panel_body">
        <div class="panel_bar" >
        </div>
        <div class="panel_body_cont">
    <?php
        require_once("../../conn/db_conn.php");

                session_start();


                $u_nic = $_SESSION['p_nic'];

//                $u_nic = "123456789v";

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

    <table class="table1">
        <tr class="row1">
            <td class="row_label"><label>Staff ID :</label></td>
            <td class="label1"><label><?php echo $a_id; ?></label></td>
        </tr>
        <tr class="row2">
            <td class="row_label"><label>Title :</label></td>
            <td class="label1"><label><?php echo $title; ?></label></td>
        </tr>
        <tr class="row1">
            <td class="row_label"><label>First Name :</label></td>
            <td class="label1"><label><?php echo $fname; ?></label></td>
        </tr>
        <tr class="row2">
            <td class="row_label"><label>Last Name :</label></td>
            <td class="label1"><label><?php echo $lname; ?></label></td>
        </tr>
        <tr class="row1">
            <td class="row_label"><label>NIC :</label></td>
            <td class="label1"><label><?php echo $nic1; ?></label></td>
        </tr>
        <tr class="row2">
            <td class="row_label"><label>Address :</label></td>
            <td class="label1"><label><?php echo $street; ?></label></td>
        </tr>
        <tr class="row1">
            <td class="row_label"><label>District :</label></td>
            <td class="label1"><label><?php echo $city; ?></label></td>
        </tr>
        <tr class="row2">
            <td class="row_label"><label>Postal Code :</label></td>
            <td class="label1"><label><?php echo $p_code; ?></label></td>
        </tr>
        <tr class="row1">
            <td class="row_label"><label>Email :</label></td>
            <td class="label1"><label><?php echo $email; ?></label></td>
        </tr>
        <tr class="row2">
            <td class="row_label"><label>Phone No :</label></td>
            <td class="label1"><label><?php echo $p_no; ?></label></td>
        </tr>
        <tr class="row1">
            <td class="row_label"><label>Mobile No :</label></td>
            <td class="label1"><label><?php echo $m_no; ?></label></td>
        </tr>
        <tr class="row2">
            <td class="row_label"><label>Enroll Date :</label></td>
            <td class="label1"><label><?php echo $enroll_date; ?></label></td>
        </tr>

    </table>
            </div>
        </div>
</div>
</body>