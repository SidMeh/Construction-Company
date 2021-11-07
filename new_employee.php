<?php

$name = $_POST["employee_name"];
$id = $_POST["employee_id"];
$date = $_POST["hire_date"];
$project_no = $_POST["project_number"];
$jobcode = $_POST["jobcode"];

$db = new mysqli('localhost', 'root', '$iddh@13M', 'cc','3306')
or die('Unable to connect');

$stmt = $db->prepare("insert into employee(employee_id, employee_name, hire_date, project_number, jobcode) values(?,?,?,?, ?)");
$stmt->bind_param("issii", $id, $name, $date, $project_no, $jobcode);
$execval = $stmt->execute();
$stmt->close();
$db->close();




?>