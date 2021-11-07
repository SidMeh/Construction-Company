<?php

$conn = new mysqli('localhost', 'root', '$iddh@13M', 'sample', '3307');
		echo "Hello all Welcome to Goldman Sachs";
	if($conn->connect_error){
		echo "123";
	}
	else{
		echo "456";
	}
?>