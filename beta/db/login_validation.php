<?php
	
	require_once('unirent_functions.php');

  	// connect to UniRent DB
  	$conn = db_connect();

	session_start(); // Starting Session
	$error = ''; // Variable To Store Error Message

	if (isset($_POST['submit'])) {
		$pageName = $_POST['pageName'];
		if (empty($_POST['username']) || empty($_POST['password'])) {
			$error = "Username or Password is invalid";
			echo $error;
		} else {
			// Define $username and $password
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			// SQL query to fetch information of registerd users and finds user match.
			/**$getSHA1Password = $conn->query("select SHA1('$password') from Login where username = '$username'");


			if (!$getSHA1Password) {
				echo "Something is wrong with SHA1 Password!!";
			}

			// SHA1 password variable
			$passwordSHA1;

			if ($getSHA1Password->num_rows > 0) {
				while ($row = $getSHA1Password->fetch_assoc()) {
					unset($passwordSHA1);
		            $passwordSHA1 = $row['password'];
				}
			}*/

			//$result = $conn->query("select * from Login where username = '$username' AND password = '$passwordSHA1'");
			$result = $conn->query("select * from Login where username = '$username'");

			if (!$result) {
				echo "Something is wrong!!";
			}

			if ($result->num_rows > 0) {
				$_SESSION['login_user'] = $username; // Initializing Session
				if ((strcmp("login",$pageName)) == 0) {
					header("location: ../listings.php"); // Redirecting To Portuguese Home Page
				} else{ 
					header("location: ../listings_EN.php"); // Redirecting To English Home Page
				}
			} else {
				$error = "Username or Password is invalid";
				echo $error;
			}

			// disconnect to UniRent DB
  			$conn->close();
		}
	}
?>