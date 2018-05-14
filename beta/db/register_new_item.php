<?php
	// Include function files for this application
	require_once('unirent_functions.php');
	include('session.php');

	// Sobre o Bem variables
	$itemName            = $_POST['itemName'];
	$itemCategory        = $_POST['itemCategory'];
	$itemDescription     = $_POST['itemDescription'];
	$itemPrice    		 = $_POST['itemPrice'];
	$yearBought 		 = $_POST['yearBought'];
	
	// Galeria variables
	$videoUrl    		 = $_POST['videoUrl'];
	
	// Política de segurança variables
	$securityType  		 = $_POST['securityType'];
	$securityFee       	 = $_POST['securityFee'];
	$securityDescription = $_POST['securityDescription'];

	// Morada do Bem variables
	$country             = $_POST['country'];
	$city           	 = $_POST['city'];
	$addressLine1   	 = $_POST['addressLine1'];
	$addressLine2  		 = $_POST['addressLine2'];
	$postalCode     	 = $_POST['postalCode'];
	
	// Disponibilidade do Bem variables
	$initialAvailableDay = date('Y-m-d',strtotime($_POST['initialAvailableDay']));
	$endAvailableDay     = date('Y-m-d',strtotime($_POST['endAvailableDay']));

	// Hidden Field to control Language Page Redirections
	$pageName 		     = $_POST['pageName'];

	// Current day to insert the correct publish day in DB
	$today = date("Y/m/d");

	try {
		// Retrieve Login ID 
		$Login_idLogin = retrieve_Login($login_session);

		if ((strcmp("",$securityFee)) == 0) {
			//Attempt to register SecurityPolice
			$SecurityPolice_id = register_SecurityPolice($securityType, $securityDescription, 0);
		} else {
			//Attempt to register SecurityPolice
			$SecurityPolice_id = register_SecurityPolice($securityType, $securityDescription, $securityFee);
		}

		// Attempt to register Address DB
		$Address_id = register_Address($addressLine1, $addressLine2, $postalCode, $city, $country);

		// Attempt to register Item DB
		register_Item($itemName, $itemDescription, $itemPrice, $today, $yearBought, $videoUrl, $initialAvailableDay, $endAvailableDay, $Login_idLogin, $SecurityPolice_id, $itemCategory, $Address_id);

		// Redirect this user to manage_ads.php or manage_ads_EN.php depending the language
		if ((strcmp("add",$pageName)) == 0) {
			header("location: ../manage_ads.php"); // Redirecting To Portuguese Manage Ads Page
		} else{ 
			header("location: ../manage_ads_EN.php"); // Redirecting To English Manage Ads Page
		}
	} catch (Exception $e) {
		echo $e->getMessage();
		exit;
	}
?>