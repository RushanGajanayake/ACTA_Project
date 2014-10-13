<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 8/23/14
 * Time: 3:42 PM
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
    <title> Admin-Home Page</title>
    <link rel="stylesheet"  href="/ACTA_project/res/css/admin.css">
    <link rel="stylesheet"  href="/ACTA_project/res/css/content.css">
    <style>
        *{padding: 0%; margin: 0%}
    </style>
</head>

<body class="page">

<div class="topbar">
<!--    <img src="/ACTA_project/res/image/wrapper.png" style="width: 1500px ; height: 250px">-->
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
                    <li> <a href="#" onclick="myFunction1('/ACTA_project/view/admin_staff/home.php')"> Home </a> </li>
                    <li> <a href="#" onclick="myFunction1('/ACTA_project/view/admin_staff/personal_details.php')"> Personal Details </a> </li>
                    <li> <a href="#" onclick="myFunction1('/ACTA_project/view/admin_staff/courses.php')"> Course </a> </li>
                    <li> <a href="#" onclick="myFunction1('/ACTA_project/view/admin_staff/manage_details.html')"> Manage Details </a> </li>
                    <li> <a href="#"> Notification </a> </li>

                </ul>
            </table>
        </div>
    </div>

    <div class="right"> <!-- ************ -->
        <div class="right_upper">
            <div class="horizontal-bar">
                <ul class="ul1">
                    <li> <a href="#"> <img src="/ACTA_project/res/image/home.png" style="width: 23px ; height: 23px"></a></li>
                    <li> <a href="#" onclick="myFunction1('/ACTA_project/view/admin_staff/home.php')"> Home </a> </li>
                    <li> <a href="#" onclick="myFunction1('/ACTA_project/view/admin_staff/courses.php')"> Courses </a> </li>
                    <li> <a href="#" onclick="myFunction1('/ACTA_project/view/admin_staff/report.html')"> Reports </a> </li>
                    <li> <a href="#" onclick="myFunction1('/ACTA_project/view/admin_staff/manage_details.html')"> Manage Details </a> </li>
<!--                    <li> <button type="button" onclick="loadXMLDoc()"> Manage Details </button> </li>-->

                </ul>
            </div>
        </div>
        <div class="right_main">
            <div class="main_panel" id="main_panel">  <!-- this is the part which change using AJAX. -->
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
            </div> <!-- ************ -->
        </div>
    </div>

</div>

<div class="Page_footer">

</div>

<script src="/ACTA_project/jQuery/jquery-1.11.1.min.js"></script>

<script language="JavaScript" type="text/javascript">


    function autoComplete(){
        $("#searchid").keyup(function(){
            var searchid = $(this).val();
            if(searchid!=''){
                $.ajax({
                    type: "POST",
                    url: "../mod/admin_staff/getNames.php",
                    data: {search: searchid},
                    cache: false,
                    success: function(html)
                    {
                        $("#result1").html(html).show();
                    }
                });
            }return false;

        });

//        jQuery("#result").live("click",function(e){
//            var $clicked = $(e.target);
//            var $name = $clicked.find('.c_ID').html();
//            var decoded = $("<div/>").html($name).text();
//            $('#searchid').val(decoded);
//        });
//        jQuery(document).live("click", function(e) {
//            var $clicked = $(e.target);
//            if (! $clicked.hasClass("search")){
//                jQuery("#result").fadeOut();
//            }
//        });
//        $('#searchid').click(function(){
//            jQuery("#result").fadeIn();
//        });
    }

    function autoCompl_get(){
//        alert("xxx");
        $(".show").click(function(e){

            $(this).slideUp();
            var value = $(this).val();
            $('#searchid').val(value);
//            alert(value);

//            var $clicked = $(e.target);
//            var $name = $clicked.find('.name11').html();
//            alert($name);
//            var decoded = $("<div/>").html($name).text();
//            $('#searchid').val(decoded);
        });
    }




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
            $("#main_panel").html(h);
        });
    }

    function ajaxPost1(url,data){

        var d = $(data).val();

        $.ajax({
            type: "POST",
            url: url,
            data: {search: d},
            cache: false,
            success: function(html)
            {
                $("#main_panel").html(html).show();
            }
        });

    }


    function myfun(select){
        var selectedOption = select.options[select.selectedIndex];
        var data = selectedOption.value;
//        document.getElementById("levels").innerHTML = "You selected: " + data;


        $.ajax({
            type: "POST",
            url: "../view/admin_staff/getData.php",
            data: {search: data},
            cache: false,
            success: function(html)
            {
                $("#levels").html(html).show();
            }
        });
    }


</script>




</body>
</html>