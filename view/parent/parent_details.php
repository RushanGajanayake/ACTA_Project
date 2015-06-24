<!--
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/13/14
 * Time: 6:24 PM
 */

-->

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
    require_once("../../ctrl/users.php");

    session_start();


    $u_nic = $_SESSION['p_nic'];
    $details = new Users();
    $data = $details->usersPersonalData($u_nic,'person','NIC');

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


    ?>

    <table class="table1">
        <tr class="row1">
            <td class="row_label"><label>Title :</label></td>
            <td class="label1"><label><?php echo $title; ?></label></td>
        </tr>
        <tr class="row2">
            <td class="row_label"><label>First Name :</label></td>
            <td class="label1"><label><?php echo $fname; ?></label></td>
        </tr>
        <tr class="row1">
            <td class="row_label"><label>Last Name :</label></td>
            <td class="label1"><label><?php echo $lname; ?></label></td>
        </tr>
        <tr class="row2">
            <td class="row_label"><label>NIC :</label></td>
            <td class="label1"><label><?php echo $nic1; ?></label></td>
        </tr>
        <tr class="row1">
            <td class="row_label"><label>Address :</label></td>
            <td class="label1"><label><?php echo $street; ?></label></td>
        </tr>
        <tr class="row2">
            <td class="row_label"><label>District :</label></td>
            <td class="label1"><label><?php echo $city; ?></label></td>
        </tr>
        <tr class="row1">
            <td class="row_label"><label>Postal Code :</label></td>
            <td class="label1"><label><?php echo $p_code; ?></label></td>
        </tr>
        <tr class="row2">
            <td class="row_label"><label>Email :</label></td>
            <td class="label1"><label><?php echo $email; ?></label></td>
        </tr>
        <tr class="row1">
            <td class="row_label"><label>Phone No :</label></td>
            <td class="label1"><label><?php echo $p_no; ?></label></td>
        </tr>
        <tr class="row2">
            <td class="row_label"><label>Mobile No :</label></td>
            <td class="label1"><label><?php echo $m_no; ?></label></td>
        </tr>
    </table>
    <table class="table1">
        <tr >
            <td></td>
            <td><button class="button1" onclick="myFunction1('/ACTA_project/view/parent/st_details.php')">Student Profile</button></td>
        </tr>
    </table>
            </div>
        </div>

    <table class="table1">
        <tr >
            <td><button class="button1" onclick="myFunction1('/ACTA_project/view/prent/par_home.php')">Back </button></td>
            <td></td>
        </tr>
    </table>
</div>
</body>