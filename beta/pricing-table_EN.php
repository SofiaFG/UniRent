<!DOCTYPE html>

<?php
  require_once('php/header_EN.php');
  
  // print UniRent header
  do_unirent_header('Assurance - UniRent');
?>


<!-- PAGE TITLE SECTION -->
<section class="clearfix pageTitleSection" style="background-image: url();">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="pageTitle">
					<h2>Assurance</h2>
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
					<p>We offer you the option to add an assurance to each rental you make, that way you won't have to worry about any security deposit or statement of responsability to cover any eventuality that happens with the good you are renting.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="priceTableWrapper advancedSupport">
					<div class="priceTableTitle">
						<h2>Without Assurance</h2><br>
					</div>
					<div class="priceAmount">
						<h2>0<small>€</small></h2>
					</div>
					<div class="priceInfo">
						<ul class="priceShorting">
							<li><i class="fa fa-check-square"></i><p>UniRent doesn't take responsability</p></li>
							<li><i class="fa fa-check-square"></i><p>Bond to <u>Owner's</u> Conditions:</p>
								<ul>
									<li><i class="fa fa-check-square"></i>Security Deposit</li>
									<li><i class="fa fa-check-square"></i>Statement of Responsability</li>
								</ul>
							</li>
						</ul>
						<div class="priceBtn">
							<a href="sign-up_EN.php" class="btn btn-primary">Start Now</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<div class="priceTableWrapper advancedSupport active">
					<div class="priceTableTitle">
						<h2>With Assurance<small>Without Concerns</small></h2>
					</div>
					<div class="priceAmount">
						<h2>Variable<sup>*</sup></h2>
					</div>
					<div class="priceInfo">
						<ul class="priceShorting">
							<li class="active"><i class="fa fa-check-square"></i><p>UniRent covers any and all damages</p></li>
							<li class="active"><i class="fa fa-check-square"></i><p>The <u>Owner's</u> Conditions have no effect:</p>
								<ul>
									<li class="active"><i class="fa fa-check-square"></i>Without Security Deposit</li>
									<li class="active"><i class="fa fa-check-square"></i>Without Statement of Responsability</li>
								</ul>
							</li>
						</ul>
						<div class="priceBtn">
							<a href="sign-up_EN.php" class="btn btn-primary">Rent with no Fears!</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12">
				<div class="signUpMessage">
					<p>Not have an Account? <a href="sign-up_EN.php">Sign up</a></p>
				</div>
			</div>
		</div>
	</div>
</section>


<?php
  require_once('php/footer_EN.php');
  
  // print UniRent header
  do_unirent_footer();
?>
