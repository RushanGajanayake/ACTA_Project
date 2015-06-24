<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 9/22/14
 * Time: 11:31 PM
 */
require_once("conn/db_conn.php");
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
    <title> Student-Home Page</title>
    <link rel="stylesheet"  href="/ACTA_project/res/css/admin.css">
    <link rel="stylesheet"  href="/ACTA_project/res/css/content.css">

    <link rel="stylesheet" href="/ACTA_project/res/css/eventCalendar.css">
    <link rel="stylesheet" href="/ACTA_project/res/css/eventCalendar_theme_responsive.css">
    <script src="/ACTA_project/lib/js/jquery.min.js" type="text/javascript"></script>

    <style>
        *{padding: 0%; margin: 0%}
    </style>
</head>

<body>

<div class="page">

<!--<div class="topbar">
    <h3><?php /*echo $f_nam." ".$l_nam;*/ ?></h3>


</div>-->
<div class="topbar">
    <!--    <img src="/ACTA_project/res/image/wrapper.png" style="width: 1500px ; height: 250px">-->
    <div class="topbar_down">
        <div class="leftside">
            <img class="setpic" src="/ACTA_project/res/image/header_logo2.png" >

        </div>
        <div class="rightside">
            <div class="name">
                <p><?php echo $f_nam." ".$l_nam;  echo "  ";?></p>

            </div>
            <div class="avatar">
                <img class="setpic" src="/ACTA_project/res/image/09-user.png"  height="40" width="40" >

            </div>

            <div class="setting">
                <div class="dropdown"><a class="dropList" href="#"><img class="setpic" src="/ACTA_project/res/image/downarrow.png"  height="12" width="12" ></a>
                    <div class="dropdown_list">
                        <ul class=dropdown_root>
<!--                            <li><a href="#">Settings</a> </li>-->
                            <li><a href="#" onclick="myFunction1('/ACTA_project/view/student/Stu_details.php')">Profile</a> </li>
                            <li><a href="#" onclick="myFunction1('/ACTA_project/view/admin_staff/notifi_inbox.php')">Notifications</a> </li>
                            <li class="divider"></li>
                            <li><a href="/ACTA_project/view/home_pages/logout.php">Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>





</div>

