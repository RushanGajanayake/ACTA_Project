<?php

	require_once("course_view.php");
	session_start();
    $cors=$_SESSION['user_name'];
    $course = new Course();
    $course->getCourse("SELECT * FROM subject WHERE Aca_Staff_Ac_ID = '{$cors}'",$cors);

?>