<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 9/22/14
 * Time: 11:33 PM
 */

    require_once("../conn/db_conn.php");
    //include ("../view/header.php");




    $u_nic = $_SESSION['p_nic'];

    $db = DB_conn::conn();

    $query = $db->prepare('SELECT * FROM person WHERE NIC = :u_nic');
    $query->bindValue(':u_nic',$u_nic,PDO::PARAM_STR);
    $query->execute();

    $data = $query->fetchObject();
    $f_nam = $data->FirstName;
    $l_nam = $data->LastName;


?>


<html>
<head>
    <title> Parent-Home Page</title>
    <link rel="stylesheet"  href="/ACTA_project/res/css/admin.css">
    <link rel="stylesheet"  href="/ACTA_project/res/css/content.css">
    <style>
        *{padding: 0%; margin: 0%}
    </style>
</head>

<body class="page">

<div class="topbar">
    <h3><?php echo $f_nam." ".$l_nam; ?></h3>


</div>

<div class="middle_body">
    <div class="left">
        <div class="leftbar">
            <table>
                <div class="leftbar-main">
                    <p> <strong> </strong></p>
                </div>
                <ul>
                    <li class="selected"> <a href="#"> NAVIGATION </a> </li>
                    <li> <a href="#" onclick="myFunction1('/ACTA_project/view/parent/par_home.php')"> Home </a> </li>
                    <li> <a href="#" onclick="myFunction1('/ACTA_project/view/parent/parent_details.php')"> Personal Details </a> </li>
                    <li> <a href="#"> Reports </a> </li>
                    <li> <a href="#"> Payments </a> </li>

                </ul>
            </table>
        </div>
    </div>

    <div class="right"> <!-- ************ -->
        <div class="right_upper">
            <div class="horizontal-bar">
                <ul class="ul1">
                    <li> <a href="#"> <img src="/ACTA_project/res/image/home.png" style="width: 23px ; height: 23px"></a></li>
                    <li> <a href="#" onclick="myFunction1('/ACTA_project/view/parent/par_home.php')"> Home </a> </li>
                    <li> <a href="#" onclick="myFunction1('/ACTA_project/view/parent/parent_details.php')"> Personal Details </a> </li>
                    <li> <a href="#" onclick="myFunction1('/ACTA_project/view/parent/gt_report.html')"> Reports </a> </li>
                    <li> <a href="#"> Payments </a> </li>
                    <!--                    <li> <button type="button" onclick="loadXMLDoc()"> Manage Details </button> </li>-->

                </ul>
            </div>
        </div>
        <div class="right_main">
            <div class="main_panel" id="main_panel">

                <!-- this is the part which change using AJAX. -->
                <div class="home_panel">
                    <div class="home_main">
                        <div class="home_main_upper">
                            <img src="/ACTA_project/res/image/acta.png" >
                        </div>
                        <div class="newsfeed">

                        </div>
                    </div>
                    <div class="rightside_bar">
                        <div class="rightside_bar_upper">
                            <img src="/ACTA_project/res/image/calender.png" style="width: 285px ; height: 200px">
                        </div>
                        <div class="rightside_bar_lower">

                        </div>
                    </div>
                </div>
                <!-- ***************** -->

            </div>
        </div>
    </div>

</div>

<script src="/ACTA_project/jQuery/jquery-1.11.1.min.js"></script>

<script>
    var xmlhttp;
    function loadXMLDoc(url,cfunc)
    {
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=cfunc;
        xmlhttp.open("GET",url,true);
        xmlhttp.send();
    }
    function myFunction1(s)
    {
        loadXMLDoc(s,function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("main_panel").innerHTML=xmlhttp.responseText;
            }
        });
    }
    function myFunction(s)
    {
        loadXMLDoc(s,function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("panel").innerHTML=xmlhttp.responseText;
            }
        });
    }
    function ajaxPost(url,data){
        $.post(url,data,function(h){
            $("#panel").html(h);
        });
    }



</script>




</body>
</html>