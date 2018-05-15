<!DOCTYPE html>

<?php
	require_once('php/header_listings.php');
	require_once('db/unirent_functions.php');
	include('db/session.php');

	// print UniRent header
	do_unirent_header('Meu Perfil');

	// connect to UniRent DB
	$conn = db_connect();

	// Retrieve Login ID 
	$Login_idLogin = retrieve_Login($login_session);

	/*********************************************************************************/
	/************************************ LOGIN DB ***********************************/
	/*********************************************************************************/

	// check for Customer data in Customer DB
	$result_login = $conn->query("select password from Login where id = " . $Login_idLogin . "");

	if (!$result_login) {
		throw new Exception('Could not execute Login query');
	}

	// Customer variables
	$password_login;

	if ($result_login->num_rows>0) {
		while ($row = $result_login->fetch_assoc()) {
			unset($password_login);
			$password_login  = $row['password'];
		}
	}

	/*********************************************************************************/
	/********************************** CUSTUMOR DB **********************************/
	/*********************************************************************************/

	// check for Customer data in Customer DB
	$result = $conn->query("select * from Customer where Login_idLogin = " . $Login_idLogin . "");

	if (!$result) {
		throw new Exception('Could not execute Customer query');
	}

	// Customer variables
	$firstName;
	$surname;
	$dateOfBirthday;
	$emailAdress;
	$phoneNumber;
	$gender;
	$studentNumber;
	$studentDegree;
	$EducationalEstablishment;
	$course;
	$Address_id;
	$Login_idLogin;
	$Nationality_id;

	if ($result->num_rows>0) {
		while ($row = $result->fetch_assoc()) {
			unset($firstName, $surname, $dateOfBirthday, $emailAdress, $phoneNumber, $gender, $studentNumber, $studentDegree, $EducationalEstablishment, $course, $Address_id, $Login_idLogin, $nationality);
		    $firstName                 = $row['name'];
			$surname				   = $row['surname'];
			$dateOfBirthday            = $row['dateOfBirth'];
			$emailAdress               = $row['email'];
			$phoneNumber               = $row['phoneNumber'];
			$gender                    = $row['gender'];
			$studentNumber             = $row['studentNumber'];
			$studentDegree             = $row['studentDegree'];
			$EducationalEstablishment  = $row['EduacationEstablishment_id'];
			$course					   = $row['Course_id'];
			$Address_id                = $row['Address_id'];
			$Login_idLogin             = $row['Login_idLogin'];
			$Nationality_id            = $row['Nationality_id'];
		}
	}

	$dateFormated = date('d-m-Y', strtotime($dateOfBirthday));

	/*********************************************************************************/
	/********************************** ADDRESS DB ***********************************/
	/*********************************************************************************/


	// check for Customer address in Address DB
	$result_Address = $conn->query("select * from Address where id = " . $Address_id . "");

	if (!$result_Address) {
		throw new Exception('Could not execute Address query');
	}

	// Address variables
	$addressLine1;
	$addressLine2;
	$postalCode;
	$City_id;
	$Country_id;

	if ($result_Address->num_rows>0) {
		while ($row = $result_Address->fetch_assoc()) {
			unset($addressLine1, $addressLine2, $postalCode, $City_id, $Country_id);
		    $addressLine1  = $row['addressLine1'];
			$addressLine2  = $row['addressLine2'];
			$postalCode    = $row['postalCode'];
			$City_id       = $row['City_id'];
			$Country_id    = $row['Country_id'];
		}
	}

	/*********************************************************************************/
	/********************************** COURSE DB ************************************/
	/*********************************************************************************/


	// check for Customer course are in Course DB
	$result_CourseArea = $conn->query("select CourseArea_id from Course where id = " . $course . "");

	if (!$result_CourseArea) {
		throw new Exception('Could not execute Course query');
	}

	// Address variables
	$CourseArea_id;

	if ($result_CourseArea->num_rows>0) {
		while ($row = $result_CourseArea->fetch_assoc()) {
			unset($CourseArea_id);
			$CourseArea_id  = $row['CourseArea_id'];
		}
	}

	/*********************************************************************************/
	/************************* EDUCATIONALESTABLISHMENT DB ***************************/
	/*********************************************************************************/


	// check for Customer country of educational establishment are in EducationalEstablishment DB
	$result_EducationalEstablishment = $conn->query("select Country_id from EducationalEstablishment where id = " . $EducationalEstablishment . "");

	if (!$result_EducationalEstablishment) {
		throw new Exception('Could not execute Educational Establishment query');
	}

	// Address variables
	$Country_id_EducationalEstablishment;

	if ($result_EducationalEstablishment->num_rows>0) {
		while ($row = $result_EducationalEstablishment->fetch_assoc()) {
			unset($Country_id_EducationalEstablishment);
			$Country_id_EducationalEstablishment  = $row['Country_id'];
		}
	}
