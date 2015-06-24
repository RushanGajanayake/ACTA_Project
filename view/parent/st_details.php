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
    $id= new Users();
    $n = $id->getUserData($u_nic,'parent');
    $p_id = $n->Student_ID;
    $replace = "P/";
    $student_id = str_replace($replace,'',$p_id);

    $stu = new Users();
    $stu_data = $stu->usersPersonalData($student_id,'student','Student_ID');

    $s_nic = $stu_data->Person_NIC;
    $re_date = $stu_data->Reg_Date;
    $c_id = $stu_data->Course_Course_ID;

    $stu_personal_data = $id->usersPersonalData($s_nic,'person','NIC');

    $nic1 = $stu_personal_data->NIC;
    $title = $stu_personal_data->Title;
    $fname = $stu_personal_data->FirstName;
    $lname = $stu_personal_data->LastName;
    $street = $stu_personal_data->Street;
    $city = $stu_personal_data->City;
    $p_code = $stu_personal_data->PostalCode;
    $email = $stu_personal_data->Email;
    $p_no = $stu_personal_data->PhoneNo;
    $m_no = $stu_personal_data->MobileNo;

    $c = new Users();
    $course_data = $c->usersPersonalData($c_id,'course','Course_ID');

    $c_name = $course_data->Name;


    ?>

    <table class="table1">
        <tr class="row1">
            <td class="row_label"><label>Student ID </label></td>
            <td class="label1"><label><?php echo $student_id; ?></label></td>
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
    </div>
    </div>

    <table class="table1">
        <tr >
            <td><button class="button1" onclick="myFunction1('/ACTA_project/view/parent/parent_details.php')">Back </button></td>
            <td></td>
        </tr>
    </table>
</div>
</body>