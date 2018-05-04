<?php
	session_start();

	if(session_destroy()) { // Destroying All Sessions 
		header("Location: ../index_EN.php"); // Redirecting To Home Page
	}
?>