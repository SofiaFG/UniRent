<?php
	// PHP file to insert a new User in DB

	function register_Login($username, $password, $passwordAgain) {
		// register new Login in db
		// return true or error message
	
		// connect to db
		$conn = db_connect();

		// check if username is unique
		$result = $conn->query("select * from Login where username = '" . $username . "'");
	
		if (!$result) {
			throw new Exception('Could not execute query');
		}

		if ($result->num_rows>0) {
			throw new Exception('That username is taken - go back and choose another one.');
		}
	
		// If ok, put in db
		$result = $conn->query("insert into Login values('', '" . $username . "', '" . $password . "', '" . $passwordAgain . "')");

		if (!$result) {
			throw new Exception('Could not register you in database - please try again later.');
		}

		$conn->close();

		return true;
	}

	function register_Address($addressLine1, $addressLine2, $postalCode, $city, $country) {
		// register new Customer in db
		// return true or error message
	
		// connect to db
		$conn = db_connect();
	
		// If ok, put in db
		$sql = "insert into Address values('', '" . $addressLine1 . "', '" . $addressLine2 . "', '" . $postalCode . "', ". $city . ", ". $country . ")";

		if ($conn->query($sql) === TRUE) {
		    $last_id = $conn->insert_id;
		    //echo "New record created successfully. Last inserted ID is: " . $last_id;
		} else {
		    throw new Exception('Could not register you in database - please try again later.');
		}

		$conn->close();

		return $last_id;
	}
	
	function register_Customer($firstName, $surname, $dateOfBirthday, $emailAdress, $phoneNumber, $gender, $studentNumber, $studentDegree, $EducationalEstablishment, $course, $Address_id, $Login_idLogin, $nationality) {
		// register new Customer in db
		// return true or error message
	
		// connect to db
		$conn = db_connect();

		// check if email is unique
		$result = $conn->query("select * from Customer where email = '" . $emailAdress . "'");
	
		if (!$result) {
			throw new Exception('Could not execute query');
		}

		if ($result->num_rows>0) {
			throw new Exception('That username is taken - go back and choose another one.');
		}
	
		// If ok, put in db
		$result = $conn->query("insert into Customer values('', '" . $firstName . "', '" . $surname . "', '" . $dateOfBirthday . "', '" . $emailAdress . "', '". $phoneNumber . "', ". $gender . ", '', '', '', '". $studentNumber . "', '". $studentDegree . "', " . $EducationalEstablishment . ", " . $course . ", " . $Address_id . ", ". $Login_idLogin . ", ". $nationality . ")");
		
		if (!$result) {
			throw new Exception('Could not register you in database - please try again later.');
		}

		$conn->close();

		return true;
	}

	function retrieve_Login($username) {
		// register new Customer in db
		// return true or error message
	
		// connect to db
		$conn = db_connect();
		$idLogin;

		// check if email is unique
		$result = $conn->query("select * from Login where username = '" . $username . "'");
	
		if (!$result) {
			throw new Exception('Could not execute query');
		}

		if ($result->num_rows>0) {
			while ($row = $result->fetch_assoc()) {
				unset($idLogin);
	            $idLogin = $row['id'];
			}
		}

		$conn->close();

		return $idLogin;
	}

?>