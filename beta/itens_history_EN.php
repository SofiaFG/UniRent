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
        <h2>Rented</h2>
        <ol class="breadcrumb">
          <li><a href="listings_EN.php">Home</a></li>
          <li class="active">My rented itens</li>
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
								<div class="form-group col-md-4 col-sm-6 col-xs-12">
									<label for="itemName">Item Name</label>
									<input type="text" class="form-control" id="itemName" name="itemName" placeholder="Item Name">
								</div>
								<div class="form-group col-md-4 col-sm-6 col-xs-12">
									<label for="ownerUsername">Item owner username</label>
									<input type="text" class="form-control" id="ownerUsername" name="ownerUsername" placeholder="Owner username">
								</div>
								<div class="form-group col-md-4 col-sm-6 col-xs-12">
									<label for="totalPrice">Total Price</label>
									<input type="text" class="form-control" id="totalPrice" name="totalPrice" placeholder="€">
								</div>
								<div class="form-group col-md-4 col-sm-6 col-xs-12">
									<label for="initialRentalDay">Initial rental day</label>
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
									<label for="endRentalDay">End rental day</label>
									<div class="dateSelect">
										<div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
											<input type="text" class="form-control" id="endRentalDay" name="endRentalDay" placeholder="mm/dd/yyyy">
											<div class="input-group-addon">
												<i class="icon-listy icon-calendar"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group col-md-4 col-sm-6 col-xs-12">
									<label for="publishDate">Item publish date</label>
									<div class="dateSelect">
										<div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
											<input type="text" class="form-control" id="publishDate" name="publishDate" placeholder="mm/dd/yyyy">
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
						<thead>
							<tr>
								<th data-priority="0">Item ID</th>
								<th data-priority="1">Item Name</th>
								<th data-priority="2">Total Rental Price</th>
								<th data-priority="3">Initial rental day</th>
								<th data-priority="4">End rental day</th>
								<th data-priority="5">Status</th>
								<th data-priority="6">Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Item ID</th>
								<th>Item Name</th>
								<th>Total Rental Price</th>
								<th>Initial rental day</th>
								<th>End rental day</th>
								<th>Status</th>
								<th>Action</th>
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
											echo "<td><span class='label label-success'>In Progress</span></td>";
										} else if(date('Y-m-d') > date('Y-m-d', strtotime($endRentalDay))){
											echo "<td><span class='label label-danger'>Finished</span></td>";
										}
						                //echo "<td><span class='label label-warning'>Pending</span></td>";
						                echo "<td>";
						                	echo "<div class='btn-group'>";
						                	echo "<button type='button' class='btn btn-primary'>View</button>";
						                	echo "<button type='button' class='btn btn-primary'>Return</button>";
						                	echo "<button type='button' class='btn btn-primary'>Cancel</button>";
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

  require_once('php/footer_listings_EN.php');

  // print UniRent header
  do_unirent_footer();
?>