<div class="middle_body">
    <div class="left">
        <div id="leftbar" class="leftbar">
            <table>
                <ul class="bttns">
                    <!--                    <li class="selected"> <a href="#"> NAVIGATION </a> </li>-->
                    <li></li>
                    <li class="icon "> <a href="#" onclick="myFunction1('/ACTA_project/view/student/stu_home.php')"> <img class="pic" src="/ACTA_project/res/image/home1.png"  height="70" width="70"  onmouseover="this.src='/ACTA_project/res/image/home2.png';" onmouseout="this.src='/ACTA_project/res/image/home1.png';"></a> </li>
                    <li class="icon "> <a href="#" onclick="myFunction1('/ACTA_project/view/student/Stu_details.php')"> <img class="pic" src="/ACTA_project/res/image/persnal_details1.png"  height="70" width="70" onmouseover="this.src='/ACTA_project/res/image/persnal_details2.png';" onmouseout="this.src='/ACTA_project/res/image/persnal_details1.png';"> </a> </li>
                    <li class="icon "> <a href="#" onclick="myFunction1('/ACTA_project/view/student/stu_course.php')"> <img class="pic" src="/ACTA_project/res/image/courses1.png"  height="70" width="70" onmouseover="this.src='/ACTA_project/res/image/courses2.png';" onmouseout="this.src='/ACTA_project/res/image/courses1.png';"> </a> </li>
                    <li class="icon "> <a href="#" onclick="myFunction1('/ACTA_project/view/student/stu_marks.php')"> <img class="pic" src="/ACTA_project/res/image/marks1.png"  height="70" width="70" onmouseover="this.src='/ACTA_project/res/image/marks1.png';" onmouseout="this.src='/ACTA_project/res/image/marks1.png';"> </a> </li>
                    <li class="icon "> <a href="#" onclick="myFunction1('/ACTA_project/view/student/stu_rprt_main.php')"> <img class="pic" src="/ACTA_project/res/image/repoerts1.png"  height="70" width="70" onmouseover="this.src='/ACTA_project/res/image/repoerts2.png';" onmouseout="this.src='/ACTA_project/res/image/repoerts1.png';"> </a> </li>
                    <li class="icon "> <a href="#" onclick="myFunction1('/ACTA_project/view/student/stu_payment.php')"> <img class="pic" src="/ACTA_project/res/image/payments1.png"  height="70" width="70" onmouseover="this.src='/ACTA_project/res/image/payments2.png';" onmouseout="this.src='/ACTA_project/res/image/payments1.png';"> </a> </li>
                    <li class="icon "> <a href="#" onclick="myFunction1('/ACTA_project/view/admin_staff/notifi_inbox.php')"> <img class="pic" src="/ACTA_project/res/image/notifications1.png"  height="70" width="70" onmouseover="this.src='/ACTA_project/res/image/notification2.png';" onmouseout="this.src='/ACTA_project/res/image/notifications1.png';"> </a> </li>
                </ul>
            </table>
        </div>
    </div>

    <div class="right"> <!-- ************ -->
        <div class="right_main">
            <div class="main_panel" id="main_panel">  <!-- this is the part which change using AJAX. -->
                <div class="home_panel">
                    <div class="home_main">
                        <div class="home_main_upper">

                        </div>
                        <div class="home_main_head">
                            <div class="pic">  <!-- pic size 910px * 95px-->
                                <img src="/ACTA_project/res/image/actaHead.png" border="1px">
                            </div>
                        </div>
                        <div class="newsfeed" id="newsfeed" onload="getNotifications()">

                        </div>
                    </div>

                </div>
            </div> <!-- ************ -->
            <div class="footer">
                <p>
                    <img class="pic" src="/ACTA_project/res/image/fb.png"  height="30" width="30" >
                    <img class="pic" src="/ACTA_project/res/image/twitter.png"  height="30" width="30" >
                    <img class="pic" src="/ACTA_project/res/image/g+.png"  height="30" width="30" >
                </p>
                <p>Advanced Construction Training Academy. All rights reserved.</p>
                <p></p>
                <p>Telephone: 0094-115672278, 0094-112786508 - Fax: 0094-112786508 - Email: wgunawardana@acta.edu.lk </p>
                <p>Advanced Construction Training Academy, 350A, Idikireem Medura, Pannipitiya Road,Pelawatta, Battaramulla, Sri Lanka</p>

            </div>
        </div>
    </div>
    <div class="right_conner">
        <div class="rightside_bar">
            <div class="rightside_bar_upper">
                <img src="/ACTA_project/res/image/inbox.png" height="90" width="90">
                <img src="/ACTA_project/res/image/time.png" height="90" width="90">
                <img src="/ACTA_project/res/image/tasks.png" height="90" width="90">

            </div>
            <div class="rightside_bar_middle">
                <div class="event_cale">
                    <div class="cal">

                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="g6">
                                <div id="eventCalendarHumanDate"></div>
                                <script>
                                    $(document).ready(function() {
                                        $("#eventCalendarHumanDate").eventCalendar({
                                            eventsjson: 'mod/json/event.humanDate.json.php',
                                            jsonDateFormat: 'human'  // 'YYYY-MM-DD HH:MM:SS'
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="rightside_bar_lower">
                <div class="lower_bar_header">

                </div>
                <div class="lower_bar_cont">

                </div>
            </div>
        </div>
    </div>

</div>
</div>

<script src="/ACTA_project/jQuery/jquery-1.11.1.min.js"></script>

<script src="/ACTA_project/lib/js/moment.js" type="text/javascript"></script>
<script src="/ACTA_project/lib/js/jquery.eventCalendar.min.js" type="text/javascript"></script>

<script language="JavaScript" type="text/javascript">

$(document).ready(function(){
//        $('.dropdown_list').hide();
    $('.dropList').click(function(){
//            $('.dropdown_list').slideToggle();
        var x = $(this).attr('id');
        if(x==1){
            $('.dropdown_list').hide();
            $(this).attr('id','0');
        }
        else{
            $('.dropdown_list').show();
            $(this).attr('id','1');
        }
    });
    $(document).mouseup(function()
    {
        $(".dropdown_list").hide();
        $(".dropList").attr('id', '');
    });
});


$('.icon').click(function(){
    $(".icon.active").removeClass('active')
    if($(this).hasClass('active')){
        $(this).removeClass('active')
    } else {
        $(this).addClass('active')
    }
});

//    function checkEmpty(){
//        alert("fuckoff");
//        ajaxPost('/ACTA_project/mod/admin_staff/curs_add.php',$('#cours_add').serialize()+'&add_c=Next');
//    }


function autoComplete(data){
    $("#searchid").keyup(function(){
        //alert(data);
        var searchid = $(this).val();
        if(searchid!=''){
            $.ajax({
                type: "POST",
                url: "../mod/admin_staff/getNames.php",
                data: {search: searchid , person:data},
                cache: false,
                success: function(html)
                {
                    $("#result1").html(html).show();
                }
            });
        }return false;

    });


}

function autoCompl_get(){
//        alert("xxx");
    $(".show").click(function(e){

        $(this).slideUp();
        var value = $(this).val();
        $('#searchid').val(value);
//            alert(value);

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
function ajaxPost3(url,data){

    $.post(url,data,function(h){
        $("#panel").html(h);
    });
}


function myfun(select){
    var selectedOption = select.options[select.selectedIndex];
    var data = selectedOption.value;
    alert(data);

    $.ajax({
        type: "POST",
        url: "view/admin_staff/getData.php",
        data: {search: data},
        cache: false,
        success: function(html)
        {
            $("#levels").html(html).show();
        }
    });



}
$("#newsfeed").load("view/student/stu_home.php",function(){
    $("#newsfeed").html(html).show();
});




</script>




</body>
</html>