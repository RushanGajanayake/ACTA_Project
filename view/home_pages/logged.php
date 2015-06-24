<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 8/23/14
 * Time: 3:42 PM
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


<html id="meka">
<head>
    <title> Admin-Home Page</title>
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

<div class="page" id="page">

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
                            <li><a href="#" onclick="myFunction1('/ACTA_project/view/admin_staff/personal_details.php')">Profile</a> </li>
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
                    <li class="icon "> <a href="#" onclick="myFunction1('/ACTA_project/view/admin_staff/home.php')"> <img class="pic" src="/ACTA_project/res/image/home1.png"  height="70" width="70"  onmouseover="this.src='/ACTA_project/res/image/home2.png';" onmouseout="this.src='/ACTA_project/res/image/home1.png';"></a> </li>
                    <li class="icon "> <a href="#" onclick="myFunction1('/ACTA_project/view/admin_staff/personal_details.php')"> <img class="pic" src="/ACTA_project/res/image/persnal_details1.png"  height="70" width="70" onmouseover="this.src='/ACTA_project/res/image/persnal_details2.png';" onmouseout="this.src='/ACTA_project/res/image/persnal_details1.png';"> </a> </li>
                    <li class="icon "> <a href="#" onclick="myFunction1('/ACTA_project/view/admin_staff/courses.php')"> <img class="pic" src="/ACTA_project/res/image/courses1.png"  height="70" width="70" onmouseover="this.src='/ACTA_project/res/image/courses2.png';" onmouseout="this.src='/ACTA_project/res/image/courses1.png';"> </a> </li>
                    <li class="icon "> <a href="#" onclick="myFunction1('/ACTA_project/view/admin_staff/manage_detail.php')"> <img class="pic" src="/ACTA_project/res/image/manage1.png"  height="70" width="70" onmouseover="this.src='/ACTA_project/res/image/manage2.png';" onmouseout="this.src='/ACTA_project/res/image/manage1.png';"> </a> </li>
                    <li class="icon "> <a href="#" onclick="myFunction1('/ACTA_project/view/admin_staff/reports.php')"> <img class="pic" src="/ACTA_project/res/image/repoerts1.png"  height="70" width="70" onmouseover="this.src='/ACTA_project/res/image/repoerts2.png';" onmouseout="this.src='/ACTA_project/res/image/repoerts1.png';"> </a> </li>
                    <li class="icon "> <a href="#" onclick="myFunction1('/ACTA_project/view/admin_staff/notifi_inbox.php')"> <img class="pic" src="/ACTA_project/res/image/notifications1.png"  height="70" width="70" onmouseover="this.src='/ACTA_project/res/image/notification2.png';" onmouseout="this.src='/ACTA_project/res/image/notifications1.png';"> </a> </li>
