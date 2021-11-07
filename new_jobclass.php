<?php

$db = new mysqli('localhost', 'root', '$iddh@13M', 'cc','3306');
if($db->connect_error){
		echo "123";
	}

$sql = "select * from job_class";
$result = mysqli_query($db, $sql);

while($res = mysqli_fetch_array($result)){
	echo "JOB CODE : ".$res[0];
	echo "<br>";
	echo "JOB DESCRIPTION : ".$res[1];
	echo "<br>";
	echo "HOUR RATE : ".$res[2];
	echo "<br>";
	echo "<br>";
}






?>