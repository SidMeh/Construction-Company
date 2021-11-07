<html>
<h1 style = "color: red;"> COMPANY OVERVIEW </h1>
<br><br>
<h3>Employee View</h3>

<form method = "POST">
Employee Name: <input type="text" name="employee_name"><br><br>
Employee ID: <input type="text" name="employee_id"><br><br>
<input type="submit" name="button1" class="button" value="Delete" />
<input type="submit" name="button2" class="button" value="View Details" />
<input type="submit" name="button3" class="button" value="Attendance record" />
</form>
<br>
<br>
<form method = "POST">
Project Name: <input type="text" name="project_name"><br><br>
Project Number: <input type="text" name="project_number"><br><br>
<input type="submit" name="button4" class="button" value="View Details" />
<input type="submit" name="button6" class="button" value="Delete" />
</form>

<br>
<br>
<form method = "POST">
Manager Name: <input type="text" name="manager_name"><br><br>
Manager ID: <input type="text" name="manager_id"><br><br>
<input type="submit" name="button5" class="button" value="View Details" />
</form>


</html>
<?php

if(array_key_exists('button1', $_POST)) {
            button1();
        }

 function button1() {

$name = $_POST['employee_name'];
$id = $_POST['employee_id'];
$db = new mysqli('localhost', 'root', '$iddh@13M', 'cc','3306');
$sql = "DELETE FROM employee where employee_name = '$name' and employee_id = '$id'; ";
$result = mysqli_query($db, $sql);
echo $sql;

  }


if(array_key_exists('button2', $_POST)) {
            button2();
        }

 function button2() {

$name = $_POST['employee_name'];
$id = $_POST['employee_id'];

if($id === ""){
    return;
}

//displaying the entire information of an employee
$db = new mysqli('localhost', 'root', '$iddh@13M', 'cc','3306');
$sql = "select * from employee where employee_name = '$name' and employee_id = '$id';";
$result1 = mysqli_query($db, $sql);
$result1 = mysqli_fetch_row($result1);

echo "Employee id : ".$id;
echo "<br>";
echo "Employee Name :".$name;
echo "<br>";
echo "Hire date : ".$result1[2];
echo "<br>";
echo "Project number : ".$result1[3];
echo "<br>";
echo "Job code : ".$result1[4];
echo "<br>";

$project_number = $result1[3];
$sql = "select project_name, manager_id from project where project_number = '$project_number';";
$result2 = mysqli_query($db, $sql);
$result2 = mysqli_fetch_row($result2);
echo "Project Name : ".$result2[0];
echo "<br>";
echo "Manager Id : ".$result2[1];
echo "<br>";
$sql = "select assignment_id from assignment where employee_id = '$id';";
$result3 = mysqli_query($db, $sql);
echo "Assignment id : ";
while($res3 = mysqli_fetch_row($result3)){
    echo $res3[0];
    echo ", ";
}

  }

if(array_key_exists('button3', $_POST)) {
            button3();
        }

 function button3() {

    $db = new mysqli('localhost', 'root', '$iddh@13M', 'cc','3306');
    $employee_name = $_POST['employee_name'];
    $employee_id = $_POST['employee_id'];
    $sql = "select count(a.employee_id) from attendance as a join employee as e on e.employee_id = a.employee_id where a.employee_id = '$employee_id' ;";
    $result = mysqli_query($db, $sql);
    $result = mysqli_fetch_row($result);
    echo  "Overall attendance : ".$result[0];

  }

if(array_key_exists('button4', $_POST)) {
            button4();
        }

 function button4() {

$db = new mysqli('localhost', 'root', '$iddh@13M', 'cc','3306');
$project_name = $_POST['project_name'];
$project_id = $_POST['project_number'];
$sql = "select p.manager_id, a.employee_id, a.assignment_id, b.profit from project as p join assignment as a on p.project_number = a.project_number join balance_table as b on b.project_number = p.project_number where p.project_number = '$project_id' and p.project_name = '$project_name';";
$result1 = mysqli_query($db, $sql);
$res = mysqli_fetch_row($result1);
$copy = $result1;
echo "Manager ID :".$res[0];
echo "<br>";
echo "Employee ID :".$res[1];
echo "<br>";
echo "Net Profit on project : ".$res[3];
echo "<br>";
echo "Assignments on the project : ";
echo $res[0];
    echo ", ";
 while($res = mysqli_fetch_row($result1)){
    echo $res[0];
    echo ", ";
 }
    
  }

if(array_key_exists('button5', $_POST)) {
            button5();
        }

 function button5() {

$manager_name = $_POST['manager_name'];
$manager_id = $_POST['manager_id'];
$db = new mysqli('localhost', 'root', '$iddh@13M', 'cc','3306');
$sql = "SELECT p.project_number, p.project_name from project as p join assignment as a on a.project_number = p.project_number join employee as e on e.employee_id = p.manager_id;";
$result = mysqli_query($db, $sql);
if($manager_id === ""){
    return;
}
echo "Projects guided by manager '$manager_name' : ";
echo "<br><br>";
while($res = mysqli_fetch_row($result)){
    echo "Project Number : ".$res[0];
    echo "<br>";
    echo "Project Name : ".$res[1];
    echo "<br><br>";
  }
}


if(array_key_exists('button6', $_POST)) {
            button6();
        }

 function button6() {
$db = new mysqli('localhost', 'root', '$iddh@13M', 'cc','3306');
$project_name = $_POST['project_name'];
$project_number = $_POST['project_number'];
$sql = "DELETE FROM project where project_name = '$project_name' and project_number = '$project_number';";
$result1 = mysqli_query($db, $sql);
  }

?>