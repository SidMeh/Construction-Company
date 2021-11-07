<?php

$assignment_id = $_POST["assignment_id"];
$assignment_name = $_POST["assignment_name"];
$employee_id = $_POST["employee_id"];
$project_number = $_POST["project_number"];
$hours = $_POST["hours"];


	$db = new mysqli('localhost', 'root', '$iddh@13M', 'cc','3306');
if($db->connect_error){
		echo "123";
	}

$stmt = $db->prepare("insert into assignment(assignment_id, assignment_name, project_number, employee_id, hours) values(?,?,?,?,?)");
$stmt->bind_param("isiii", $assignment_id, $assignment_name, $project_number, $employee_id, $hours);
$execval = $stmt->execute();
$stmt->close();
$db->close();




?>