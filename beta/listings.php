<!DOCTYPE html>

<?php
	require_once('php/header_listings_index.php');
	require_once('db/unirent_functions.php');
	include('db/session.php');

	// print UniRent header
	do_unirent_header($login_session . " | UniRent");

	// connect to UniRent DB
	$conn = db_connect();

	// Retrieve Login ID 
	$Login_idLogin = retrieve_Login($login_session);

	/*********************************************************************************/
	/********************************** CUSTUMOR DB **********************************/
	/*********************************************************************************/

	// check for Customer data in Customer DB
	$result = $conn->query("select name, surname, dateOfBirth, email, phoneNumber from Customer where Login_idLogin = " . $Login_idLogin . "");
	
	if (!$result) {
		throw new Exception('Could not execute Customer query');
	}

	// Customer variables
	$firstName;
	$surname;
	$dateOfBirthday;
	$emailAdress;
	$phoneNumber;

	if ($result->num_rows>0) {
		while ($row = $result->fetch_assoc()) {
			unset($firstName, $surname, $dateOfBirthday, $emailAdress, $phoneNumber);
		    $firstName                 = $row['name'];
			$surname				   = $row['surname'];
			$dateOfBirthday            = $row['dateOfBirth'];
			$emailAdress               = $row['email'];
			$phoneNumber               = $row['phoneNumber'];
		}
	}
	
	$dateFormated = date('d-m-Y', strtotime($dateOfBirthday));
?>


<!-- DASHBOARD PROFILE SECTION -->
<section class="clearfix bg-dark profileSection">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-5 col-xs-12">
				<div class="dashboardBoxBg mb30">
					<div class="profileImage">
						<img src="img/dashboard/avatar.png" alt="Image User" class="img-circle" width="170" height="170">
					</div>
					<div class="profileUserInfo bt profileName">
						<h4><?php echo $login_session; ?></h4>
						<h5><?php echo $emailAdress . " | " . $phoneNumber; ?></h5>
						<a href="profile.php" class="btn btn-primary">Alterar</a>
					</div>
				</div>
			</div>
			<div class="col-md-8 col-sm-7 col-xs-12">
				<form>
					<div class="dashboardBoxBg">
						<div class="profileIntro">
							<h2>Olá, <?php echo $firstName . " " . $surname; ?></h2>
							<p>Bem vindo/a ao teu perfil UniRent</p>
						</div>
					</div>
				</form>
			</div>
			<div class="col-sm-4 col-xs-12">
				<br><br>
				<div class="panel panel-default panel-card">
					<div class="panel-heading">
						Os meus bens <span class="label label-primary">Hoje</span>
					</div>
					<div class="panel-body">
						<h2>
							<?php
								// check for Customer rentals in Rental DB
								$result_ToRent = $conn->query("select * from Item where Customer_id = " . $Login_idLogin . "");

								if (!$result_ToRent) {
									throw new Exception('Could not execute result_ToRent query');
								}

								if ($result_ToRent->num_rows < 0) {
									echo $result_ToRent->num_rows . " unidades";
								} elseif ($result_ToRent->num_rows == 1) {
									echo $result_ToRent->num_rows . " unidade";
								} elseif ($result_ToRent->num_rows > 1) {
									echo $result_ToRent->num_rows . " unidades";
								} else {
									echo "0 unidades";
								}
							?>
						</h2>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<br><br>
				<div class="panel panel-default panel-card">
					<div class="panel-heading">
						Os meus alugueres <span class="label label-primary">Hoje</span>
					</div>
					<div class="panel-body">
						<h2>Sem alugueres</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php
  // disconnect to UniRent DB
  //$conn->close();

  require_once('php/footer_listings.php');

  // print UniRent header
  do_unirent_footer();
?>