?>

<style type="text/css">
 .scrollable{
    overflow: auto;
    position: absolute;
    width: 330px; /* adjust this width depending to amount of text to display */
	height: 370px; /* adjust height depending on number of options to display */
 }
 
 .hide {
 	display: none;
 }
</style>


<script>
  function validateForm() {

  	  // Check Meu Perfil for empty fields
      var firstName 	  = document.forms["update_profile"]["firstName"].value;
      var surname 		  = document.forms["update_profile"]["surname"].value;
      var emailAdress 	  = document.forms["update_profile"]["emailAdress"].value;
      var phoneNumber 	  = document.forms["update_profile"]["phoneNumber"].value;
      var dateOfBirthday  = document.forms["update_profile"]["dateOfBirthday"].value;
      
      if (firstName == "") {
          alert("Por favor, introduza o seu primeiro nome!");
          document.getElementById("firstName").focus();
          return false;
      }

      if (surname == "") {
          alert("Por favor, introduza o seu último nome!");
          document.getElementById("surname").focus();
          return false;
      }

      if (emailAdress == "") {
          alert("Por favor, introduza o seu endereço de email!");
          document.getElementById("emailAdress").focus();
          return false;
      }

      if (phoneNumber == "") {
          alert("Por favor, introduza o seu número de telemóvel!");
          document.getElementById("phoneNumber").focus();
          return false;
      }

      if (dateOfBirthday == "") {
          alert("Por favor, introduza a sua data de nascimento!");
          document.getElementById("dateOfBirthday").focus();
          return false;
      }
  }

  function validatePasswordForm() {

  	  //Check Informações de conta for empty fields
      var newPassword 	  = document.forms["update_password"]["newPassword"].value;
      var confirmPassword = document.forms["update_password"]["confirmPassword"].value;

      if (newPassword == "") {
          alert("Por favor, introduza a sua nova palavra-passe!");
          document.getElementById("newPassword").focus();
          return false;
      }

      if (confirmPassword == "") {
          alert("Por favor, introduza a confirmação da sua nova palavra-passe!");
          document.getElementById("confirmPassword").focus();
          return false;
      }
  }
</script>


<!-- Dashboard breadcrumb section -->
<div class="section dashboard-breadcrumb-section bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>Meu Perfil</h2>
        <ol class="breadcrumb">
          <li><a href="listings.php">Início</a></li>
        </ol>
      </div>
    </div>
  </div>
</div>


