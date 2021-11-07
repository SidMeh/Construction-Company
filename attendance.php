<?php

$employee_name = $_POST["employee_name"];
$employee_id = $_POST["employee_id"];
$intime = $_POST["intime"];
$outtime = $_POST["outtime"];
$date = $_POST["date"];

$db = new mysqli('localhost', 'root', '$iddh@13M', 'cc','3306');
$sql = "insert into attendance (date, employee_id, intime, outtime) values ('$date', '$employee_id', '$intime', '$outtime');";
mysqli_query($db, $sql);

?>