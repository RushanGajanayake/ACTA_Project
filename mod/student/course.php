<?php
/**
 * Created by PhpStorm.
 * User: Amali
 * Date: 10/8/14
 * Time: 2:17 PM
 */

require_once("course_view.php");

if(empty($_POST["Course"])){
    echo "Please Enter Course ID";
}

else{
    $cors = $_POST["Course"];
    $course = new Course();
    $course->getCourse("SELECT * FROM subject WHERE Course_Course_ID = '{$cors}'",$cors);

}