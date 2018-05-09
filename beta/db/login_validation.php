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

			// Calculate SHA1 of password input by user
			$hashPassword = sha1($password);

			$result = $conn->query("select * from Login where username = '$username' AND password = '$hashPassword'");

			if (!$result) {
				echo "Something is wrong!!";
			}

			if ($result->num_rows > 0) {
				$_SESSION['login_user'] = $username; // Initializing Session
				if ((strcmp("login",$pageName)) == 0) {
					header("location: ../listings.php"); // Redirecting To Portuguese Home Page
				} elseif ((strcmp("view",$pageName)) == 0) {
					$itemID = $_POST['itemID'];
					header("location: ../item_view_profile_preload.php?itemID=$itemID");
				} elseif ((strcmp("viewEN",$pageName)) == 0) {
					$itemID = $_POST['itemID'];
					header("location: ../item_view_profile_preload_EN.php?itemID=$itemID");
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