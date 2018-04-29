<!DOCTYPE html>

<?php
	require_once('php/header_listings.php');
	require_once('db/unirent_functions.php');
	include('db/session.php');

	// print UniRent header
	do_unirent_header('Dashboard | UniRent');

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

    <!-- Dashboard header -->
    <section class="navbar-dashboard-area">
      <nav class="navbar navbar-default lightHeader navbar-dashboard" role="navigation">
        <div class="container">

          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-dash">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-dash">
            <ul class="nav navbar-nav mr0">
              <li class="active">
                <a href="listings.php"><i aria-hidden="true"></i> <?php echo  "Bem vindo: " . $login_session; ?></a>
              </li>
              <li><a href="#"><i class="fa fa-tachometer icon-dash" aria-hidden="true"></i> Dashboard</a></li>
              <li class="dropdown singleDrop">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list-ul icon-dash" aria-hidden="true"></i> Aluguéis <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                <ul class="dropdown-menu dropdown-menu-left">
                  <li><a href="#">Meus aluguéis</a></li>
                  <li><a href="#">Adicionar um aluguel</a></li>
                  <li><a href="#">Editar meus aluguéis</a></li>
                </ul>
              </li>
              <li class="dropdown singleDrop">
                <a href="#" class="scrolling"><i class="fa fa-star-o" aria-hidden="true"></i> Alugados</a>
              </li>
            </ul>
            <div class="row adjustRow">
              <div class="pull-right col-xs-12 col-sm-4">
                <form class="navbar-form" role="search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="q">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button"><i class="icon-listy icon-search-2"></i></button>
                    </span>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </section>


<!-- Dashboard breadcrumb section -->
<div class="section dashboard-breadcrumb-section bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>Meu Perfil</h2>
        <ol class="breadcrumb">
          <li><a href="listings.php">Home</a></li>
          <li class="active">Minha conta</li>
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
						<p>Seu plano de seguro atualn</p>
						<h2>Pacote de Platina</h2>
						<h5>Próximo pagamento: <span>15/01/2017</span></h5>
						<a href="#" class="btn btn-primary">Alterar</a>
					</div>
				</div>
			</div>
			<div class="col-md-8 col-sm-7 col-xs-12">
				<form>
					<div class="dashboardBoxBg">
						<div class="profileIntro">
							<h2>Seu perfil</h2>
							<p>Caro <?php echo $firstName . " " . $surname; ?>, por favor, verifique seus dados abaixo:</p>
						</div>
					</div>
					<div class="dashboardBoxBg mt30">
						<div class="profileIntro">
							<h3>Informações de contacto</h3>
							<div class="row">
								<div class="form-group col-sm-6 col-xs-12">
									<label for="firstName">Primeiro nome</label>
									<input type="text" class="form-control" id="firstName" name="firstName" placeholder="<?php echo  $firstName ?>" value="<?php echo  $firstName ?>">
								</div>
								<div class="form-group col-sm-6 col-xs-12">
									<label for="surname">Último nome</label>
									<input type="text" class="form-control" id="surname" name="surname" placeholder="<?php echo  $surname ?>" value="<?php echo  $surname ?>">
								</div>
								<div class="form-group col-sm-6 col-xs-12">
									<label for="emailAdress">Endereço de Email</label>
									<input type="text" class="form-control" id="emailAdress" name="emailAdress" placeholder="<?php echo  $emailAdress ?>" value="<?php echo  $emailAdress ?>">
								</div>
								<div class="form-group col-sm-6 col-xs-12">
									<label for="phoneNumber">Número de telemóvel</label>
									<input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="<?php echo  $phoneNumber ?>" value="<?php echo  $phoneNumber ?>">
								</div>
								<div class="dateSelect col-sm-6 col-xs-12">
									<label for="dateOfBirthday" class="control-label">Data de nascimento*</label>
									<div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
										<input type="text" class="form-control" name="dateOfBirthday" placeholder="<?php echo  $dateFormated ?>" value="<?php echo  $dateFormated ?>">
										<div class="input-group-addon"> 
											<i class="fa fa-calendar" aria-hidden="true"></i>
										</div>
									</div>
								</div>
								<div class="form-group col-sm-6 col-xs-12">
									<label for="nationality">Nacionalidade</label>
									<div class="contactSelect scrollable">
										<select name="nationality" id="nationality" class="select-drop">
											<?php

												$result_nationality = $conn->query("select id, nationality from Nationality");

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
							<h3>Informações de morada</h3>
							<div class="row">
								<div class="form-group col-sm-6 col-xs-12">
									<label for="country" class="control-label">País</label>
									<div class="contactSelect scrollable">
										<select name="country" id="country" class="select-drop">
											<?php

												$result_Country = $conn->query("select id, countryPT from Country");

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
									<input type="text" class="form-control" id="addressLine1" name="addressLine1" placeholder="<?php echo  $addressLine1 ?>" value="<?php echo  $addressLine1 ?>">
								</div>
								<div class="form-group col-xs-12">
									<label for="addressLine2" class="control-label">Morada linha 2</label>
									<input type="text" class="form-control" id="addressLine2" name="addressLine2" placeholder="<?php echo  $addressLine2 ?>" value="<?php echo  $addressLine2 ?>">
								</div>
								<div class="form-group col-xs-6">
									<label for="postalCode" class="control-label">Código de postal</label>
									<input type="text" class="form-control" id="postalCode" name="postalCode" placeholder="<?php echo  $postalCode ?>" value="<?php echo  $postalCode ?>">
								</div>
							</div>
						</div>
					</div>

					<div class="dashboardBoxBg mt30">
						<div class="profileIntro">
							<h3>Informação do estudante</h3>
							<div class="row">
								<div id="countryOfStudy" class="form-group col-sm-6 col-xs-12">
									<label for="countryOfStudy" class="control-label">País de estudo*</label>
									<div class="contactSelect scrollable">
										<select name="countryOfStudy" id="countryOfStudy" class="select-drop">

											<?php

												$result_StudyCountry = $conn->query("select id, countryPT from Country");

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
									<label for="EducationalEstablishment" class="control-label">Estabelecimento de ensino*</label>
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
									<label for="courseArea" class="control-label">Área de curso*</label>
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
									<label for="studentDegree" class="control-label">Grau de ensino*</label>
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
									<label for="studentNumber" class="control-label">Número de estudante</label>
									<input type="text" class="form-control" id="studentNumber" name="studentNumber" placeholder="<?php echo  $studentNumber ?>" value="<?php echo  $studentNumber ?>">
								</div>
							</div>
						</div>
					</div>

					<div class="btn-area mt30">
						<button class="btn btn-primary" type="button">Salvar alterações</button>
					</div>
					<div class="dashboardBoxBg mt30">
						<div class="profileIntro">
							<h3>Alterar palavra passe</h3>
							<div class="row">
								<div class="form-group col-xs-12">
									<label for="currentPassword">Palavra passe atual</label>
									<input type="password" class="form-control" id="currentPassword" name="currentPassword" value="<?php echo  $password_login ?>">
								</div>
								<div class="form-group col-xs-12">
									<label for="newPassword">Palavra passe</label>
									<input type="password" class="form-control" id="newPassword" placeholder="New Password">
								</div>
								<div class="form-group col-xs-12">
									<label for="confirmPassword">Palavra passe (confirmação)</label>
									<input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
								</div>
								<div class="form-group col-xs-12">
									<button class="btn btn-primary" type="button">Alterar palavra passe</button>
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
