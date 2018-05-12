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
        <h2>Gerir Anúncios</h2>
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
									echo "<th data-priority='0'>ID do Bem</th>";
									echo "<th data-priority='1'>Nome do Bem</th>";
									echo "<th data-priority='2'>Preço do Aluguer</th>";
									echo "<th data-priority='3'>Data de início do Aluguer</th>";
									echo "<th data-priority='4'>Data de fim do Aluguer</th>";
									echo "<th data-priority='5'>Status</th>";
									echo "<th data-priority='6'>Ações</th>";
								echo "</tr>";
							echo "</thead>";
							echo "<tfoot>";
								echo "<tr>";
									echo "<th>ID do Bem</th>";
									echo "<th>Nome do Bem</th>";
									echo "<th>Preço do Aluguer</th>";
									echo "<th>Data de início do Aluguer</th>";
									echo "<th>Data de fim do Aluguer</th>";
									echo "<th>Status</th>";
									echo "<th>Ações</th>";
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

								echo "<td>$id</td>";
								echo "<td>$name</td>";
				                echo "<td>€ $price</td>";
				                echo "<td>$initialAvailableDay</td>";
				                echo "<td>$endAvailableDay</td>";

								$result_AlreadyRented = $conn->query("SELECT * FROM Item i WHERE NOT EXISTS(SELECT * FROM Rental r WHERE r.Item_ID = i.id AND i.id = $id)");

								if($result_AlreadyRented->num_rows > 0) {
									echo "<td><span class='label label-success'>Disponível</span></td>";
								} else {
									echo "<td><span class='label label-warning'>Alugado</span></td>";
								} 

								echo "<td>";
									echo "<form action='view_item_profile.php' method='GET'>";
									echo "<div class='btn-group'>";
										echo "<button type='submit' name='itemID' id='itemID' value='$id' class='btn btn-primary'>Ver</button>";
										echo "<button type='button' name='ver' id='ver' class='btn btn-primary'>Editar</button>";
										echo "<button type='button' name='ver' id='ver' class='btn btn-primary'>Apagar</button>";
									echo "</div>";
									echo "</form>";
								echo "</td>";
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
