<!--
/**
 * Created by PhpStorm.
 * User: Amali
 * Date: 10/8/14
 * Time: 2:16 PM
 */
 -->

<html>
<head>
    <link rel="stylesheet"  href="/ACTA_project/res/css/content.css">
    <link rel="stylesheet"  href="/ACTA_project/res/css/admin.css">
</head>
<body>
<div class="panel_upper">
    <p>Course</p>
</div>
<div class="panel" id="panel">
    <div class="panel_body">
        <div class="panel_bar" >
        </div>
        <div class="panel_body_cont">

            <form action="/ACTA_project/mod/student/course.php" method="post" id="stu_course">
                <table class="table1">
                    <tr class="row1"> <td class="row_label">Course ID:</td>
                        <td class="input_data"><select class="input data" name="Course" id="Course">
                                <?php //get drop down menu with courses

                                require_once("../../mod/student/mark_view.php");
                                $mk = new Mark();
                                $mk->getDropDown();

                                ?>
                            </select> </td>
                    </tr>
                    <tr> <td></td></tr>
                    <tr>
                        <td>  <input class="button1" type="button"  value="View" name="adding" onclick="ajaxPost('/ACTA_project/mod/student/course.php',$('#stu_course').serialize()+'&adding=View')"> </td>
                    </tr>
                </table>
            </form>
        </div>

    </div>
</div>
</body>

</html>