<!DOCTYPE html>

<?php
	require_once('php/header_listings_EN.php');
	//require_once('db/unirent_functions.php');
	include('db/session.php');

	// print UniRent header
	do_unirent_header('Rented');

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
        <h2>Manage Ads</h2>
        <ol class="breadcrumb">
          <li><a href="listings_EN.php">Home</a></li>
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
									echo "<th data-priority='0'>Item Name</th>";
									echo "<th data-priority='1'>Rental Price</th>";
									echo "<th data-priority='2'>Inital Rental Day</th>";
									echo "<th data-priority='3'>End Rental Day</th>";
									echo "<th data-priority='4'>Status</th>";
									echo "<th data-priority='5'>Actions</th>";
								echo "</tr>";
							echo "</thead>";
							echo "<tfoot>";
								echo "<tr>";
									echo "<th>Item Name</th>";
									echo "<th>Rental Price</th>";
									echo "<th>Inital Rental Day</th>";
									echo "<th>End Rental Day</th>";
									echo "<th>Status</th>";
									echo "<th>Actions</th>";
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
				                echo "<td>€ $price</td>";
				                echo "<td>$initialAvailableDay</td>";
				                echo "<td>$endAvailableDay</td>";

								$result_AlreadyRented = $conn->query("SELECT * FROM Item i WHERE NOT EXISTS(SELECT * FROM Rental r WHERE r.Item_ID = i.id AND i.id = $id)");

								if($result_AlreadyRented->num_rows > 0) {
									echo "<td><span class='label label-success'>Available</span></td>";
								} else {
									echo "<td><span class='label label-warning'>Rented</span></td>";
								} 

								echo "<td>";
									echo "<form action='view_item_profile_EN.php' method='GET'>";
									echo "<div class='btn-group'>";
										echo "<button type='submit' name='itemID' id='itemID' value='$id' class='btn btn-primary'>View</button>";
										echo "<button type='button' name='ver' id='ver' class='btn btn-primary'>Edit</button>";
										echo "<button type='button' name='ver' id='ver' class='btn btn-primary'>Delete</button>";
									echo "</div>";
									echo "</form>";
								echo "</td>";
								echo "</tr>";
							}
						} else {
							echo "<br><center><h2>No item found </h2><i class='fa fa-frown' aria-hidden='true'></i></center>";
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

  require_once('php/footer_listings_EN.php');

  // print UniRent header
  do_unirent_footer();
?>
