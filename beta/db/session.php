<?php
	
	require_once('unirent_functions.php');

  	// connect to UniRent DB
  	$conn = db_connect();

	session_start();// Starting Session

	// Storing Session
	$user_check = $_SESSION['login_user'];

	// SQL Query To Fetch Complete Information Of User
	$result = $conn->query("select username from Login where username = '$user_check'");

	$row = $result->fetch_assoc();
	$login_session = $row['username'];

	if(!isset($login_session)){
  		$conn->close(); // Closing Connection
		header("location: ../listings.php"); // Redirecting To Portuguese Home Page
	}
?>