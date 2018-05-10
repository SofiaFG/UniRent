<!DOCTYPE html>

<?php
  require_once('php/header_listings.php');
  //require_once('db/unirent_functions.php');
  include('db/session.php');

  // print UniRent header
  do_unirent_header('Adicionar um Bem');

  // connect to UniRent DB
  //$conn = db_connect();
?>


<style type="text/css">
 .scrollable{
    overflow: auto;
    position: absolute;
    width: 510px; /* adjust this width depending to amount of text to display */
	height: 370px; /* adjust height depending on number of options to display */
 }
 
 .hide {
 	display: none;
 }
</style>


<script>
  function validateForm() {

  	  // Check Adicionar um Bem for empty fields
      var itemName 	 		  = document.forms["add_item"]["itemName"].value;
      var itemPrice 		  = document.forms["add_item"]["itemPrice"].value;
      var securityFee 	 	  = document.forms["add_item"]["securityFee"].value;
      var addressLine1 		  = document.forms["add_item"]["addressLine1"].value;
      var postalCode 		  = document.forms["add_item"]["postalCode"].value;
      var initialAvailableDay = document.forms["add_item"]["initialAvailableDay"].value;
      var endAvailableDay  	  = document.forms["add_item"]["endAvailableDay"].value;
      
      if (itemName == "") {
          alert("Por favor, introduza o nome do bem!");
          document.getElementById("itemName").focus();
          return false;
      }

      if (itemPrice == "") {
          alert("Por favor, introduza o preço do bem!");
          document.getElementById("itemPrice").focus();
          return false;
      }

      if (securityFee == "") {
          alert("Por favor, introduza o valor da taxa!");
          document.getElementById("securityFee").focus();
          return false;
      }

      if (addressLine1 == "") {
          alert("Por favor, introduza a morada linha 1!");
          document.getElementById("addressLine1").focus();
          return false;
      }

      if (postalCode == "") {
          alert("Por favor, introduza o código-Postal!");
          document.getElementById("postalCode").focus();
          return false;
      }

      if (initialAvailableDay == "") {
          alert("Por favor, introduza a data de início!");
          document.getElementById("initialAvailableDay").focus();
          return false;
      }

      if (endAvailableDay == "") {
          alert("Por favor, introduza a data de fim!");
          document.getElementById("endAvailableDay").focus();
          return false;
      }
  }
</script>


<!-- Dashboard breadcrumb section -->
<div class="section dashboard-breadcrumb-section bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>Inserir um novo Bem</h2>
        <ol class="breadcrumb">
          <li><a href="listings.php">Início</a></li>
        </ol>
      </div>
    </div>
  </div>
</div>


