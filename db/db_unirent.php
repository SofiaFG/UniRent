<?php
	// PHP file to connect with UniRent DB
	
	//db_connect(); //apenas para teste rápido
	// connect UniRent DB
	function db_connect() {

		$servername = "mysql.hostinger.com";
		$database = "u215407366_unir";
		$username = "u215407366_pat";
		$password = "EQzS1TXhpaFw";
		//$port = 3306;

		// Create connection
		// Connect to UniRent Hostiger DB
		$conn = new mysqli($servername, $username, $password, $database);

		// Connect to UniRent XAMPP Local DB
		//$conn = new mysqli('localhost', 'root', '', 'u215407366_unir');
		mysqli_set_charset( $conn, 'utf8');

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		//echo "Connected successfully";
		return $conn;

		mysqli_close($conn);
	}
?>