<?php
	// Include function files for this application
	require_once('unirent_functions.php');

	// Newsletter email information
	$email    = $_POST['email'];

	// Hidden Field to control Language Page Redirections
	$pageName = $_POST['pageName'];

	try {
		// Attempt to register Customer DB due to Newsletter subscription
		if(register_Newsletter($email)) {
			// Redirect this user to send newsletter email
			if ((strcmp("login",$pageName)) == 0) {
				ini_set( 'display_errors', 1 );
				error_reporting( E_ALL );
			    $from = "contacto@unirent.online";
			    $to = $email;
			    $subject = "UniRent Newsletter";
			    $message = "Obrigado por subscrever a newsletter da UniRent";
			    $headers = "From:" . $from;
			    mail($to,$subject,$message, $headers);
			    header("location: ../index.php"); // Redirecting To Portuguese Home Page
			    echo "<script type='text/javascript'>alert('Obrigado pela sua subscrição!');</script>";
			} else{ 
				ini_set( 'display_errors', 1 );
				error_reporting( E_ALL );
			    $from = "contacto@unirent.online";
			    $to = $email;
			    $subject = "UniRent Newsletter";
			    $message = "Thanks for subscribe UniRent newsletter";
			    $headers = "From:" . $from;
			    mail($to,$subject,$message, $headers);
				header("location: ../index_EN.php"); // Redirecting To English Home Page
				echo "<script type='text/javascript'>alert('Thanks for your subscription!');</script>";
			}
		} else {
			echo "<script type='text/javascript'>alert('Erros in insert this email into DB!');</script>";
		}

	} catch (Exception $e) {
		echo $e->getMessage();
		exit;
	}
?>