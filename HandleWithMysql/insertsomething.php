<?php 
	include 'index.php';
	$server = "localhost:3306";
	$username = "useri";
	$password = "123zxc";
	
	//create connection
	$conn = new mysqli($servername, $username, $password);
	
	//check connection
	if ($conn->connect_error){
		die("Connection failed: ".$conn->connect_error);	
	}else{
		echo "Connected successfully";
	}

	//create database 
	echo "<br>";
	$sql = "CREATE DATABASE test;";
	if($conn->query($sql) === TRUE){
		echo "Database create successfully";
	}else{
		// $conn->query("DRPOP DATABASE test;");
		// $conn->query("CREATE DATABASE test;");
		// echo "Database create successfully;";
		echo "Error creating database: " . $conn->error;
	}

	//connect to db test
	echo "<br>";
	$conn = new mysqli($servername, $username, $password, "test");
	//create table guest
	$sql = "CREATE TABLE guest (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
								firstname VARCHAR(30) NOT NULL, 
								lastname VARCHAR(30) NOT NULL, 
								email VARCHAR(50), reg_date TIMESTAMP)";
	if($conn->query($sql) === TRUE){
		echo "Create table guest successfully";
	}else{
		// mysqli_query($conn,"DROP TABLE guest;");
		// mysqli_query($conn,$sql);
		// echo "Create table guest successfully";
		echo "Error creating table: " . $conn->error;
	}
	//insert something to table guest
	echo "<br>";
	$sql = "INSERT INTO guest (firstname, lastname, email) VALUES('Hentai', 'Everyday', 'cykablyat@gmail.com');";
	if (mysqli_query($conn, $sql) === TRUE){
		echo "Insert successfully";
	}else{
		echo "failed ".$conn->error;
	}

 ?>

