<!DOCTYPE html>

<?php
  require_once('php/header_listings_EN.php');
  //require_once('db/unirent_functions.php');
  include('db/session.php');

  // print UniRent header
  do_unirent_header('My Rented Items');

  // connect to UniRent DB
  //$conn = db_connect();
?>


<!-- LISTINGS SECTION -->
<section class="clearfix bg-dark listyPage">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="dashboardPageTitle">
					<h2>My Rented Items</h2>
				</div>
				<div class="table-responsive"  data-pattern="priority-columns">
					<table class="table listingsTable">
						<thead>
							<tr class="rowItem">
								<th data-priority=""></th>
								<th data-priority="1">Item</th>
								<th data-priority="2">Price</th>
								<th data-priority="3">Initial Day</th>
								<th data-priority="4">End Day</th>
								<th data-priority="5">Category</th>
								<th data-priority="6">Status</th>
							</tr>
						</thead>
						<tbody>
							<tr class="rowItem">
								<td>
									<ul class="list-inline listingsInfo">
										<li><a href="#"><img src="img/dashboard/burger-img-01.png" alt="Image Listings"></a></li>
									</ul>
								</td>
								<td>Sande</td>
								<td>784</td>
								<td>29/01/2018</td>
								<td>28/02/2018</td>
								<td>Casa</td>
								<td><span class="label label-danger">Closed</span></td>
							</tr>
							<tr class="rowItem">
								<td>
									<ul class="list-inline listingsInfo">
										<li><a href="#"><img src="img/dashboard/burger-img-02.jpg" alt="Image Listings"></a></li>
									</ul>
								</td>
								<td>Mini hamburguers</td>
								<td>698</td>
								<td>29/01/2018</td>
								<td>15/12/2016</td>
								<td>Eletrodomestico</td>
								<td><span class="label label-success">On going</span></td>
							</tr>
							<tr class="rowItem">
								<td>
									<ul class="list-inline listingsInfo">
										<li><a href="#"><img src="img/dashboard/coffe-img-01.jpg" alt="Image Listings"></a></li>
									</ul>
								</td>
								<td>Copo de café</td>
								<td>450</td>
								<td>29/01/2018</td>
								<td>29/01/2018</td>
								<td>Banho</td>
								<td><span class="label label-danger">Closed</span></td>
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