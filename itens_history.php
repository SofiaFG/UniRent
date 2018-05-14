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
?>


<!-- Dashboard breadcrumb section -->
<div class="section dashboard-breadcrumb-section bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>Histórico de Alugados</h2>
        <ol class="breadcrumb">
          <li><a href="listings.php">Início</a></li>
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
					<div class="dashboardBoxBg mb30">
						<div class="profileIntro">
							<div class="row">
							<form action="" method="" class="listing__form">
									<h3>Filtrar por:</h3>
								<div class="form-group col-md-4 col-sm-6 col-xs-12">
									<label for="itemName">Nome do Bem</label>
									<input type="text" class="form-control" id="itemName" name="itemName">
								</div>
								<div class="form-group col-md-4 col-sm-6 col-xs-12">
									<label for="ownerUsername">Username do <em>Borrower</em></label>
									<input type="text" class="form-control" id="ownerUsername" name="ownerUsername">
								</div>
								<div class="form-group col-md-4 col-sm-6 col-xs-12">
									<label for="totalPrice">Preço Total</label>
									<input type="text" class="form-control" id="totalPrice" name="totalPrice" placeholder="€">
								</div>
								<div class="form-group col-md-4 col-sm-6 col-xs-12">
									<label for="initialRentalDay">Data de Início do Aluguer</label>
									<div class="dateSelect">
										<div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
											<input type="text" class="form-control" id="initialRentalDay" name="initialRentalDay" placeholder="dd/mm/aaaa">
											<div class="input-group-addon">
												<i class="icon-listy icon-calendar"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group col-md-4 col-sm-6 col-xs-12">
									<label for="endRentalDay">Data de Fim do Aluguer</label>
									<div class="dateSelect">
										<div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
											<input type="text" class="form-control" id="endRentalDay" name="endRentalDay" placeholder="dd/mm/aaaa">
											<div class="input-group-addon">
												<i class="icon-listy icon-calendar"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group col-md-4 col-sm-6 col-xs-12">
									<label for="publishDate">Data de Publicação do Bem</label>
									<div class="dateSelect">
										<div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
											<input type="text" class="form-control" id="publishDate" name="publishDate" placeholder="dd/mm/aaaa">
											<div class="input-group-addon">
												<i class="icon-listy icon-calendar"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="form-footer text-center">
									<button type="submit" id="submit" name="submit" class="btn-submit">Pesquisar</button>
								</div>
							</form>
							</div>
						</div>
					</div>
			</div>
			<div class="col-xs-12">
				<div class="table-responsive bgAdd"  data-pattern="priority-columns">
					<table id="ordersTable" class="table table-small-font table-bordered table-striped" cellspacing="0" width="100%">
					<?php	

						// check for Customer rentals in Rental DB
						$result_ToRent = $conn->query("select * from Item where Customer_id = " . $Login_idLogin . "");

						if (!$result_ToRent) {
							throw new Exception('Could not execute result_ToRent query');
						}

						// Rentals variables
						$id;
						$name;
						$price;
						$initialAvailableDay;
						$endAvailableDay; 

						if ($result_ToRent->num_rows>0) {

							echo "<thead>";
								echo "<tr>";
									echo "<th data-priority='0'>Nome do Bem</th>";
									echo "<th data-priority='1'>Borrower</th>";
									echo "<th data-priority='2'>Preço do Aluguer</th>";
									echo "<th data-priority='3'>Data de início do Aluguer</th>";
									echo "<th data-priority='4'>Data de fim do Aluguer</th>";
								echo "</tr>";
							echo "</thead>";
							echo "<tfoot>";
								echo "<tr>";
									echo "<th>Nome do Bem</th>";
									echo "<th>Borrower</th>";
									echo "<th>Preço do Aluguer</th>";
									echo "<th>Data de início do Aluguer</th>";
									echo "<th>Data de fim do Aluguer</th>";
								echo "</tr>";
							echo "</tfoot>";
							echo "<tbody>";
								
							while ($row = $result_ToRent->fetch_assoc()) {
								echo "<tr>";
								unset($id, $name, $price, $publishDate, $initialAvailableDay, $endAvailableDay);
							    $id  		  		 = $row['id'];
							    $name  		  		 = $row['name'];
								$price 				 = $row['price'];
								$publishDate     	 = $row['publishDate'];
								$initialAvailableDay = $row['initialAvailableDay'];
								$endAvailableDay 	 = $row['endAvailableDay'];

								echo "<td>$name</td>";
								echo "<td>$id</td>";
				                echo "<td>€ $price</td>";
				                echo "<td>$initialAvailableDay</td>";
				                echo "<td>$endAvailableDay</td>";

				                echo "</tr>";
							}
						} else {
							echo "<br><center><h2>Nenhum item encontrado </h2><i class='fa fa-frown' aria-hidden='true'></i></center>";
						}

						echo "</tbody>";
					?>
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
