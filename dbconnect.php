<?php
function Connection(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "smokegasdetector";
	
	$dblink = mysqli_connect($servername, $username, $password, $dbname);
	if(!$dblink) {
		die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully" . "<br>";
	return $dblink;
}	
?>