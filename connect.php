<?php 
	
	$dbUser = 'hostels';
	$dbPassword = ''; //TODO: Enter your password here
	$host = '10.105.177.5';
	try{
		$conn = new PDO("mysql:host=$host;dbname=hostels_donation",$dbUser,$dbPassword);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo "Error:".$e->getMessage();
	}

 ?>
