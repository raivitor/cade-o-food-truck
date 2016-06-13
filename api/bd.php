<?php
function Conectar(){
	$id = 1;
	if($id == 1){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "food_truck";	
		$con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		return $con;
	}

	if($id == 2){
		$servername = "localhost";
		$username = "u326575944_truck";
		$password = "f00dtruck";
		$dbname = "u326575944_truck";	
		$con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		return $con;
	}
}
?>