<!DOCTYPE html>

<?php
  require_once('php/header_EN.php');
  // print UniRent header
  do_unirent_header('Contact Us - UniRent');
?>


<!-- PAGE TITLE SECTION -->
<section class="clearfix pageTitleSection bg-image" style="background-image: url(img/banner/6.png);">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="pageTitle">
					<h2>Contact Us</h2>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- CONTACT SECTION -->
<section class="clearfix">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-xs-12">
				<div class="clearfix map-sidebar">
					<div id="map" style="position:relative; margin: 0;padding: 0;height: 538px; max-width: none;"></div>
				</div>
				<div class="contactInfo">
					<ul class="list-unstyled list-address">
						<li>
							<i class="fa fa-map-marker" aria-hidden="true"></i>
							1st Floor - Time Out Market Lisboa <br> Avenida 24 de Julho 1200-479 <br> Lisboa, Portugal
						</li>
						<li>
							<i class="fa fa-phone" aria-hidden="true"></i>
							[+351] 657 524 332 <br> [+351] 657 524 333
						</li>
						<li>
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<a href="mailto:contacto@unirent.online?Subject=Contact%20UniRent" target="_top">contacto@unirent.online</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-sm-8 col-xs-12">
				<div class="signUpFormArea">
					<div class="priceTableTitle">
						<h2>Get inTouch</h2>
						<p>Please feel free to contact us if you have queries, require more information or have any other request.</p>
					</div>
					<div class="signUpForm">
						<form action="#" method="">
							<div class="formSection">
								<div class="row">
									<div class="form-group col-sm-6 col-xs-12">
										<label for="selectSome" class="control-label">Please choose a request type below*</label>
										<div class="contactSelect">
											<select name="guiest_id8" id="guiest_id8" class="select-drop">
												<option value="0">-- Select Subject --</option>
												<option value="1">I am a Student (to rent)</option>
												<option value="2">I am a Student (reting)</option>           
											</select>
										</div>
									</div>
									<div class="form-group col-sm-6 col-xs-12">
										<label for="companyName" class="control-label">Subject*</label>
										<input type="text" class="form-control" id="companyName">
									</div>
									<div class="form-group col-xs-12">
										<label for="yourName" class="control-label">Your Name*</label>
										<input type="text" class="form-control" id="yourName">
									</div>
									<div class="form-group col-xs-12">
										<label for="emailAddress" class="control-label">Email Address*</label>
										<input type="email" class="form-control" id="emailAddress">
									</div>
									<div class="form-group col-xs-12">
										<label for="textBox" class="control-label">Text*</label>
										<textarea class="form-control" rows="3"></textarea>
									</div>
									<div class="form-group col-xs-12 mb0">
										<button type="submit" class="btn btn-primary">Send Now</button>
									</div>
								</div>
							</div>
						</form>
					</div>
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
