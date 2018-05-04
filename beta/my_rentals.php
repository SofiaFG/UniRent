<!DOCTYPE html>

<?php
  require_once('php/header_listings.php');
  //require_once('db/unirent_functions.php');
  include('db/session.php');

  // print UniRent header
  do_unirent_header('Os Meus Alugueres');

  // connect to UniRent DB
  //$conn = db_connect();
?>


<!-- LISTINGS SECTION -->
<section class="clearfix bg-dark listyPage">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="dashboardPageTitle">
					<h2>Meus aluguers</h2>
				</div>
				<div class="table-responsive"  data-pattern="priority-columns">
					<table class="table listingsTable">
						<thead>
							<tr class="rowItem">
								<th data-priority=""></th>
								<th data-priority="1">Bem</th>
								<th data-priority="2">Preço</th>
								<th data-priority="3">Dia inicial</th>
								<th data-priority="4">Dia final</th>
								<th data-priority="5">Categoria</th>
								<th data-priority="6">Status</th>
							</tr>
						</thead>
						<tbody>
							<tr class="rowItem">
								<td>
									<ul class="list-inline listingsInfo">
										<li><a href="#"><img src="img/dashboard/listing.jpg" alt="Image Listings"></a></li>
									</ul>
								</td>
								<td>TV</td>
								<td>784</td>
								<td>29/01/2018 <br>9.15am</td>
								<td>28/02/2018 <br>9.15am</td>
								<td>Casa</td>
								<td><span class="label label-danger">Finalizado</span></td>
							</tr>
							<tr class="rowItem">
								<td>
									<ul class="list-inline listingsInfo">
										<li><a href="#"><img src="img\things\things-5.jpg" alt="Image Listings"></a></li>
									</ul>
								</td>
								<td>Microondas</td>
								<td>698</td>
								<td>29/01/2018 <br>9.15am</td>
								<td>15/12/2016 <br>9.15am</td>
								<td>Eletrodomestico</td>
								<td><span class="label label-success">Em aluguer</span></td>
							</tr>
							<tr class="rowItem">
								<td>
									<ul class="list-inline listingsInfo">
										<li><a href="#"><img src="img\things\things-4.jpg" alt="Image Listings"></a></li>
									</ul>
								</td>
								<td>Escova de dente</td>
								<td>450</td>
								<td>29/01/2018 <br>9.15am</td>
								<td>29/01/2018 <br>9.15am</td>
								<td>Banho</td>
								<td><span class="label label-danger">Finalizado</span></td>
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
