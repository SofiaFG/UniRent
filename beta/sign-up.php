<!DOCTYPE html>

<?php
  require_once('php/header.php');
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
					<h2>Página de inscrição</h2>
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
						<h2>Grátis <small>Paga apenas o que alugas</small></h2>
					</div>
					<div class="priceAmount">
						<h2>0<small> EUR/Ano</small></h2>
					</div>
					<div class="priceInfo">
						<ul class="list-unstyled">
							<li>15% da transacção pertence à UniRent</li>
							<li>E o restante, ao anunciante</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-8 col-xs-12">
				<div class="signUpFormArea">
					<div class="priceTableTitle">
						<h2>Registo de conta</h2>
						<p>Por favor preenche os campos abaixo para criares a tua conta. De seguida, iremos enviar as informações da tua conta para o email registado. As tuas informações e o teu email NÃO serão vendidos ou partilhados com uma terceira parte. Se já tens uma conta criada, por favor <a href="login.php">clica aqui</a>.</p>
					</div>
					<div class="signUpForm">
						<form action="db/register_new_user.php" method="POST">
							<div class="formSection">
								<h3>Informações de contacto</h3>
								<div class="row">
									<div class="form-group col-sm-6 col-xs-12">
										<label for="firstName" class="control-label">Primeiro nome*</label>
										<input maxlength="45" type="text" class="form-control" id="firstName" name="firstName">
									</div>
									<div class="form-group col-sm-6 col-xs-12">
										<label for="surname" class="control-label">Último nome*</label>
										<input maxlength="45" type="text" class="form-control" id="surname" name="surname">
									</div>
									<div class="form-group col-sm-6 col-xs-12">
										<label for="emailAdress" class="control-label">Endereço de Email*</label>
										<input maxlength="45" type="email" class="form-control" id="emailAdress" name="emailAdress">
									</div>
									<div class="form-group col-sm-6 col-xs-12">
										<label for="phoneNumber" class="control-label">Número de telemóvel*</label>
										<input maxlength="13" type="text" class="form-control" id="phoneNumber" name="phoneNumber">
									</div>
									<div class="dateSelect col-sm-6 col-xs-12">
										<label for="dateOfBirthday" class="control-label">Data de nascimento*</label>
										<div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
											<input maxlength="10" type="text" class="form-control" name="dateOfBirthday" placeholder="mm/dd/yyyy">
											<div class="input-group-addon">
												<i class="fa fa-calendar" aria-hidden="true"></i>
											</div>
										</div>
									</div>
									<div class="form-group col-sm-6 col-xs-12">
										<label for="nationality" class="control-label">Nacionalidade*</label>
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
										<label for="gender" class="control-label">Género</label>
										<div class="contactSelect">
											<select name="gender" id="gender" class="select-drop">
												<option value="0">Masculino</option>
												<option value="1">Feminino</option>
												<option value="2">Não especificar</option>           
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="formSection">
								<h3>Informações de conta</h3>
								<div class="row">
									<div class="form-group col-xs-12">
										<label for="username" class="control-label">Nome de utilizador*</label>
										<input maxlength="15" type="text" class="form-control" id="username" name="username">
									</div>
									<div class="form-group col-sm-6 col-xs-12">
										<label for="password" class="control-label">Palavra passe*</label>
										<input maxlength="15" type="password" class="form-control" id="password" name="password">
									</div>
									<div class="form-group col-sm-6 col-xs-12">
										<label for="passwordAgain" class="control-label">Palavra passe (confirmação)*</label>
										<input maxlength="15" type="password" class="form-control" id="passwordAgain" name="passwordAgain">
									</div>
								</div>
							</div>
							<div class="formSection">
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
									                	echo '<option value="'.$id.'">'.$name.'</option>';
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
										                echo '<option value="'.$id.'">'.$name.'</option>';
													}

												?>

											</select>
										</div>
									</div>
									<div class="form-group col-xs-12">
										<br><br>
										<label for="addressLine1" class="control-label">Morada linha 1*</label>
										<input maxlength="60" type="text" class="form-control" id="addressLine1" name="addressLine1">
									</div>
									<div class="form-group col-xs-12">
										<label for="addressLine2" class="control-label">Morada linha 2</label>
										<input maxlength="60" type="text" class="form-control" id="addressLine2" name="addressLine2">
									</div>
									<div class="form-group col-xs-6">
										<label for="postalCode" class="control-label">Código de postal*</label>
										<input maxlength="15" type="text" class="form-control" id="postalCode" name="postalCode">
									</div>
								</div>
							</div>
							<div class="formSection">
								<h3>Informação do estudante</h3>
								<div class="row">
									<div class="form-group col-xs-12">
										<label for="isStudent" class="control-label">Tu és estudante?*</label>
										<input type="radio" name="isStudent" value="isStudent" onclick="hideStudentFields();" />
										No 
										<input type="radio" name="isStudent" value="isStudent" onclick="showStudentFields();" />
										Yes
									</div>
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
									                	echo '<option value="'.$id.'">'.$name.'</option>';
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
										                echo '<option value="'.$id.'">'.$name.'</option>';
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
										                echo '<option value="'.$id.'">'.$name.'</option>';
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
												<option value="Bachelor">Bacharelado</option>
												<option value="Master">Mestrado</option>
												<option value="Other">Outro</option>           
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
													}

												?>

											</select>
										</div>
									</div>
									<div id="studentNumber" class="form-group col-xs-6">
										<label for="studentNumber" class="control-label">Número de estudante</label>
										<input maxlength="45" type="text" class="form-control" id="studentNumber" name="studentNumber">
									</div>
								</div>
							</div>
							</div>
							<div class="formSection">
								<h3>Controlo de segurança</h3>
									<div class="form-group col-xs-12">
										<div class="checkbox">
											<label>
												<input type="checkbox">
												Eu concordo com os <a href="terms-of-services.php">termos de utilização</a>. A tua listagem de empresas é totalmente coberta pela nossa garantia de reembolso de dinheiro a 100%.
											</label>
										</div>
									</div>
									<div class="form-group col-xs-12 mb0">
										<input type="hidden" name="pageName" value="login"/>
										<button type="submit" name="submit_PT" class="btn btn-primary">Criar Conta</button>
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
								<p>Nós usamos <span>PayPal</span> para processar todas as transações de forma segura. <span>Pagamentos podem ser feitos com o uso de qualquer cartão de crédito, sem a necessidade de uma conta PayPal </span>. Se já tens uma conta PayPal, podes também pagar com os fundos do PayPal ou através da tua conta bancária. Não ficamos com nenhuma informação sobre o teu cartão de crédito armazenada no nosso site. Nenhuma taxa é adicionada à tua compra. Para mais informações <a href="https://www.paypal.com" target="_blank">www.paypal.com</a></p>
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

  require_once('php/footer.php');
  
  // print UniRent header
  do_unirent_footer();
?>
