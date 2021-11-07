<?php

$project_name = $_POST["project_name"];
$project_number = $_POST["project_number"];
$manager_id = $_POST["manager_id"];


	$db = new mysqli('localhost', 'root', '$iddh@13M', 'cc','3306');
if($db->connect_error){
		echo "123";
	}

$stmt = $db->prepare("insert into project(project_number, project_name, manager_id) values(?,?,?)");
$stmt->bind_param("isi", $project_number, $project_name, $manager_id);
$execval = $stmt->execute();
$stmt->close();
$db->close();




?>