<?php
	// Include function files for this application
	require_once('unirent_functions.php');
	//require_once('../php/Encryption/passwordEncryption.php');

	// Personal Information variables
	$firstName      		  = $_POST['firstName'];
	$surname        		  = $_POST['surname'];
	$emailAdress    		  = $_POST['emailAdress'];
	$phoneNumber    		  = $_POST['phoneNumber'];
	$dateOfBirthday 		  = date('Y-m-d',strtotime($_POST['dateOfBirthday']));
	$nationality    		  = $_POST['nationality'];
	$gender         		  = $_POST['gender'];

	// Account Information variables
	$username       		  = $_POST['username'];
	$password       		  = $_POST['password'];
	$passwordAgain  		  = $_POST['passwordAgain'];

	// Address Information variables
	$country        		  = $_POST['country'];
	$city           		  = $_POST['city'];
	$addressLine1   		  = $_POST['addressLine1'];
	$addressLine2  		  	  = $_POST['addressLine2'];
	$postalCode     		  = $_POST['postalCode'];
	
	// Student Information variables
	$countryOfStudy			  = $_POST['countryOfStudy'];
	$EducationalEstablishment = $_POST['EducationalEstablishment'];
	$courseArea  		  	  = $_POST['courseArea'];
	$studentDegree  		  = $_POST['studentDegree'];
	$course          		  = $_POST['course'];
	$studentNumber  		  = $_POST['studentNumber'];

	// Hidden Field to control Language Page Redirections
	$pageName 				  = $_POST['pageName'];

	// Start session which may be needed later
	// Start it now because it must go before headers
	session_start();

	try {
		// Check forms filled in
		//if (!filled_out($_POST)) {
		//	throw new Exception('You have not filled the form out correctly – please go back and try again.');
			//BootstrapDialog.alert('I want banana!');
		//}

		// Email address not valid
//		if (!valid_email($emailAdress)) {
//			throw new Exception('That is not a valid email address. Please go back and try again.');
//		}

		// Passwords not the same
		if ($password != $passwordAgain) {
			throw new Exception('The passwords you entered do not match – please go back and try again.');
		}

		// Check password length is ok
		// OK if username truncates, but passwords will get
		// Munged if they are too long.
		if ((strlen($password) < 6) || (strlen($password) > 16)) {
			throw new Exception('Your password must be between 6 and 16 characters. Please go back and try again.');
		}

		/**
		$converter = new Encryption;
		$encoded = $converter->encode($password);
		$encodedAgain = $converter->encode($passwordAgain); 
		*/

		// Attempt to register Loing DB
		register_Login($username, $password, $passwordAgain);

		// Retrieve Login ID 
		$Login_idLogin = retrieve_Login($username);

		// Attempt to register Address DB
		$Address_id = register_Address($addressLine1, $addressLine2, $postalCode, $city, $country);

		// Attempt to register Customer DB
		register_Customer($firstName, $surname, $dateOfBirthday, $emailAdress, $phoneNumber, $gender, $studentNumber, $studentDegree, $EducationalEstablishment, $course, $Address_id, $Login_idLogin, $nationality);

		// Register session variable
		$_SESSION['login_user'] = $username;
		echo $_SESSION['login_user'];

		// Redirect this user to listings.php or listings_EN.php depending the language
		if ((strcmp("login",$pageName)) == 0) {
			header("location: ../listings.php"); // Redirecting To Portuguese Home Page
		} else{ 
			header("location: ../listings_EN.php"); // Redirecting To English Home Page
		}
	} catch (Exception $e) {
//		do_html_header('Problem:');
		echo $e->getMessage();
//		do_html_footer();
		exit;
	}
?>