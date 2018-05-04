<!DOCTYPE html>

<?php
	require_once('php/header_listings.php');
	require_once('db/unirent_functions.php');
	include('db/session.php');

	// print UniRent header
	do_unirent_header('Alugados');

	// connect to UniRent DB
	$conn = db_connect();

	// Retrieve Login ID 
	$Login_idLogin = retrieve_Login($login_session);

	/*********************************************************************************/
	/********************************** CUSTUMOR DB **********************************/
	/*********************************************************************************/

	// check for Customer data in Customer DB
	$result = $conn->query("select id, name, surname from Customer where Login_idLogin = " . $Login_idLogin . "");

	if (!$result) {
		throw new Exception('Could not execute Customer query');
	}

	// Customer variables
	$idCustomer;
	$firstName;
	$surname;

	if ($result->num_rows>0) {
		while ($row = $result->fetch_assoc()) {
			unset($idCustomer, $firstName, $surname);
		    $idCustomer = $row['id'];
		    $firstName  = $row['name'];
			$surname	= $row['surname'];
		}
	}

	/*********************************************************************************/
	/********************************** RENTAL DB ************************************/
	/*********************************************************************************/


	// check for Customer rentals in Rental DB
	$result_Rental = $conn->query("select * from Rental where Customer_id = " . $idCustomer . "");

	if (!$result_Rental) {
		throw new Exception('Could not execute Rental query');
	}

	// Rentals variables
	$Item_id;
	$initialRentalDay;
	$endRentalDay;
	$totalPrice;

	if ($result_Rental->num_rows>0) {
		while ($row = $result_Rental->fetch_assoc()) {
			unset($Item_id, $initialRentalDay, $endRentalDay, $totalPrice);
		    $Item_id  		  = $row['Item_id'];
			$initialRentalDay = $row['initialRentalDay'];
			$endRentalDay     = $row['endRentalDay'];
			$totalPrice       = number_format($row['totalPrice'], 2, '.', '');
		}
	}

	$idT = !empty($Item_id) ? $Item_id : "";
?>


<!-- Dashboard breadcrumb section -->
<div class="section dashboard-breadcrumb-section bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>Alugados</h2>
        <ol class="breadcrumb">
          <li><a href="listings.php">Início</a></li>
          <li class="active">Meus alugados</li>
        </ol>
      </div>
    </div>
  </div>
</div>


<!-- DASHBOARD ORDERS SECTION -->
<section class="clearfix bg-dark dashboardOrders">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="table-responsive bgAdd"  data-pattern="priority-columns">
					<table id="ordersTable" class="table table-small-font table-bordered table-striped" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th data-priority="0">ID do item</th>
								<th data-priority="1">Nome do item</th>
								<th data-priority="2">Preço total do aluguer</th>
								<th data-priority="3">Data inicial do aluguer</th>
								<th data-priority="4">Data final do aluguer</th>
								<th data-priority="5">Status</th>
								<th data-priority="6">Ações</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>ID do item</th>
								<th>Nome do item</th>
								<th>Preço total do aluguer</th>
								<th>Data inicial do aluguer</th>
								<th>Data final do aluguer</th>
								<th>Status</th>
								<th>Ações</th>
							</tr>
						</tfoot>
						<tbody>
							<tr>
								<?php

									$result_CheckItem = $conn->query("select id, name from Item where Customer_id = " . $idCustomer . "");

									while ($row = $result_CheckItem->fetch_assoc()) {
	  									unset($id, $name);
						                $id = $row['id'];
						                $name = $row['name']; 
						                echo "<td>$id</td>";
						                echo "<td>$name</td>";
						                echo "<td>€ $totalPrice</td>";
						                echo "<td>$initialRentalDay</td>";
						                echo "<td>$endRentalDay</td>";
						                if(date('Y-m-d') < date('Y-m-d', strtotime($endRentalDay))){
											echo "<td><span class='label label-success'>Em curso</span></td>";
										} else if(date('Y-m-d') > date('Y-m-d', strtotime($endRentalDay))){
											echo "<td><span class='label label-danger'>Finalisado</span></td>";
										}
						                //echo "<td><span class='label label-warning'>Pending</span></td>";
						                echo "<td>";
						                	echo "<div class='btn-group'>";
						                	echo "<button type='button' class='btn btn-primary'>Ver</button>";
						                	echo "<button type='button' class='btn btn-primary'>Editar</button>";
						                	echo "<button type='button' class='btn btn-primary'>Apagar</button>";
						                	echo "</div>";
						                echo "</td>";
									}

								?>
							</tr>
						</tbody>
					</table>
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
