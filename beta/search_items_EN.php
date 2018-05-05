<!DOCTYPE html>

<?php
	require_once('php/header_EN.php');
	require_once('db/unirent_functions.php');

	// print UniRent header
	do_unirent_header('Find');

	// connect to UniRent DB
	$conn = db_connect();

	// Get searched item
	$findItem = $_POST['findItem'];
?>


<!-- DASHBOARD ORDERS SECTION -->
<section class="clearfix bg-dark dashboardOrders">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
					<div class="dashboardBoxBg mb30">
						<div class="profileIntro">
							<div class="row">
							<form action="" method="" class="listing__form">
									<h3>Filter by:</h3>
								<div class="form-group col-md-4 col-sm-6 col-xs-12">
									<label for="itemName">Item Name</label>
									<input type="text" class="form-control" id="itemName" name="itemName">
								</div>
								<div class="form-group col-md-4 col-sm-6 col-xs-12">
									<label for="initialRentalDay">Initial Rental Day</label>
									<div class="dateSelect">
										<div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
											<input type="text" class="form-control" id="initialRentalDay" name="initialRentalDay" placeholder="mm/dd/yyyy">
											<div class="input-group-addon">
												<i class="icon-listy icon-calendar"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group col-md-4 col-sm-6 col-xs-12">
									<label for="endRentalDay">End Rental Day</label>
									<div class="dateSelect">
										<div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
											<input type="text" class="form-control" id="endRentalDay" name="endRentalDay" placeholder="mm/dd/yyyy">
											<div class="input-group-addon">
												<i class="icon-listy icon-calendar"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="form-footer text-center">
									<button type="submit" id="submit" name="submit" class="btn-submit">Submit</button>
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
						$result_ToRent = $conn->query("SELECT * FROM Item i WHERE NOT EXISTS(SELECT * FROM Rental r WHERE r.Item_ID = i.id) AND i.name LIKE '%$findItem%'");

						if (!$result_ToRent) {
							throw new Exception('Could not execute Rental query');
						}

						// Rentals variables
						$name;
						$price;
						$publishDate;
						$initialAvailableDay;
						$endAvailableDay; 

						if ($result_ToRent->num_rows>0) {

							echo "<thead>";
								echo "<tr>";
									echo "<th data-priority='0'>Item Name</th>";
									echo "<th data-priority='1'>Rental Price</th>";
									echo "<th data-priority='2'>Publish Date</th>";
									echo "<th data-priority='3'>Initial Rental Day</th>";
									echo "<th data-priority='4'>End Rental Day</th>";
									echo "<th data-priority='5'>More Details</th>";
								echo "</tr>";
							echo "</thead>";
							echo "<tfoot>";
								echo "<tr>";
									echo "<th>Item Name</th>";
									echo "<th>Rental Price</th>";
									echo "<th>Publish Date</th>";
									echo "<th>Initial Rental Day</th>";
									echo "<th>End Rental Day</th>";
									echo "<th>More Details</th>";
								echo "</tr>";
							echo "</tfoot>";
							echo "<tbody>";
								
							while ($row = $result_ToRent->fetch_assoc()) {
								echo "<tr>";
								unset($name, $price, $publishDate, $initialAvailableDay, $endAvailableDay);
							    $name  		  		 = $row['name'];
								$price 				 = $row['price'];
								$publishDate     	 = $row['publishDate'];
								$initialAvailableDay = $row['initialAvailableDay'];
								$endAvailableDay 	 = $row['endAvailableDay'];

								echo "<td>$name</td>";
				                echo "<td>€ $price</td>";
				                echo "<td>$publishDate</td>";
				                echo "<td>$initialAvailableDay</td>";
				                echo "<td>$endAvailableDay</td>";
				                
				                echo "<td>";
									echo "<div class='btn-group'>";
										echo "<button type='submit' name='ver' id='ver' class='btn btn-primary'>View</button>";
									echo "</div>";
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

  require_once('php/footer_EN.php');

  // print UniRent header
  do_unirent_footer();
?>
