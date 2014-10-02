<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 9/27/14
 * Time: 1:52 PM
 */

require_once("../../conn/db_conn.php");

$id = null;

if(isset($_POST['update'])){
    global $id;

    $id= $_POST['stu_Id'];
}
    $db = DB_conn::conn();

    $query1 = $db->prepare('SELECT * FROM student WHERE Student_ID = :id');
    $query1->bindValue(':id',$id,PDO::PARAM_STR);
    $query1->execute();

    $data1 = $query1->fetchObject();
    if(!isset($data1->Student_ID)){
        echo "Student ID number not exists";
        return false;
    }
    else{
        $st_id = $data1->Student_ID;
        $dob = $data1->DateOfBirth;
        $comp = $data1->Company;
        $comp_add = $data1->Office_address;
        $comp_pho = $data1->Office_TelNo;
        $reg_date = $data1->Reg_Date;
        $nic = $data1->Person_NIC;
        $c_id = $data1->Course_Course_ID;

    }




    $query2 = $db->prepare('SELECT * FROM person WHERE NIC = :nic');
    $query2->bindValue(':nic',$nic,PDO::PARAM_STR);
    $query2->execute();

    $data2 = $query2->fetchObject();
    if(!isset($data2->NIC)){
        echo "Person NIC number not exist";
        return false;
    }
    else{
        $nic1 = $data2->NIC;
        $title = $data2->Title;
        $fname = $data2->FirstName;
        $lname = $data2->LastName;
        $street = $data2->Street;
        $city = $data2->City;
        $p_code = $data2->PostalCode;
        $email = $data2->Email;
        $p_no = $data2->PhoneNo;
        $m_no = $data2->MobileNo;
    }

?>

<body>

<form action='/ACTA_project/mod/admin_staff/stu_update.php' method='post' enctype='multipart/form-data' id='stu_updated'>
    <table class='table1'>
        <tr>
            <td>Student ID</td>
            <td><input type='text' name='stu_ID' id='stu_ID' value='<?php echo $st_id;?>'></td>
        </tr>
        <tr>
            <td>NIC No </td>
            <td><input type='text' name='nic' id='nic' value='<?php echo $nic;?>'></td>
        </tr>
        <tr>
            <td>Title</td>
            <td><select name='title' id='title' ><option value=''><?php echo $title;?></option><option value='Mr'>Mr</option><option value='Mrs'>Mrs</option><option value='Ms'>Ms</option>
                </select>
            </td>

        </tr>
        <tr>
            <td>First Name</td>
            <td><input type='text' name='firstName' id='firstName' value='<?php echo $fname;?>'></td>
        </tr>
        <tr>
            <td>Surname</td>
            <td><input type='text' name='surname' id='surname' value='<?php echo $lname;?>'></td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td><input type='text' name='dob' id='dob' value='<?php echo $dob;?>' ></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><textarea name='addr' id='addr' rows='4' cols='20' ><?php echo $street;?></textarea></td>
        </tr>
        <tr>
            <td>City</td>
            <td><input type='text' name='city' id='city' value='<?php echo $city;?>'></td>
        </tr>
        <tr>
            <td>Postal Code</td>
            <td><input type='text' name='p_code' id='p_code' value='<?php echo $p_code;?>'></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type='text' name='email' id='email' value='<?php echo $email;?>'></td>
        </tr>
        <tr>
            <td>Telephone No</td>
            <td><input type='text' name='tele_No' id='tele_No' value='<?php echo $p_no;?>'></td>
        </tr>
        <tr>
            <td>Mobile No</td>
            <td><input type='text' name='mob_No' id='mob_No' value='<?php echo $m_no;?>'></td>
        </tr>
        <tr>
            <td>Company Name</td>
            <td><input type='text' name='cmp_name' id='cmp_name' value='<?php echo $comp;?>'></td>
        </tr>
        <tr>
            <td>Company Address</td>
            <td><input type='text' name='cmp_add' id='cmp_add' value='<?php echo $comp_add;?>'></td>
        </tr>
        <tr>
            <td>Company Phone No</td>
            <td><input type='text' name='cmp_No' id='cmp_No' value='<?php echo $comp_pho;?>'></td>
        </tr>
        <tr>
            <td>Registered Date</td>
            <td><input type='date' name='reg_date' id='reg_date' value='<?php echo $reg_date;?>'></td>
        </tr>
        <tr>
            <td>Course ID</td>
            <td><input type='text' name='c_ID' id='c_ID' value='<?php echo $c_id;?>'></td>
        </tr>
        <tr>
            <td><input type="button" value="Update" name="updated" onclick="ajaxPost('/ACTA_project/mod/admin_staff/stu_update.php',$('#stu_updated').serialize()+'&updated=Update')"></td>
            <td><input type="button" value="Delete" name="deleted" onclick="ajaxPost('/ACTA_project/mod/admin_staff/stu_update.php',$('#stu_updated').serialize()+'&deleted=Delete')"></td>
        </tr>

    </table>
</form>

<button class="back" onclick="myFunction('/ACTA_project/view/admin_staff/stu_check.php')">Back </button>

</body>