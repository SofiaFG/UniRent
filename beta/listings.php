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
						<p><?php echo $emailAdress; ?></p>
						<h4>Seu aniversário: <?php echo $dateFormated; ?></h4>
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
							<p>Bem vindo/a ao seu perfil UniRent</p>
						</div>
					</div>
				</form>
			</div>
			<div class="col-sm-4 col-xs-12">
				<br><br>
				<div class="panel panel-default panel-card">
					<div class="panel-heading">
						Meus bens <span class="label label-primary">Hoje</span>
					</div>
					<div class="panel-body">
						<h2>0</h2>
						<p>Comparado com semana passada <span class="resultInfo resultUp">10% <i class="fa fa-level-up" aria-hidden="true"></i></span></p>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<br><br>
				<div class="panel panel-default panel-card">
					<div class="panel-heading">
						Meus aluguers <span class="label label-primary">Hoje</span>
					</div>
					<div class="panel-body">
						<h2>0</h2>
						<p>Comparado com semana passada <span class="resultInfo resultDown">5% <i class="fa fa-level-down" aria-hidden="true"></i></span></p>
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
