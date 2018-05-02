<!DOCTYPE html>

<?php
  require_once('php/header.php');
  
  // print UniRent header
  do_unirent_header('Assurance - UniRent');
?>


<!-- PAGE TITLE SECTION -->
<section class="clearfix pageTitleSection" style="background-image: url();">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="pageTitle">
					<h2>Seguro</h2>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- PRICING TABLE -->
<section class="clearfix priceTableSection">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
				<div class="pricingIntro">
					<p>Choose your loving plan from below. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt  labore et dolore magna aliqua. Ut enim ad minim veniam</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 col-xs-12">
				<div class="priceTableWrapper">
					<div class="priceTableTitle">
						<h2>Free <small>Need Free Support</small></h2>
					</div>
					<div class="priceAmount">
						<h2>0<small>USD/Year</small></h2>
					</div>
					<div class="priceInfo">
						<ul class="priceShorting">
							<li class="active"><i class="fa fa-check-square"></i><p>Highlighted listing</p></li>
							<li><i class="fa fa-check-square"></i><p>Top listing placement on:</p>
								<ul>
									<li><i class="fa fa-check-square"></i>Search results</li>
									<li><i class="fa fa-check-square"></i>Selected categories</li>
									<li><i class="fa fa-check-square"></i>Added keywords</li>
								</ul>
							</li>
						</ul>
						<ul class="list-unstyled">
							<li>6 Products</li>
							<li>8 Photos</li>
							<li>5 Keywords</li>
							<li>6 Categories</li>
						</ul>
						<div class="priceBtn">
							<a href="sign-up.php" class="btn btn-primary">Get Started</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="priceTableWrapper advancedSupport active">
					<div class="priceTableTitle">
						<h2>Premium <small>Need Premium Support</small></h2>
					</div>
					<div class="priceAmount">
						<h2>199<small>USD/Year</small></h2>
					</div>
					<div class="priceInfo">
						<ul class="priceShorting">
							<li class="active"><i class="fa fa-check-square"></i><p>Highlighted listing</p></li>
							<li class="active"><i class="fa fa-check-square"></i><p>Top listing placement on:</p>
								<ul>
									<li class="active"><i class="fa fa-check-square"></i>Search results</li>
									<li><i class="fa fa-check-square"></i>Selected categories</li>
									<li><i class="fa fa-check-square"></i>Added keywords</li>
								</ul>
							</li>
						</ul>
						<p>Below Lifetime <a href="#">Preview</a></p>
						<ul class="list-unstyled">
							<li>25 Products</li>
							<li>20 Photos</li>
							<li>10 Keywords</li>
							<li>10 Categories</li>
						</ul>
						<div class="priceBtn">
							<a href="sign-up.php" class="btn btn-primary">Get Started</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="priceTableWrapper advancedSupport">
					<div class="priceTableTitle">
						<h2>Lifetime <small>Need Lifetime Support</small></h2>
					</div>
					<div class="priceAmount">
						<h2>299<small>USD/Year</small></h2>
					</div>
					<div class="priceInfo">
						<ul class="priceShorting">
							<li class="active"><i class="fa fa-check-square"></i><p>Highlighted listing</p></li>
							<li class="active"><i class="fa fa-check-square"></i><p>Top listing placement on:</p>
								<ul>
									<li class="active"><i class="fa fa-check-square"></i>Search results</li>
									<li class="active"><i class="fa fa-check-square"></i>Selected categories</li>
									<li class="active"><i class="fa fa-check-square"></i>Added keywords</li>
								</ul>
							</li>
						</ul>
						<p>Above Premium <a href="#">Preview</a></p>
						<ul class="list-unstyled">
							<li>30 Products</li>
							<li>25 Photos</li>
							<li>15 Keywords</li>
							<li>10 Categories</li>
						</ul>
						<div class="priceBtn">
							<a href="sign-up.php" class="btn btn-primary">Get Started</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12">
				<div class="signUpMessage">
					<p>Not have an Account? <a href="sign-up.php">Sign up</a></p>
				</div>
			</div>
		</div>
	</div>
</section>


<?php
  require_once('php/footer.php');
  
  // print UniRent header
  do_unirent_footer();
?>
