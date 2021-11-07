<?php

$project_number = $_POST["project_number"];
$project_name = $_POST["project_name"];
$income = $_POST["income"];
$expense = $_POST["expense"];
$profit = $_POST["profit"];


	$db = new mysqli('localhost', 'root', '$iddh@13M', 'cc','3306');
if($db->connect_error){
		echo "123";
	}

$stmt = $db->prepare("insert into balance_table(project_number, project_name, income, expences, profit) values(?,?,?,?,?)");
$stmt->bind_param("isiii", $project_number, $project_name, $income, $expense, $profit);
$execval = $stmt->execute();
$stmt->close();
$db->close();




?>