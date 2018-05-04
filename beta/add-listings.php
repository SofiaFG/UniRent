<!DOCTYPE html>

<?php
  require_once('php/header_listings.php');
  //require_once('db/unirent_functions.php');
  include('db/session.php');

  // print UniRent header
  do_unirent_header('Inserir um novo item');

  // connect to UniRent DB
  //$conn = db_connect();
?>


<!-- Dashboard breadcrumb section -->
<div class="section dashboard-breadcrumb-section bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>Inserir um novo item (bem)</h2>
        <ol class="breadcrumb">
          <li><a href="listings.php">Início</a></li>
          <li class="active">Adicionar um aluguel</li>
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
				<form action="" method="" class="listing__form">
					<div class="dashboardBoxBg mb30">
						<div class="profileIntro paraMargin">
							<h3>Sobre</h3>
							<p>Não nos responsabilizamos por quaisquer danos causados pelo uso deste website ou pela publicação de itens (bens) aqui. Por favor, use o nosso site a seu próprio critério e exercer bom senso, bem como o bom senso ao anunciar negócios aqui.</p>
							<div class="row">
								<div class="form-group col-sm-6 col-xs-12">
									<label for="itemName">Nome do item*</label>
									<input maxlength="45" type="text" class="form-control" id="itemName" name="itemName" placeholder="Nome do item">
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
									<label for="itemDescription">Descrição do Item</label>
									<textarea maxlength="300" class="form-control" rows="3" id="itemDescription" name="itemDescription" placeholder="Descreva o seu item"></textarea>
								</div>
								<div class="form-group col-sm-6 col-xs-12">
									<label for="itemPrice">Preço*</label>
									<input maxlength="6" type="text" class="form-control" id="itemPrice" name="itemPrice" placeholder="€">
								</div>
                <div class="dateSelect col-sm-6 col-xs-12">
                  <label for="yearBought" class="control-label">Ano que foi comprado</label>
                  <div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
                    <input maxlength="10" type="text" class="form-control" id="yearBought" name="yearBought" placeholder="mm/dd/yyyy">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
							</div>
						</div>
					</div>
					<div class="dashboardBoxBg mb30">
						<div class="profileIntro paraMargin">
							<h3>Galeria</h3>
							<p>Não nos responsabilizamos por quaisquer danos causados pelo uso deste website ou pela publicação de itens (bens) aqui. Por favor, use o nosso site a seu próprio critério e exercer bom senso, bem como o bom senso ao anunciar negócios aqui.</p>
							<div class="row">
								<div class="form-group col-xs-12">
									<div class="imageUploader text-center">
										<div class="file-upload">
											<div class="upload-area">
												<input type="file" id="img" name="img[]" class="file">
												<button class="browse" type="button">Clique ou arraste as imagens aqui</button>
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
							<p>Não nos responsabilizamos por quaisquer danos causados pelo uso deste website ou pela publicação de itens (bens) aqui. Por favor, use o nosso site a seu próprio critério e exercer bom senso, bem como o bom senso ao anunciar negócios aqui.</p>
							<div class="row">
								<div class="form-group col-sm-6 col-xs-12 contactSelect">
									<label for="scurityType">Tipo</label>
									<select name="securityType" id="securityType" class="select-drop">
												<option value="0">Caução</option>
												<option value="1">Termo de Responsabilidade</option>          
											</select>
								</div>
								<div class="form-group col-sm-6 col-xs-12">
									<label for="securityFee">Valor da taxa</label>
									<input  maxlength="6" type="text" class="form-control" id="securityFee" name="securityFee" placeholder="€" value="€">
								</div>
								<div class="form-group col-xs-12">
									<label for="securityDescription">Descrição do motivo da taxa</label>
									<input  maxlength="200" type="text" class="form-control" id="securityDescription" name="securityDescription" placeholder="Descreva o motivo da taxa">
								</div>
							</div>
						</div>
					</div>
					<div class="dashboardBoxBg mb30">
						<div class="profileIntro paraMargin">
							<h3>Disponibilidade do Bem</h3>
							<div class="row">
								<div class="dateSelect col-sm-6 col-xs-12">
                  				<label for="initialRentalDay" class="control-label">Data de Início</label>
                  					<div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
                    				<input maxlength="10" type="text" class="form-control" id="initialAvailableDay" name="initialRentalDay" placeholder="mm/dd/yyyy">
                    					<div class="input-group-addon">
                      					<i class="fa fa-calendar" aria-hidden="true"></i>
                    					</div>
                  					</div>
                			</div>
                			<div class="dateSelect col-sm-6 col-xs-12">
                  				<label for="endRentalDay" class="control-label">Data de Fim</label>
                  					<div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
                    				<input maxlength="10" type="text" class="form-control" id="endAvailableDay" name="endRentalDay" placeholder="mm/dd/yyyy">
                    					<div class="input-group-addon">
                      					<i class="fa fa-calendar" aria-hidden="true"></i>
                    					</div>
                  					</div>
                			</div>
							</div>
						</div>
					</div>
					<div class="form-footer text-center">
						<button type="submit" class="btn-submit">Registar Item</button>
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