<!-- DASHBOARD ORDERS SECTION -->
<section class="clearfix bg-dark listingSection">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<form name="add_item" onsubmit="return validateForm()" action="db/register_new_item.php" method="POST" class="listing__form">
					<div class="dashboardBoxBg mb30">
						<div class="profileIntro paraMargin">
						<h3>Sobre o Bem</h3>
							<div class="row">
								<div class="form-group col-sm-6 col-xs-12">
									<label for="itemName">Nome do Bem*</label>
									<input maxlength="45" type="text" class="form-control" id="itemName" name="itemName">
								</div>
								<div class="form-group col-sm-6 col-xs-12">
									<label for="listingCategory">Categoria</label>
									<div class="contactSelect">
										<select name="itemCategory" id="itemCategory" class="select-drop">
											<?php

						                        $result_nationality = $conn->query("select id, name from ItemCategory where language = 'PT'");

						                        while ($row = $result_nationality->fetch_assoc()) {
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
									<label for="itemDescription">Descrição do Bem</label>
									<textarea maxlength="300" class="form-control" rows="3" id="itemDescription" name="itemDescription" placeholder="Exemplo: A GoPro tem um pequeno risco no lado superior direito."></textarea>
								</div>
								<div class="form-group col-sm-6 col-xs-12">
									<label for="itemPrice">Preço*</label>
									<input maxlength="6" type="text" class="form-control" id="itemPrice" name="itemPrice" placeholder="€">
								</div>
                <div class="dateSelect col-sm-6 col-xs-12">
                  <label for="yearBought" class="control-label">Ano em que foi comprado</label>
                  <div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
                    <input maxlength="10" type="text" class="form-control" id="yearBought" name="yearBought" placeholder="mm/dd/yyyy">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
					<div class="form-group col-xs-12">
						<h5>Disclaimer</h5>
						<p>Não nos responsabilizamos por quaisquer danos causados pelo uso deste website ou pela publicação de bens aqui. Por favor, use o nosso site a seu próprio critério e exercer bom senso, bem como o bom senso ao anunciar negócios aqui.</p>
					</div>
				</div>
						</div>
					</div>
					<div class="dashboardBoxBg mb30">
						<div class="profileIntro paraMargin">
							<h3>Galeria</h3>
							<div class="row">
								<div class="form-group col-xs-12">
									<div class="imageUploader text-center">
										<div class="file-upload">
											<div class="upload-area">
												<input type="file" id="img" name="img[]" class="file">
												<button class="browse" type="button">Clique ou Arraste as imagens para aqui</button>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group col-xs-12">
									<label for="videoUrl">Video URL</label>
									<input type="text" class="form-control" id="videoUrl" name="videoUrl" placeholder="http://">
								</div>
							</div>
						</div>
					</div>
					<div class="dashboardBoxBg mb30">
						<div class="profileIntro paraMargin">
							<h3>Política de segurança</h3>
							<div class="row">
								<div class="form-group col-sm-6 col-xs-12 contactSelect">
									<label for="scurityType">Tipo</label>
									<select name="securityType" id="securityType" class="select-drop">
												<option value="0">Caução</option>
												<option value="1">Termo de Responsabilidade</option>          
											</select>
								</div>
								<div class="form-group col-sm-6 col-xs-12">
									<label for="securityFee">Valor da taxa*</label>
									<input  maxlength="6" type="text" class="form-control" id="securityFee" name="securityFee" placeholder="€">
								</div>
								<div class="form-group col-xs-12">
									<label for="securityDescription">Descrição do motivo da taxa</label>
									<input  maxlength="200" type="text" class="form-control" id="securityDescription" name="securityDescription">
								</div>
							</div>
						</div>
					</div>
					<div class="dashboardBoxBg mb30">
						<div class="profileIntro paraMargin">
							<h3>Morada do Bem</h3>
							<div class="row"> 
								<div class="form-group col-sm-6 col-xs-12 contactSelect">
									<label for="country" class="control-label">País*</label>
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
									<label for="city" class="control-label">Cidade*</label>
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
									<label for="postalCode" class="control-label">Código-Postal*</label>
									<input maxlength="15" type="text" class="form-control" id="postalCode" name="postalCode">
								</div>
							</div>
						</div>
					</div>
					<div class="dashboardBoxBg mb30">
						<div class="profileIntro paraMargin">
							<h3>Disponibilidade do Bem</h3>
							<div class="row">
								<div class="dateSelect col-sm-6 col-xs-12">
                  				<label for="initialAvailableDay" class="control-label">Data de Início*</label>
                  					<div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
                    				<input maxlength="10" type="text" class="form-control" id="initialAvailableDay" name="initialAvailableDay" placeholder="mm/dd/yyyy">
                    					<div class="input-group-addon">
                      					<i class="fa fa-calendar" aria-hidden="true"></i>
                    					</div>
                  					</div>
                			</div>
                			<div class="dateSelect col-sm-6 col-xs-12">
                  				<label for="endAvailableDay" class="control-label">Data de Fim*</label>
                  					<div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
                    				<input maxlength="10" type="text" class="form-control" id="endAvailableDay" name="endAvailableDay" placeholder="mm/dd/yyyy">
                    					<div class="input-group-addon">
                      					<i class="fa fa-calendar" aria-hidden="true"></i>
                    					</div>
                  					</div>
                			</div>
							</div>
						</div>
					</div>
					<div class="form-footer text-center">
						<input type="hidden" name="pageName" value="add"/>
						<button type="submit" class="btn-submit">Registar Bem</button>
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
