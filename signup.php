<?php

$name = $_POST["employee_name"];
$password = $_POST["employee_password"];
$password_r = $_POST["employee_password_r"];

if($password != $password_r or $name === "" or $password === ""){
	echo " Reenter password";
}

else{
	
	$db = new mysqli('localhost', 'root', '$iddh@13M', 'cc','3306');
	$sql = "select count(*) from employee_details where employee_name = ' ".$name." ' and employee_password = ' ".$password." ';";

	$result = mysqli_query($db,$sql);
 	$row = mysqli_fetch_array($result);
 	echo "$row[0]";
 //	echo "$row[1]";

	if($row[0] === '1'){
		echo "The record already exits Choose different password";
	}

	else{
		$sql = "insert into employee_details ( employee_name, employee_password) values ( '"." $name " . "' , '" ." $password "."' );";
		$result = mysqli_query($db,$sql);
		$sql = "select count(*) from employee_details;";
		$result = mysqli_query($db,$sql);
 		$row = mysqli_fetch_array($result);
 		echo "$row[0] is your new employee number. Record entered successfully";
 		echo $name;
 		echo $password;
 		header("Location: employee.html");
	}
}


 


?>