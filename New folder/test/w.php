<!--
/**
* Created by PhpStorm.
* User: Rushan Gajanayake
* Date: 9/10/14
* Time: 10:25 AM
*/
-->

<body>
<form action="../../view/admin_staff/stu_add.php" method="post">
    <table>
        <tr>
            <td>Select Year</td>
            <td>
                <select id="year" name="year">
                    <option value=""></option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Select Course</td>
            <td>
                <select id="course" name="course">
                    <option value=""></option>
                    <option value="DQS1">Computer science</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Select Level</td>
            <td>
                <select id="level" name="level">
                    <option value=""></option>
                    <option value="L1">Level 1</option>
                    <option value="L2">Level 2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Select Batch</td>
            <td>
                <select id="batch" name="batch">
                    <option value=""></option>
                    <option value="B1">Batch 1</option>
                    <option value="B2">Batch 2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="Next" name="add1"></td>
        </tr>
    </table>
</form>

</body>