<!--                    onmouseover="this.src='/ACTA_project/res/image/notifications2.png';" onmouseout="this.src='/ACTA_project/res/image/notifications1.png';"    -->

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
<!--                <img src="/ACTA_project/res/image/inbox.png" height="90" width="90">-->
                <a href="#" onclick="myFunction1('/ACTA_project/view/admin_staff/notifi_inbox.php')"> <img src="/ACTA_project/res/image/inbox.png" height="90" width="90"> </a>
                <img src="/ACTA_project/res/image/time.png" height="90" width="90">
                <img src="/ACTA_project/res/image/tasks.png" height="90" width="90">

            </div>
            <div class="rightside_bar_middle">
                <div class="event_cale">
                    <div class="cal">
                        <p class="panel_header_font"> Calendar </p>
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
                    <p class="panel_header_font"> Tasks </p>
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




    function autoComplete(data){
        $("#searchid").keyup(function(){
//            alert(data);
            var searchid = $(this).val();
//            alert(searchid);
            if(searchid!=''){
                $.ajax({
                    type: "POST",
                    url: "mod/admin_staff/getNames.php",
                    data: {search: searchid , person:data},
                    cache: false,
                    success: function(html)
                    {
                        $("#result1").html(html).show();
                    }
                });
            }
            return false;


        });


    }
    function autoComplete2(data){
        $("#searchid").keyup(function(){
//            alert(data);
            var searchid = $(this).val();
//            alert(searchid);
            if(searchid!=''){
                $.ajax({
                    type: "POST",
                    url: "mod/admin_staff/getNames.php",
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
            $("#result1").hide();
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
//    function ajaxPost5(url,data){
//
//        $.post(url,data,function(h){
////            window.open($("#meka").html(h)));
////            $("#meka").html(h);
//        });
//    }


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
        $.ajax({
            type: "POST",
            url: "view/admin_staff/getData.php",
            data: {search2: data},
            cache: false,
            success: function(html)
            {
                $("#subjects").html(html).show();
            }
        });

    }


    function checkEmpty_lec(){

                var z = ["ac_ID",'nic','title','firstName','surname',"addr",'city','p_code','email','tele_No','mob_No','desig',"enroll_date"];
                var z_e = ["ac_ID_e",'nic_e','title_e','firstName_e','surname_e',"addr_e",'city_e','p_code_e','email_e','tele_No_e','mob_No_e','desig_e',"enroll_date_e"];

                var count = 0;
                var z_count = 13;


                for(i=0;i<z_count;i++){
                    count++;
                    var y = document.getElementById(z[i]).value;
                    if(y==null||y==""||y==" "){
                        document.getElementById(z[i]).className = 'input_error';
                        document.getElementById(z_e[i]).innerHTML = '*field is required';

                    }
                    else if(i==1){
                        var f2 = document.getElementById(z[i]).value;
                        if((isNaN(f2)) && (f2.length==10)){
                            idarray = f2.split(/[0-9]+/);
                            if(idarray.length==2 && (idarray[1]=='x'||idarray[1]=='v'||idarray[1]=='X'||idarray[1]=='V')){
                                document.getElementById(z[i]).className = 'input';
                                document.getElementById(z_e[i]).innerHTML = '';
                                count--;
                            }else{
                                document.getElementById(z[i]).className = 'input_error';
                                document.getElementById(z_e[i]).innerHTML = '*enter correct NIC number';
                            }
                        }
                        else{
                            document.getElementById(z[i]).className = 'input_error';
                            document.getElementById(z_e[i]).innerHTML = '*enter correct NIC number';
                        }
                    }
                    else if(i==8){
                        var f3 = document.getElementById(z[i]).value;
                        if((f3.indexOf('@')!== -1) && (f3.indexOf('.')!== -1) ){
                            emailarray = f3.split("@");
                            var f4 = emailarray[1];    //get the tail part of email address
                            domainarray = f4.split(".");

                            if(f4.length>=5 && domainarray.length==2 && domainarray[0].length>=2 ){   //check the correctness of domain
                                document.getElementById(z[i]).className = 'input';
                                document.getElementById(z_e[i]).innerHTML = '';
                                count--;

                            }else{
                                document.getElementById(z[i]).className = 'input_error';
                                document.getElementById(z_e[i]).innerHTML = '*enter correct email address';

                            }
                        }
                    }
                    else if(i==9||i==10){
                        var f1 = document.getElementById(z[i]).value;
                        if(isNaN(f1)){
                            document.getElementById(z[i]).className = 'input_error';
                            document.getElementById(z_e[i]).innerHTML = '*enter correct number';
                        }
                        else if(f1.toString().length!=10){
                            document.getElementById(z[i]).className = 'input_error';
                            document.getElementById(z_e[i]).innerHTML = '*enter correct number';
                        }
                        else{
                            document.getElementById(z[i]).className = 'input';
                            document.getElementById(z_e[i]).innerHTML = '';
                            count--;
                        }

                    }
                    else{
                        document.getElementById(z[i]).className = 'input';
                        document.getElementById(z_e[i]).innerHTML = '';
                        count--;
                    }


                }
                if(count==0){
                    ajaxPost('/ACTA_project/mod/admin_staff/lect_reg.php',$('#lect_reg').serialize()+'&add=Add');
                }

    }

    function checkEmpty_stu(){

        var z = ["year",'course','level','batch'];
        var z_e = ["year_e",'course_e','level_e','batch_e'];

        var count = 0;
        var z_count = 4;


        for(i=0;i<z_count;i++){
            count++;
            var y = document.getElementById(z[i]).value;
            if(y==null||y==""||y==" "){
                document.getElementById(z[i]).className = 'input_error';
                document.getElementById(z_e[i]).innerHTML = '*field is required';

            }
            else{
                document.getElementById(z[i]).className = 'input';
                document.getElementById(z_e[i]).innerHTML = '';
                count--;
            }


        }
        if(count==0){
            ajaxPost('/ACTA_project/view/admin_staff/stu_add.php',$('#stu_check').serialize()+'&add1=Next');
        }

    }

    function checkEmpty_marks(){

        var z = ["year",'course','level','batch','subject'];
        var z_e = ["year_e",'course_e','level_e','batch_e','subject_e'];

        var count = 0;
        var z_count = 5;


        for(i=0;i<z_count;i++){
            count++;
            var y = document.getElementById(z[i]).value;
            if(y==null||y==""||y==" "){
                document.getElementById(z[i]).className = 'input_error';
                document.getElementById(z_e[i]).innerHTML = '*field is required';

            }
            else{
                document.getElementById(z[i]).className = 'input';
                document.getElementById(z_e[i]).innerHTML = '';
                count--;
            }


        }
        if(count==0){
            ajaxPost('/ACTA_project/mod/admin_staff/marks.php',$('#marks').serialize()+'&next=Next');
        }

    }

    function checkEmpty_event(){

        var z = ["e_name",'e_date','hour','min'];
        var z_e = ["e_name_e",'e_date_e','hour_e','min_e'];

        var count = 0;
        var z_count = 4;


        for(i=0;i<z_count;i++){
            count++;
            var y = document.getElementById(z[i]).value;
            if(y==null||y==""||y==" "){
                if(i==2 || i==3){
                    document.getElementById(z[i]).className = 'input_error';
                    document.getElementById(z_e[3]).innerHTML = '*field is required';
                }
                else{
                    document.getElementById(z[i]).className = 'input_error';
                    document.getElementById(z_e[i]).innerHTML = '*field is required';
                }
            }
            else{
                if(i==2 || i==3){
                    if(i==2){
                        document.getElementById(z[i]).className = 'input_date';
                        document.getElementById(z_e[3]).innerHTML = '';
                        count--;
                    }
                    else if(i==3){
                        if(y<60){
                            document.getElementById(z[i]).className = 'input_date';
                            document.getElementById(z_e[i]).innerHTML = '';
                            count--;
                        }else{
                            document.getElementById(z[i]).className = 'input_error';
                            document.getElementById(z_e[i]).innerHTML = '*less than 60 minutes';
                        }


                    }else{
                        document.getElementById(z[i]).className = 'input_date';
                        document.getElementById(z_e[i]).innerHTML = '';
                        count--;
                    }

                }
                else{
                    document.getElementById(z[i]).className = 'input';
                    document.getElementById(z_e[i]).innerHTML = '';
                    count--;
                }
            }


        }
        if(count==0){
            ajaxPost('/ACTA_project/mod/admin_staff/event_handler.php',$('#event_reg').serialize()+'&add=Add')
        }

    }

    function checkEmpty_atten(){

        var z = ["year",'course','level','batch','month','year1','dates'];
        var z_e = ["year_e",'course_e','level_e','batch_e','subject_e','month_e','year1_e','dates_e'];

        var count = 0;
        var z_count = 4;


        for(i=0;i<z_count;i++){
            count++;
            var y = document.getElementById(z[i]).value;
            if(y==null||y==""||y==" "){
                if(i==4 || i==5){
                    document.getElementById(z[i]).className = 'input_error';
                    document.getElementById(z_e[5]).innerHTML = '*field is required';
                }
                else{
                    document.getElementById(z[i]).className = 'input_error';
                    document.getElementById(z_e[i]).innerHTML = '*field is required';
                }

            }
            else{
                if(i==4 || i==5){
                    if(i==4){
                        document.getElementById(z[i]).className = 'input_date';
                        document.getElementById(z_e[5]).innerHTML = '';
                        count--;
                    }else{
                        document.getElementById(z[i]).className = 'input_date';
                        document.getElementById(z_e[i]).innerHTML = '';
                        count--;
                    }
                }
                else{
                    document.getElementById(z[i]).className = 'input';
                    document.getElementById(z_e[i]).innerHTML = '';
                    count--;
                }
            }


        }
        if(count==0){
            ajaxPost('/ACTA_project/mod/admin_staff/attendance.php',$('#atten').serialize()+'&add1=Next');
        }

    }

    function checkEmpty_course(){

        var z = ["c_ID",'c_name','c_level','c_yr','c_months','c_details'];
        var z_e = ["c_ID_e",'c_name_e','c_level_e','c_yr_e','c_months_e','c_details_e'];

        var count = 0;
        var z_count = 6;


        for(i=0;i<z_count;i++){
            count++;
            var y = document.getElementById(z[i]).value;
            if(y==null||y==""||y==" "){
                if(i==3 || i==4){
                    document.getElementById(z[i]).className = 'input_error';
                    document.getElementById(z_e[4]).innerHTML = '*field is required';
                }
                else{
                    document.getElementById(z[i]).className = 'input_error';
                    document.getElementById(z_e[i]).innerHTML = '*field is required';
                }

            }
            else{
                if(i==3 || i==4){
                    if(i==3){
                        document.getElementById(z[i]).className = 'input_date';
                        document.getElementById(z_e[4]).innerHTML = '';
                        count--;
                    }else{
                        document.getElementById(z[i]).className = 'input_date';
                        document.getElementById(z_e[i]).innerHTML = '';
                        count--;
                    }
                }
                else{
                    document.getElementById(z[i]).className = 'input';
                    document.getElementById(z_e[i]).innerHTML = '';
                    count--;
                }
            }


        }
        if(count==0){
            ajaxPost('/ACTA_project/mod/admin_staff/curs_add.php',$('#cours_add').serialize()+'&add_c=Next');
        }

    }

    function checkEmpty_subj(){

        var z = ["s_ID",'s_name','s_credit','ac_id','s_details'];
        var z_e = ["s_ID_e",'s_name_e','s_credit_e','ac_id_e','s_details_e'];

        var count = 0;
        var z_count = 5;


        for(i=0;i<z_count;i++){
            count++;
            var y = document.getElementById(z[i]).value;
            if(y==null||y==""||y==" "){
                document.getElementById(z[i]).className = 'input_error';
                document.getElementById(z_e[i]).innerHTML = '*field is required';

            }
            else{
                document.getElementById(z[i]).className = 'input';
                document.getElementById(z_e[i]).innerHTML = '';
                count--;
            }


        }
        if(count==0){
            ajaxPost('/ACTA_project/mod/admin_staff/sub_add.php',$('#sub_add').serialize()+'&add_s=Add');
        }

    }

    function checkEmpty_notifi(){


        var z = ["viewer1",'n_subject','n_desc'];
        var z_e = ["viewer1_e",'n_subject_e','n_desc_e'];

        var count = 0;
        var z_count = 3;

        for(i=0;i<z_count;i++){
            count++;
            var y = document.getElementById(z[i]).value;
            if(y==null||y==""||y==" "){
                document.getElementById(z[i]).className = 'input_error';
                document.getElementById(z_e[i]).innerHTML = '*field is required';

            }
            else{
                document.getElementById(z[i]).className = 'input';
                document.getElementById(z_e[i]).innerHTML = '';
                count--;
            }


        }
        if(count==0){
            ajaxPost('/ACTA_project/mod/admin_staff/notification.php',$('#notifi').serialize()+'&send_n=Send');
        }

    }

    function checkEmpty_atten_rep(){


        var z = ["year",'course','level','batch','month1','year1','month2','year2'];
        var z_e = ["year_e",'course_e','level_e','batch_e','month1_e','year1_e','month2_e','year2_e'];

        var count = 0;
        var z_count = 8;


        for(i=0;i<z_count;i++){
            count++;
            var y = document.getElementById(z[i]).value;
            if(y==null||y==""||y==" "){
                if(i==4 || i==5){
                    document.getElementById(z[i]).className = 'input_error';
                    document.getElementById(z_e[5]).innerHTML = '*field is required';
                }
                else if(i==6 || i==7){
                    document.getElementById(z[i]).className = 'input_error';
                    document.getElementById(z_e[7]).innerHTML = '*field is required';
                }
                else{
                    document.getElementById(z[i]).className = 'input_error';
                    document.getElementById(z_e[i]).innerHTML = '*field is required';
                }

            }
            else{
                if(i==4 || i==5 || i==6 || i==7){
                    if(i==4){
                        document.getElementById(z[i]).className = 'input_date';
                        document.getElementById(z_e[5]).innerHTML = '';
                        count--;
                    }
                    else if(i==6){
                        document.getElementById(z[i]).className = 'input_date';
                        document.getElementById(z_e[7]).innerHTML = '';
                        count--;
                    }
                    else{
                        document.getElementById(z[i]).className = 'input_date';
                        document.getElementById(z_e[i]).innerHTML = '';
                        count--;
                    }
                }
                else{
                    document.getElementById(z[i]).className = 'input';
                    document.getElementById(z_e[i]).innerHTML = '';
                    count--;
                }
            }


        }
        if(count==0){
            ajaxPost('/ACTA_project/mod/admin_staff/attendance_reports.php',$('#att_report').serialize()+'&generateReport=Generate');
        }

    }

    $("#newsfeed").load("view/admin_staff/news_feed.php",function(){
        $("#newsfeed").html(html).show();
    });

    function checkEmpty_msg(){

        var z = ["searchid"];
        var z_e = ["msg_to_e"];

        var count = 0;
        var z_count = 1;


        for(i=0;i<z_count;i++){
            count++;
            var y = document.getElementById(z[i]).value;

            if(y==null||y==""||y==" "){
                document.getElementById(z[i]).className = 'input_error';
                document.getElementById(z_e[i]).innerHTML = '*Add receiver';

            }
            else{
                document.getElementById(z[i]).className = 'search';
                document.getElementById(z_e[i]).innerHTML = '';
                count--;
            }


        }
        if(count==0){
            ajaxPost('/ACTA_project/mod/admin_staff/notification.php',$('#new_msg').serialize()+'&send_msg=Send');
        }
    }
    function checkEmpty_reply_msg(){

        var z = ["searchid"];
        var z_e = ["msg_to_e"];

        var count = 0;
        var z_count = 1;


        for(i=0;i<z_count;i++){
            count++;
            var y = document.getElementById(z[i]).value;

            if(y==null||y==""||y==" "){
                document.getElementById(z[i]).className = 'input_error';
                document.getElementById(z_e[i]).innerHTML = '*Add receiver';

            }
            else{
                document.getElementById(z[i]).className = 'search';
                document.getElementById(z_e[i]).innerHTML = '';
                count--;
            }


        }
        if(count==0){
            ajaxPost('/ACTA_project/mod/admin_staff/notification.php',$('#new_msg').serialize()+'&send_rply_msg=Send');
        }
    }

    function checkEmpty_search(){

        var z = ["searchid"];
        var z_e = ["searchid_e"];

        var count = 0;
        var z_count = 1;


        for(i=0;i<z_count;i++){
            count++;
            var y = document.getElementById(z[i]).value;

            if(y==null||y==""||y==" "){
                document.getElementById(z[i]).className = 'input_error';
                document.getElementById(z_e[i]).innerHTML = '';

            }
            else{
                document.getElementById(z[i]).className = 'search';
                document.getElementById(z_e[i]).innerHTML = '';
                count--;
            }


        }
        if(count==0){
            ajaxPost('/ACTA_project/view/admin_staff/update_form.php',$('#update').serialize()+'&update=Next');
        }
    }

    function checkEmpty_search2(){

        var z = ["searchid"];
        var z_e = ["searchid_e"];

        var count = 0;
        var z_count = 1;


        for(i=0;i<z_count;i++){
            count++;
            var y = document.getElementById(z[i]).value;

            if(y==null||y==""||y==" "){
                document.getElementById(z[i]).className = 'input_error';
                document.getElementById(z_e[i]).innerHTML = '';

            }
            else{
                document.getElementById(z[i]).className = 'search';
                document.getElementById(z_e[i]).innerHTML = '';
                count--;
            }


        }
        if(count==0){
            ajaxPost('/ACTA_project/view/admin_staff/lec_update.php',$('#update').serialize()+'&update=Next');
        }
    }

    function checkEmpty_marks_adding(){
        alert("rrrrrrrr");
        var no_stu = document.getElementById("s_num").value; //get no.of students

//        var z = ["s_ID",'s_name','s_credit','ac_id','s_details'];
//        var z_e = ["s_ID_e",'s_name_e','s_credit_e','ac_id_e','s_details_e'];

        var count = 0;
//        var z_count = 5;


        for(i=0;i<no_stu;i++){
            count++;
            var z= 'mark'.i;
            alert(z);
            var y = document.getElementById(z).value;
            if(y==null||y==""||y==" "){
                document.getElementById(z).className = 'input_error';
//                document.getElementById(z_e[0]).innerHTML = '*field is required';

            }
            else{
                document.getElementById(z).className = 'input';
//                document.getElementById(z_e[0]).innerHTML = '';
                count--;
            }


        }
        if(count==0){
            ajaxPost('/ACTA_project/mod/admin_staff/marks_enter.php',$('#mrks_enter').serialize()+'&Add2=Submit');
        }

    }

    function checkEmpty_All_stu(){

        var z = ["year",'course','level','batch'];
        var z_e = ["year_e",'course_e','level_e','batch_e'];

        var count = 0;
        var z_count = 4;


        for(i=0;i<z_count;i++){
            count++;
            var y = document.getElementById(z[i]).value;
            if(y==null||y==""||y==" "){
                document.getElementById(z[i]).className = 'input_error';
                document.getElementById(z_e[i]).innerHTML = '*field is required';

            }
            else{
                document.getElementById(z[i]).className = 'input';
                document.getElementById(z_e[i]).innerHTML = '';
                count--;
            }


        }
        if(count==0){
            ajaxPost('/ACTA_project/mod/admin_staff/allStudents.php',$('#all_stu').serialize()+'&add1=Next');
        }

    }


</script>




</body>
</html>