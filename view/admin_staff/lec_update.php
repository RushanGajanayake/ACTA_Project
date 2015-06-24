<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 11/16/14
 * Time: 6:10 PM
 */

require_once("../../conn/db_conn.php");

$id = null;

if(isset($_POST['update'])){
    global $id;

    $full_id= $_POST['search'];

    $piece = explode(" ",$full_id);
    $id= $piece[0];


}
$db = DB_conn::conn();

$query1 = $db->prepare('SELECT * FROM aca_staff WHERE Ac_ID = :id');
$query1->bindValue(':id',$id,PDO::PARAM_STR);
$query1->execute();

$data1 = $query1->fetchObject();
if(!isset($data1->Ac_ID)){
    echo "Academic ID number is not exists";
    return false;
}
else{
    $aca_id = $data1->Ac_ID;
    $desig = $data1->Designation;
    $e_date = $data1->Enroll_Date;
    $nic = $data1->Person_NIC;


}




$query2 = $db->prepare('SELECT * FROM person WHERE NIC = :nic');
$query2->bindValue(':nic',$nic,PDO::PARAM_STR);
$query2->execute();

$data2 = $query2->fetchObject();
if(!isset($data2->NIC)){
    echo "Person NIC number is not exist";
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

<div class="panel_upper">
    <div class="p0">
        <label class="p1">Manage Details  ></label>
        <label class="p2">Lecturer  >  Update & Delete Details</label>
    </div>
</div>

<div class="panel" id="panel">
    <div class="panel_body">
        <div class="panel_bar" >
            <p>Update Lecturer Details </p>
        </div>
        <div class="panel_body_cont">
            <form action='/ACTA_project/mod/admin_staff/lec_update.php' method='post' enctype='multipart/form-data' id='lec_updated'>
                <table class='table1'>
                    <tr class="row1">
                        <td class="row_label">Academic Staff ID*</td>
                        <td class="input_data"><input class="input data" type="text" name="ac_ID" id="ac_ID" value='<?php echo $aca_id;?>'></td>
                    </tr>
                    <tr class="row2">
                        <td class="row_label">NIC No* </td>
                        <td class="input_data"><input class="input data" type="text" name="nic" id="nic" value='<?php echo $nic;?>' readonly="readonly"></td>
                    </tr>
                    <tr class="row1">
                        <td class="row_label">Title*</td>
                        <td class="input_data"><select class="input data" name="title" id="title" ><option selected="selected" value="<?php echo $title;?> "><?php echo $title;?></option><option value="Mr">Mr</option><option value="Mrs">Mrs</option><option value="Ms">Ms</option>
                            </select>
                        </td>

                    </tr>
                    <tr class="row2">
                        <td class="row_label">First Name*</td>
                        <td class="input_data"><input class="input data" type="text" name="firstName" id="firstName" value='<?php echo $fname;?>'></td>
                    </tr>
                    <tr class="row1">
                        <td class="row_label">Surname*</td>
                        <td class="input_data"><input class="input data" type="text" name="surname" id="surname" value='<?php echo $lname;?>'></td>
                    </tr>
                    <tr class="row2">
                        <td class="row_label">Address*</td>
                        <td class="input_data1"><textarea class="input" name="addr" id="addr" rows="4" cols="20"><?php echo $street;?></textarea></td>
                    </tr>
                    <tr class="row1">
                        <td class="row_label">City*</td>
                        <td class="input_data"><input class="input data" type="text" name="city" id="city" value='<?php echo $city;?>'></td>
                    </tr>
                    <tr class="row2">
                        <td class="row_label">Postal Code*</td>
                        <td class="input_data"><input class="input data" type="text" name="p_code" id="p_code" value='<?php echo $p_code;?>'></td>
                    </tr>
                    <tr class="row1">
                        <td class="row_label">Email*</td>
                        <td class="input_data"><input class="input data" type="text" name="email" id="email" value='<?php echo $email;?>'></td>
                    </tr>
                    <tr class="row2">
                        <td class="row_label">Telephone No*</td>
                        <td class="input_data"><input class="input data" type="text" name="tele_No" id="tele_No" value='<?php echo $p_no;?>'></td>
                    </tr>
                    <tr class="row1">
                        <td class="row_label">Mobile No*</td>
                        <td class="input_data"><input class="input data" type="text" name="mob_No" id="mob_No" value='<?php echo $m_no;?>'></td>
                    </tr>
                    <tr class="row2">
                        <td class="row_label">Designation*</td>
                        <td class="input_data"><select class="input data" name="desig" id="desig">
                                <option selected="selected" value="<?php echo $desig;?> ">
                                    <?php
                                        switch($desig){
                                            case "S.Lect 1":echo "Senior Lecture 1";break;
                                            case "S.Lect 2":echo "Senior Lecture 2";break;
                                            case "Lect 1":echo "Lecture 1";break;
                                            case "Lect 2":echo "Lecture 2";break;
                                            case "Ass. Lect":echo "Assistant Lecture";break;
                                            default:echo $desig;
                                        }
                                    ?>
                                </option>
                                <option value="S.Lect 1">Senior Lecture 1</option>
                                <option value="S.Lect 2">Senior Lecture 2</option>
                                <option value="Lect 1">Lecture 1</option>
                                <option value="Lect 2">Lecture 2</option>
                                <option value="Ass. Lect">Assistant Lecture</option>
                            </select></td>
                    </tr>
                    <tr class="row1">
                        <td class="row_label">Enroll Date*</td>
                        <td class="input_data"><input class="input data" type="date" name="enroll_date" id="enroll_date" value='<?php echo $e_date;?>'></td>
                    </tr>
                    <tr>
                        <td><input class="button1_update" type="button" value="Update" name="updated" onclick="ajaxPost('/ACTA_project/mod/admin_staff/lec_update.php',$('#lec_updated').serialize()+'&updated=Update')"></td>
                        <td><input class="button1_delete" type="button" value="Delete" name="deleted" onclick="ajaxPost('/ACTA_project/mod/admin_staff/lec_update.php',$('#lec_updated').serialize()+'&deleted=Delete')"></td>
                    </tr>

                </table>
            </form>
        </div>
    </div>
    <button class="button1" onclick="myFunction1('/ACTA_project/view/admin_staff/lecture_reg.php')">Back </button>
</div>
</body>