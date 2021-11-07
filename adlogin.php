<?php

$name = $_POST["adname"];
$password = $_POST["adpassword"];

$db = new mysqli('localhost', 'root', '$iddh@13M', 'cc','3306');
$sql = "select * from administrator ;";
echo "$name";
echo "$password";
$result = mysqli_query($db,$sql);
 $row = mysqli_fetch_array($result);

if($row[0] === $name and $row[1] === $password){
	header("Location: admin_view.html");
}
else{
	echo " Account not found";
	echo "$row[0]";
}


?>