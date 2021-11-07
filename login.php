<?php

$name = $_POST["employee_name"];
$password = $_POST["employee_password"];

$db = new mysqli('localhost', 'root', '$iddh@13M', 'cc','3306');
$sql = "select count(*) from employee_details where employee_name = 'Siddhesh' and employee_password = '1234';";


$result = mysqli_query($db,$sql);
 $row = mysqli_fetch_array($result);

if($row[0] === '1'){
	header("Location: attendance.html");
}
else{
	echo " Account not found";
	echo "$row[0]";
	echo $name;
	echo $password;
	echo $sql;
}


?>