<!-- DASHBOARD PROFILE SECTION -->
<section class="clearfix bg-dark profileSection">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-5 col-xs-12">
				<div class="dashboardBoxBg mb30">
					<div class="profileImage">
						<img src="img/dashboard/avatar.png" alt="Image User" class="img-circle" width="170" height="170">
						<div class="file-upload profileImageUpload">
							<div class="upload-area">
								<input type="file" name="img[]" class="file">
								<button class="browse" type="button">Carregar uma imagem <i class="icon-listy icon-upload"></i></button>
							</div>
						</div>
					</div>
					<div class="profileUserInfo bt profileName">
						<h4>Próximo Pagamento do Plano de Seguro: <span>15/01/2017</span></h4>
						<a href="#" class="btn btn-primary">Alterar</a>
					</div>
				</div>
			</div>
			<div class="col-md-8 col-sm-7 col-xs-12">
				<form name="update_profile" onsubmit="return validateForm()" action="#" method="#">
					<div class="dashboardBoxBg">
						<div class="profileIntro">
							<h2>O teu perfil</h2>
							<p><?php echo $firstName . " " . $surname; ?>, por favor, verifica os teus dados:</p>
						</div>
					</div>
					<div class="dashboardBoxBg mt30">
						<div class="profileIntro">
							<h3>Informações de Contacto</h3>
							<div class="row">
								<div class="form-group col-sm-6 col-xs-12">
									<label for="firstName">Primeiro Nome</label>
									<input maxlength="45" type="text" class="form-control" id="firstName" name="firstName" placeholder="<?php echo  $firstName ?>" value="<?php echo  $firstName ?>">
								</div>
								<div class="form-group col-sm-6 col-xs-12">
									<label for="surname">Último Nome</label>
									<input maxlength="45" type="text" class="form-control" id="surname" name="surname" placeholder="<?php echo  $surname ?>" value="<?php echo  $surname ?>">
								</div>
								<div class="form-group col-sm-6 col-xs-12">
									<label for="emailAdress">Endereço de Email</label>
									<input maxlength="45" type="text" class="form-control" id="emailAdress" name="emailAdress" placeholder="<?php echo  $emailAdress ?>" value="<?php echo  $emailAdress ?>">
								</div>
								<div class="form-group col-sm-6 col-xs-12">
									<label for="phoneNumber">Número de Telemóvel</label>
									<input maxlength="13" type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="<?php echo  $phoneNumber ?>" value="<?php echo  $phoneNumber ?>">
								</div>
								<div class="dateSelect col-sm-6 col-xs-12">
									<label for="dateOfBirthday" class="control-label">Data de Nascimento*</label>
									<div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
										<input maxlength="10" type="text" class="form-control" name="dateOfBirthday" placeholder="<?php echo  $dateFormated ?>" value="<?php echo  $dateFormated ?>">
										<div class="input-group-addon"> 
											<i class="fa fa-calendar" aria-hidden="true"></i>
										</div>
									</div>
								</div>
								<div class="form-group col-sm-6 col-xs-12">
									<label for="nationality">Nacionalidade*</label>
									<div class="contactSelect scrollable">
										<select name="nationality" id="nationality" class="select-drop">
											<?php

												$result_nationality = $conn->query("select * from Nationality where language = 'PT'");

												while ($row = $result_nationality->fetch_assoc()) {
              										unset($id, $name);
								                	$id = $row['id'];
								                	$name = $row['nationality']; 
								                	if ($Nationality_id == $id) {
								                		echo '<option value="'.$id.'" selected>'.$name.'</option>';
								                	} else {
								                		echo '<option value="'.$id.'">'.$name.'</option>';
								                	}
												}

											?>
										</select>
									</div>
								</div>
								<div class="form-group col-sm-6 col-xs-12">
									<br><br>
									<label for="gender">Género</label>
									<div class="contactSelect">
									<select name="gender" id="gender" class="select-drop">
										<?php
											if ($gender == 0) {
												echo "<option value='0' selected>Masculino</option>";
												echo "<option value='1'>Feminino</option>";
												echo "<option value='2'>Não especificar</option>";
											} elseif ($gender == 1) {
												echo "<option value='0'>Masculino</option>";
												echo "<option value='1' selected>Feminino</option>";
												echo "<option value='2'>Não especificar</option>";
											} else {
												echo "<option value='0'>Masculino</option>";
												echo "<option value='1'>Female</option>";
												echo "<option value='2' selected>Não especificar</option>";
											}
										?>           
									</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="dashboardBoxBg mt30">
						<div class="profileIntro">
							<h3>Informações de Morada</h3>
							<div class="row">
								<div class="form-group col-sm-6 col-xs-12">
									<label for="country" class="control-label">País</label>
									<div class="contactSelect scrollable">
										<select name="country" id="country" class="select-drop">
											<?php

												$result_Country = $conn->query("select id, countryPT from Country where id = 193");

												while ($row = $result_Country->fetch_assoc()) {
              										unset($id, $name);
								                	$id = $row['id'];
								                	$name = $row['countryPT']; 
								                	if ($Country_id == $id) {
								                		echo '<option value="'.$id.'" selected>'.$name.'</option>';
								                	} else {
								                		echo '<option value="'.$id.'">'.$name.'</option>';
								                	}
												}

											?>
										</select>
									</div>
								</div>
								<div class="form-group col-sm-6 col-xs-12">
									<label for="city" class="control-label">Cidade</label>
									<div class="contactSelect scrollable">
										<select name="city" id="city" class="select-drop">
											
											<?php

												$result_City = $conn->query("select id, name from City");

												while ($row = $result_City->fetch_assoc()) {
                  									unset($id, $name);
									                $id = $row['id'];
									                $name = $row['name'];
									                if ($City_id == $id) {
								                		echo '<option value="'.$id.'" selected>'.$name.'</option>';
								                	} else {
								                		echo '<option value="'.$id.'">'.$name.'</option>';
								                	}
												}

											?>

										</select>
									</div>
								</div>
								<div class="form-group col-xs-12">
									<br><br>
									<label for="addressLine1" class="control-label">Morada linha 1</label>
									<input maxlength="60" type="text" class="form-control" id="addressLine1" name="addressLine1" placeholder="<?php echo  $addressLine1 ?>" value="<?php echo  $addressLine1 ?>">
								</div>
								<div class="form-group col-xs-12">
									<label for="addressLine2" class="control-label">Morada linha 2</label>
									<input maxlength="60" type="text" class="form-control" id="addressLine2" name="addressLine2" placeholder="<?php echo  $addressLine2 ?>" value="<?php echo  $addressLine2 ?>">
								</div>
								<div class="form-group col-xs-6">
									<label for="postalCode" class="control-label">Código-Postal</label>
									<input maxlength="15" type="text" class="form-control" id="postalCode" name="postalCode" placeholder="<?php echo  $postalCode ?>" value="<?php echo  $postalCode ?>">
								</div>
							</div>
						</div>
					</div>

					<div class="dashboardBoxBg mt30">
						<div class="profileIntro">
							<h3>Informação do Estudante</h3>
							<div class="row">
								<div id="countryOfStudy" class="form-group col-sm-6 col-xs-12">
									<label for="countryOfStudy" class="control-label">País de Estudo*</label>
									<div class="contactSelect scrollable">
										<select name="countryOfStudy" id="countryOfStudy" class="select-drop">

											<?php

												$result_StudyCountry = $conn->query("select id, countryPT from Country where id = 193");

												while ($row = $result_StudyCountry->fetch_assoc()) {
              										unset($id, $name);
								                	$id = $row['id'];
								                	$name = $row['countryPT']; 
								                	if ($Country_id_EducationalEstablishment == $id) {
								                		echo '<option value="'.$id.'" selected>'.$name.'</option>';
								                	} else {
								                		echo '<option value="'.$id.'">'.$name.'</option>';
								                	}
												}

											?>

										</select>
									</div>
								</div>
								<div id="EducationalEstablishment" class="form-group col-sm-6 col-xs-12">
									<label for="EducationalEstablishment" class="control-label">Estabelecimento de Ensino*</label>
									<div class="contactSelect scrollable">
										<select name="EducationalEstablishment" id="EducationalEstablishment" class="select-drop">
											
											<?php

												$result_Educational = $conn->query("select id, name from EducationalEstablishment");

												while ($row = $result_Educational->fetch_assoc()) {
                  									unset($id, $name);
									                $id = $row['id'];
									                $name = $row['name']; 
									                if ($EducationalEstablishment == $id) {
								                		echo '<option value="'.$id.'" selected>'.$name.'</option>';
								                	} else {
								                		echo '<option value="'.$id.'">'.$name.'</option>';
								                	}
												}

											?>

										</select>
									</div>
								</div>
								<div id="courseArea" class="form-group col-sm-6 col-xs-12">
									<br><br>
									<label for="courseArea" class="control-label">Área de Curso*</label>
									<div class="contactSelect scrollable">
										<select name="courseArea" id="courseArea" class="select-drop">
											
											<?php

												$result_courseArea = $conn->query("select id, name from CourseArea where language = 'PT'");

												while ($row = $result_courseArea->fetch_assoc()) {
                  									unset($id, $name);
									                $id = $row['id'];
									                $name = $row['name']; 
									                if ($CourseArea_id == $id) {
								                		echo '<option value="'.$id.'" selected>'.$name.'</option>';
								                	} else {
								                		echo '<option value="'.$id.'">'.$name.'</option>';
								                	}
												}

											?>

										</select>
									</div>
								</div>
								<div id="studentDegree" class="form-group col-sm-6 col-xs-12">
									<br><br>
									<label for="studentDegree" class="control-label">Grau de Ensino*</label>
									<div class="contactSelect">
										<select name="studentDegree" id="studentDegree" class="select-drop">
											<?php
												if (strcmp("Bachelor",$studentDegree) == 0) {
													echo "<option value='Bachelor' selected>Bacharelado</option>";
													echo "<option value='Master'>Mestrado</option>";
													echo "<option value='Other'>Outro</option>";
												} elseif (strcmp("Master",$studentDegree) == 0) {
													echo "<option value='Bachelor'>Bacharelado</option>";
													echo "<option value='Master' selected>Mestrado</option>";
													echo "<option value='Other'>Outro</option>";
												} else {
													echo "<option value='Bachelor'>Bacharelado</option>";
													echo "<option value='Master'>Mestrado</option>";
													echo "<option value='Other' selected>Outro</option>";
												}
											?>           
										</select>
									</div>
								</div>
								<div id="course" class="form-group col-sm-6 col-xs-12">
									<label for="course" class="control-label">Curso*</label>
									<div class="contactSelect scrollable">
										<select name="course" id="course" class="select-drop">
											
											<?php

												$result_course = $conn->query("select id, name from Course where language = 'PT'");

												while ($row = $result_course->fetch_assoc()) {
                  									unset($id, $name);
									                $id = $row['id'];
									                $name = $row['name']; 
									                echo '<option value="'.$id.'">'.$name.'</option>';
									                if ($course == $id) {
								                		echo '<option value="'.$id.'" selected>'.$name.'</option>';
								                	} else {
								                		echo '<option value="'.$id.'">'.$name.'</option>';
								                	}
												}

											?>

										</select>
									</div>
								</div>
								<div id="studentNumber" class="form-group col-xs-6">
									<label for="studentNumber" class="control-label">Número de Estudante</label>
									<input maxlength="45" type="text" class="form-control" id="studentNumber" name="studentNumber" placeholder="<?php echo  $studentNumber ?>" value="<?php echo  $studentNumber ?>">
								</div>
							</div>
						</div>
					</div>

					<div class="form-group col-xs-15 mb0">
						<br><br>
						<center><button type="submit" name="submit_PT" class="btn btn-primary">Salvar Alterações</button></center>
					</div>
				</form>
				<form name="update_password" onsubmit="return validatePasswordForm()" action="#" method="#">
					<div class="dashboardBoxBg mt30">
						<div class="profileIntro">
							<h3>Alterar palavra passe</h3>
							<div class="row">
								<div class="form-group col-xs-12">
									<label for="currentPassword">Palavra passe atual</label>
									<input maxlength="15" type="password" class="form-control" id="currentPassword" name="currentPassword" value="<?php echo  $password_login ?>" disabled>
								</div>
								<div class="form-group col-xs-12">
									<label for="newPassword">Palavra passe</label>
									<input maxlength="15" type="password" class="form-control" id="newPassword" name="newPassword" placeholder="New Password">
								</div>
								<div class="form-group col-xs-12">
									<label for="confirmPassword">Palavra passe (confirmação)</label>
									<input maxlength="15" type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
								</div>
								<div class="form-group col-xs-12">
									<button type="submit" name="submit_password_PT" class="btn btn-primary">Alterar palavra passe</button>
								</div>
							</div>
						</div>
					</div>
				</form>
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