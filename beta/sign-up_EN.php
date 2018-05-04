<!DOCTYPE html>

<?php
  require_once('php/header_EN.php');
  require_once('db/unirent_functions.php');
  
  // print UniRent header
  do_unirent_header('Sign-Up - UniRent');
  
  // connect to UniRent DB
  $conn = db_connect();
?>


<style type="text/css">
 .scrollable{
    overflow: auto;
    position: absolute;
    width: 360px; /* adjust this width depending to amount of text to display */
	height: 370px; /* adjust height depending on number of options to display */
 }
 
 .hide {
 	display: none;
 }
</style>


<!-- PAGE TITLE SECTION -->
<section class="clearfix pageTitleSection" style="background-image: url();">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="pageTitle">
					<h2>Sign Up Page</h2>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- SIGN UP SECTION -->
<section class="clearfix signUpSection">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-xs-12">
				<div class="priceTableWrapper">
					<div class="priceTableTitle">
						<h2>Free <small>Pay only by your rentals</small></h2>
					</div>
					<div class="priceAmount">
						<h2>0<small> USD/Year</small></h2>
					</div>
					<div class="priceInfo">
						<ul class="list-unstyled">
							<li>15% of the transaction is ours</li>
							<li>And the rest to the renter</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-8 col-xs-12">
				<div class="signUpFormArea">
					<div class="priceTableTitle">
						<h2>Account Registration</h2>
						<p>Please fill out the fields below to create your account. We will send your account information to the email address you enter. Your email address and information will NOT be sold or shared with any 3rd party. If you already have an account, please, <a href="login_EN.php">click here</a>.</p>
					</div>
					<div class="signUpForm">
						<form action="db/register_new_user.php" method="POST">
							<div class="formSection">
								<h3>Personal Information</h3>
								<div class="row">
									<div class="form-group col-sm-6 col-xs-12">
										<label for="firstName" class="control-label">First Name*</label>
										<input maxlength="45" type="text" class="form-control" id="firstName" name="firstName">
									</div>
									<div class="form-group col-sm-6 col-xs-12">
										<label for="surname" class="control-label">Surname*</label>
										<input maxlength="45" type="text" class="form-control" id="surname" name="surname">
									</div>
									<div class="form-group col-sm-6 col-xs-12">
										<label for="emailAdress" class="control-label">Email Address*</label>
										<input maxlength="45" type="email" class="form-control" id="emailAdress" name="emailAdress">
									</div>
									<div class="form-group col-sm-6 col-xs-12">
										<label for="phoneNumber" class="control-label">Phone Number*</label>
										<input maxlength="13" type="text" class="form-control" id="phoneNumber" name="phoneNumber">
									</div>
									<div class="dateSelect col-sm-6 col-xs-12">
										<label for="dateOfBirthday" class="control-label">Date of Birthday*</label>
										<div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
											<input maxlength="10" type="text" class="form-control" name="dateOfBirthday" placeholder="mm/dd/yyyy">
											<div class="input-group-addon">
												<i class="fa fa-calendar" aria-hidden="true"></i>
											</div>
										</div>
									</div>
									<div class="form-group col-sm-6 col-xs-12">
										<label for="nationality" class="control-label">Nationality*</label>
										<div class="contactSelect scrollable">
											<select name="nationality" id="nationality" class="select-drop">

												<?php

													$result_nationality = $conn->query("select id, nationality from Nationality");

													while ($row = $result_nationality->fetch_assoc()) {
                  										unset($id, $name);
									                	$id = $row['id'];
									                	$name = $row['nationality']; 
									                	echo '<option value="'.$id.'">'.$name.'</option>';
													}

												?>

											</select>
										</div>
									</div>
									<div class="form-group col-sm-6 col-xs-12">
										<br><br>
										<label for="gender" class="control-label">Gender</label>
										<div class="contactSelect">
											<select name="gender" id="gender" class="select-drop">
												<option value="0">Male</option>
												<option value="1">Female</option>
												<option value="2">No specified</option>           
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="formSection">
								<h3>Account Information</h3>
								<div class="row">
									<div class="form-group col-xs-12">
										<label for="username" class="control-label">Username*</label>
										<input maxlength="15" type="text" class="form-control" id="username" name="username">
									</div>
									<div class="form-group col-sm-6 col-xs-12">
										<label for="password" class="control-label">Password*</label>
										<input maxlength="15" type="password" class="form-control" id="password" name="password">
									</div>
									<div class="form-group col-sm-6 col-xs-12">
										<label for="passwordAgain" class="control-label">Password (re-type)*</label>
										<input maxlength="15" type="password" class="form-control" id="passwordAgain" name="passwordAgain">
									</div>
								</div>
							</div>
							<div class="formSection">
								<h3>Address Information</h3>
								<div class="row">
									<div class="form-group col-sm-6 col-xs-12">
										<label for="country" class="control-label">Country</label>
										<div class="contactSelect scrollable">
											<select name="country" id="country" class="select-drop">

												<?php

													$result_Country = $conn->query("select id, countryEN from Country");

													while ($row = $result_Country->fetch_assoc()) {
                  										unset($id, $name);
									                	$id = $row['id'];
									                	$name = $row['countryEN']; 
									                	echo '<option value="'.$id.'">'.$name.'</option>';
													}

												?>

											</select>
										</div>
									</div>
									<div class="form-group col-sm-6 col-xs-12">
										<label for="city" class="control-label">City</label>
										<div class="contactSelect scrollable">
											<select name="city" id="city" class="select-drop">
												
												<?php

													$result_City = $conn->query("select id, name from City");

													while ($row = $result_City->fetch_assoc()) {
	                  									unset($id, $name);
										                $id = $row['id'];
										                $name = $row['name']; 
										                echo '<option value="'.$id.'">'.$name.'</option>';
													}

												?>

											</select>
										</div>
									</div>
									<div class="form-group col-xs-12">
										<br><br>
										<label for="addressLine1" class="control-label">Address Line 1*</label>
										<input maxlength="60" type="text" class="form-control" id="addressLine1" name="addressLine1">
									</div>
									<div class="form-group col-xs-12">
										<label for="addressLine2" class="control-label">Address Line 2</label>
										<input maxlength="60" type="text" class="form-control" id="addressLine2" name="addressLine2">
									</div>
									<div class="form-group col-xs-6">
										<label for="postalCode" class="control-label">Postal Code*</label>
										<input maxlength="15" type="text" class="form-control" id="postalCode" name="postalCode">
									</div>
								</div>
							</div>
							<div class="formSection">
								<h3>Student Information</h3>
								<div class="row">
									<div class="form-group col-xs-12">
										<label for="isStudent" class="control-label">Are you a student?*</label>
										<input type="radio" name="isStudent" value="isStudent" onclick="hideStudentFields();" />
										No 
										<input type="radio" name="isStudent" value="isStudent" onclick="showStudentFields();" />
										Yes
									</div>
									<div id="countryOfStudy" class="form-group col-sm-6 col-xs-12">
										<label for="countryOfStudy" class="control-label">Country of Study*</label>
										<div class="contactSelect scrollable">
											<select name="countryOfStudy" id="countryOfStudy" class="select-drop">

												<?php

													$result_StudyCountry = $conn->query("select id, countryEN from Country");

													while ($row = $result_StudyCountry->fetch_assoc()) {
                  										unset($id, $name);
									                	$id = $row['id'];
									                	$name = $row['countryEN']; 
									                	echo '<option value="'.$id.'">'.$name.'</option>';
													}

												?>

											</select>
										</div>
									</div>
									<div id="EducationalEstablishment" class="form-group col-sm-6 col-xs-12">
										<label for="EducationalEstablishment" class="control-label">Educational Establishment*</label>
										<div class="contactSelect scrollable">
											<select name="EducationalEstablishment" id="EducationalEstablishment" class="select-drop">
												
												<?php

													$result_Educational = $conn->query("select id, name from EducationalEstablishment");

													while ($row = $result_Educational->fetch_assoc()) {
	                  									unset($id, $name);
										                $id = $row['id'];
										                $name = $row['name']; 
										                echo '<option value="'.$id.'">'.$name.'</option>';
													}

												?>

											</select>
										</div>
									</div>
									<div id="courseArea" class="form-group col-sm-6 col-xs-12">
										<br><br>
										<label for="courseArea" class="control-label">Course area*</label>
										<div class="contactSelect scrollable">
											<select name="courseArea" id="courseArea" class="select-drop">
												
												<?php

													$result_courseArea = $conn->query("select id, name from CourseArea where language = 'EN'");

													while ($row = $result_courseArea->fetch_assoc()) {
	                  									unset($id, $name);
										                $id = $row['id'];
										                $name = $row['name']; 
										                echo '<option value="'.$id.'">'.$name.'</option>';
													}

												?>

											</select>
										</div>
									</div>
									<div id="studentDegree" class="form-group col-sm-6 col-xs-12">
										<br><br>
										<label for="studentDegree" class="control-label">Student Degree*</label>
										<div class="contactSelect">
											<select name="studentDegree" id="studentDegree" class="select-drop">
												<option value="Bachelor">Bachelor</option>
												<option value="Master">Master</option>
												<option value="Other">Other</option>           
											</select>
										</div>
									</div>
									<div id="course" class="form-group col-sm-6 col-xs-12">
										<label for="course" class="control-label">Course*</label>
										<div class="contactSelect scrollable">
											<select name="course" id="course" class="select-drop">
												
												<?php

													$result_course = $conn->query("select id, name from Course where language = 'EN'");

													while ($row = $result_course->fetch_assoc()) {
	                  									unset($id, $name);
										                $id = $row['id'];
										                $name = $row['name']; 
										                echo '<option value="'.$id.'">'.$name.'</option>';
													}

												?>

											</select>
										</div>
									</div>
									<div id="studentNumber" class="form-group col-xs-6">
										<label for="studentNumber" class="control-label">Student Number</label>
										<input maxlength="45" type="text" class="form-control" id="studentNumber" name="studentNumber">
									</div>
								</div>
							</div>
							</div>
							<div class="formSection">
								<h3>Security Control</h3>
									<div class="form-group col-xs-12">
										<div class="checkbox">
											<label>
												<input type="checkbox">
												I agree to the <a href="terms-of-services_EN.php">Terms of Use</a>. Your business listing is fully backed by our 100% money back guarantee.
											</label>
										</div>
									</div>
									<div class="form-group col-xs-12 mb0">
										<input type="hidden" name="pageName" value="loginEN"/>
										<button type="submit" name="submit_EN" class="btn btn-primary">Create Account</button>
									</div>
								</div>
							</div>
							<div class="formSection">
								<div class="cardBox">
									<div class="paymentMethod">
										<img src="img/business/paypal.png" alt="Image paypal">
									</div>
									<ul class="list-inline">
										<li><a href="#"><img src="img/business/visa.jpg" alt="Image card"></a></li>
										<li><a href="#"><img src="img/business/master-card.jpg" alt="Image card"></a></li>
										<li><a href="#"><img src="img/business/american-express.jpg" alt="Image card"></a></li>
										<li><a href="#"><img src="img/business/discover.jpg" alt="Image card"></a></li>
									</ul>
								</div>
								<p>We use <span>PayPal</span> to process all transactions securely. <span>Payments can be made using any major credit card, without the need for a PayPal account</span>. If you already have a PayPal account, you can also pay with PayPal funds or through your bank account. We don't keep any credit card information stored on our site. No tax is added to your order. For more information <a href="https://www.paypal.com" target="_blank">www.paypal.com</a></p>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<script type="text/javascript">
    function hideStudentFields(){
    	document.getElementById('countryOfStudy').style.display = 'none';
    	document.getElementById('EducationalEstablishment').style.display = 'none';
    	document.getElementById('courseArea').style.display = 'none';
    	document.getElementById('course').style.display = 'none';
  		document.getElementById('studentNumber').style.display = 'none';
  		document.getElementById('studentDegree').style.display = 'none';
	}

	function showStudentFields(){
		document.getElementById('countryOfStudy').style.display ='block';
		document.getElementById('EducationalEstablishment').style.display ='block';
		document.getElementById('courseArea').style.display ='block';
		document.getElementById('course').style.display ='block';
		document.getElementById('studentNumber').style.display ='block';
		document.getElementById('studentDegree').style.display ='block';
 
	}
</script>


<?php
  // disconnect to UniRent DB
  $conn->close();

  require_once('php/footer_EN.php');
  
  // print UniRent header
  do_unirent_footer();
?>
