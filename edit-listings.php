<!DOCTYPE html>

<?php
  require_once('php/header_listings.php');
  //require_once('db/unirent_functions.php');
  include('db/session.php');

  // Get searched item selected in previous menu
  $itemID = $_GET['itemID'];

  /*********************************************************************************/
  /*********************************** ITEM DB *************************************/
  /*********************************************************************************/


  // check for Item in Item DB
  $result_Item = $conn->query("select * from Item where id = " . $itemID . "");

  if (!$result_Item) {
    throw new Exception('Could not execute Item query');
  }

  // Item variables
  $name;
  $description;
  $price;
  $publishDate;
  $yearBought;
  $videoURL;
  $initialAvailableDay;
  $endAvailableDay;
  $SecurityPolice_id;
  $ItemCategory_id;
  $Address_id;

  if ($result_Item->num_rows>0) {
    while ($row = $result_Item->fetch_assoc()) {
      unset($name, $description, $price, $publishDate, $yearBought, $initialAvailableDay, $endAvailableDay, $SecurityPolice_id, $ItemCategory_id);
      $name                = $row['name'];
      $description         = $row['description'];
      $price               = $row['price'];
      $publishDate         = $row['publishDate'];
      $yearBought          = $row['yearBought'];
      $videoURL            = $row['videoURL'];
      $initialAvailableDay = $row['initialAvailableDay'];
      $endAvailableDay     = $row['endAvailableDay'];
      $SecurityPolice_id   = $row['SecurityPolice_id'];
      $ItemCategory_id     = $row['ItemCategory_id'];
      $Address_id          = $row['Address_id'];
    }
  }

  $publishDateDateFormated         = date('d-m-Y', strtotime($publishDate));
  $initialAvailableDayDateFormated = date('d-m-Y', strtotime($initialAvailableDay));
  $endAvailableDayDateFormated     = date('d-m-Y', strtotime($endAvailableDay));

  // print UniRent header
  do_unirent_header("Editar: " . $name);

  /*********************************************************************************/
  /**************************** ITEM CATEGORY DB ***********************************/
  /*********************************************************************************/


  // check for ItemCategory in ItemCategory DB
  $result_ItemCategory = $conn->query("select * from ItemCategory where id = " . $ItemCategory_id . "");

  if (!$result_ItemCategory) {
    throw new Exception('Could not execute ItemCategory query');
  }

  // ItemCategory variables
  $itemCategory;

  if ($result_ItemCategory->num_rows>0) {
    while ($row = $result_ItemCategory->fetch_assoc()) {
      unset($itemCategory);
      $itemCategory = $row['name'];
    }
  }

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
  /********************************* SECURITY DB ***********************************/
  /*********************************************************************************/


  // check for SecurityPolice in SecurityPolice DB
  $result_SecurityPolice = $conn->query("select * from SecurityPolice where id = " . $SecurityPolice_id . "");

  if (!$result_SecurityPolice) {
    throw new Exception('Could not execute SecurityPolice query');
  }

  // SecurityPolice variables
  $type;
  $description_SecurityPolice;
  $fee;

  if ($result_SecurityPolice->num_rows>0) {
    while ($row = $result_SecurityPolice->fetch_assoc()) {
      unset($type, $description_SecurityPolice, $fee);
      $type                       = $row['type'];
      $description_SecurityPolice = $row['description'];
      $fee                        = $row['fee'];
    }
  }
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
        <h2>Editar o bem: <?php echo $name; ?></h2>
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
				<form name="add_item" onsubmit="return validateForm()" action="#" method="POST" class="listing__form">
					<div class="dashboardBoxBg mb30">
						<div class="profileIntro paraMargin">
						<h3>Sobre o Bem</h3>
							<div class="row">
								<div class="form-group col-sm-6 col-xs-12">
									<label for="itemName">Nome do Bem*</label>
									<input maxlength="45" type="text" class="form-control" id="itemName" name="itemName" placeholder="<?php echo  $name ?>" value="<?php echo  $name ?>">
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
                                      if ($ItemCategory_id == $id) {
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
									<label for="itemDescription">Descrição do Bem</label>
									<textarea maxlength="300" class="form-control" rows="3" id="itemDescription" name="itemDescription" placeholder="<?php echo  $description ?>" value="<?php echo  $description ?>"></textarea>
								</div>
								<div class="form-group col-sm-6 col-xs-12">
									<label for="itemPrice">Preço/dia*</label>
									<input maxlength="6" type="text" class="form-control" id="itemPrice" name="itemPrice" placeholder="<?php echo  $price ?>" value="<?php echo  $price ?>">
								</div>
                <div class="form-group col-sm-6 col-xs-12">
                  <label for="listingCategory">Ano em que foi comprado</label>
                  <div class="contactSelect scrollable">
                    <select name="yearBought" id="yearBought" class="select-drop">
                        <?php
                          if ((strcmp("no",$yearBought)) == 0) {
                            echo "<option value='no'>-- SELECIONAR --</option>";
                          } else {
                            echo "<option value='$yearBought'>$yearBought</option>";
                          }
                        ?>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                        <option value="2004">2004</option>
                        <option value="2003">2003</option>
                        <option value="2002">2002</option>
                        <option value="2001">2001</option>
                        <option value="2000">2000</option>
                        <option value="1999">1999</option>
                        <option value="1998">1998</option>
                        <option value="1997">1997</option>
                        <option value="1996">1996</option>
                        <option value="1995">1995</option>
                        <option value="1994">1994</option>
                        <option value="1993">1993</option>
                        <option value="1992">1992</option>
                        <option value="1991">1991</option>
                        <option value="1990">1990</option>
                        <option value="1989">1989</option>
                        <option value="1988">1988</option>
                        <option value="1987">1987</option>
                        <option value="1986">1986</option>
                        <option value="1985">1985</option>
                        <option value="1984">1984</option>
                        <option value="1983">1983</option>
                        <option value="1982">1982</option>
                        <option value="1981">1981</option>
                        <option value="1980">1980</option>
                        <option value="1979">1979</option>
                        <option value="1978">1978</option>
                        <option value="1977">1977</option>
                        <option value="1976">1976</option>
                        <option value="1975">1975</option>
                        <option value="1974">1974</option>
                        <option value="1973">1973</option>
                        <option value="1972">1972</option>
                        <option value="1971">1971</option>
                        <option value="1970">1970</option>
                        <option value="1969">1969</option>
                        <option value="1968">1968</option>
                        <option value="1967">1967</option>
                        <option value="1966">1966</option>
                        <option value="1965">1965</option>
                        <option value="1964">1964</option>
                        <option value="1963">1963</option>
                        <option value="1962">1962</option>
                        <option value="1961">1961</option>
                        <option value="1960">1960</option>
                        <option value="1959">1959</option>
                        <option value="1958">1958</option>
                        <option value="1957">1957</option>
                        <option value="1956">1956</option>
                        <option value="1955">1955</option>
                        <option value="1954">1954</option>
                        <option value="1953">1953</option>
                        <option value="1952">1952</option>
                        <option value="1951">1951</option>
                        <option value="1950">1950</option>
                        <option value="1949">1949</option>
                        <option value="1948">1948</option>
                        <option value="1947">1947</option>
                        <option value="1946">1946</option>
                        <option value="1945">1945</option>
                        <option value="1944">1944</option>
                        <option value="1943">1943</option>
                        <option value="1942">1942</option>
                        <option value="1941">1941</option>
                        <option value="1940">1940</option>
                        <option value="1939">1939</option>
                        <option value="1938">1938</option>
                        <option value="1937">1937</option>
                        <option value="1936">1936</option>
                        <option value="1935">1935</option>
                        <option value="1934">1934</option>
                        <option value="1933">1933</option>
                        <option value="1932">1932</option>
                        <option value="1931">1931</option>
                        <option value="1930">1930</option>
                        <option value="1929">1929</option>
                        <option value="1928">1928</option>
                        <option value="1927">1927</option>
                        <option value="1926">1926</option>
                        <option value="1925">1925</option>
                        <option value="1924">1924</option>
                        <option value="1923">1923</option>
                        <option value="1922">1922</option>
                        <option value="1921">1921</option>
                        <option value="1920">1920</option>
                        <option value="1919">1919</option>
                        <option value="1918">1918</option>
                        <option value="1917">1917</option>
                        <option value="1916">1916</option>
                        <option value="1915">1915</option>
                        <option value="1914">1914</option>
                        <option value="1913">1913</option>
                        <option value="1912">1912</option>
                        <option value="1911">1911</option>
                        <option value="1910">1910</option>
                        <option value="1909">1909</option>
                        <option value="1908">1908</option>
                        <option value="1907">1907</option>
                        <option value="1906">1906</option>
                        <option value="1905">1905</option>
                        <option value="1904">1904</option>
                        <option value="1903">1903</option>
                        <option value="1902">1902</option>
                        <option value="1901">1901</option>
                        <option value="1900">1900</option>
                    </select>
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
									<input type="text" class="form-control" id="videoUrl" name="videoUrl" placeholder="<?php echo  $videoURL ?>" value="<?php echo  $videoURL ?>">
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
                      <?php 
                        if ((strcmp("0",$type)) == 0) {
                          echo '<option value="0" selected>Caução</option>';
                          echo '<option value="1">Termo de Responsabilidade</option>';
                        } else {
                          echo '<option value="0">Caução</option>';
                          echo '<option value="1" selected>Termo de Responsabilidade</option>';
                        } 
                      ?>         
											</select>
								</div>
								<div class="form-group col-sm-6 col-xs-12">
									<label for="securityFee">Valor da Caução</label>
									<input  maxlength="6" type="text" class="form-control" id="securityFee" name="securityFee" placeholder="<?php echo  $fee ?>" value="<?php echo  $fee ?>">
								</div>
								<div class="form-group col-xs-12">
									<label for="securityDescription">Descrição do motivo da taxa</label>
									<input  maxlength="200" type="text" class="form-control" id="securityDescription" name="securityDescription" placeholder="<?php echo  $description_SecurityPolice ?>" value="<?php echo  $description_SecurityPolice ?>">
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
									<label for="city" class="control-label">Cidade*</label>
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
									<label for="addressLine1" class="control-label">Morada linha 1*</label>
									<input maxlength="60" type="text" class="form-control" id="addressLine1" name="addressLine1" placeholder="<?php echo  $addressLine1 ?>" value="<?php echo  $addressLine1 ?>">
								</div>
								<div class="form-group col-xs-12">
									<label for="addressLine2" class="control-label">Morada linha 2</label>
									<input maxlength="60" type="text" class="form-control" id="addressLine2" name="addressLine2" placeholder="<?php echo  $addressLine2 ?>" value="<?php echo  $addressLine2 ?>">
								</div>
								<div class="form-group col-xs-6">
									<label for="postalCode" class="control-label">Código-Postal*</label>
									<input maxlength="15" type="text" class="form-control" id="postalCode" name="postalCode" placeholder="<?php echo  $postalCode ?>" value="<?php echo  $postalCode ?>">
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
                    				<input maxlength="10" type="text" class="form-control" id="initialAvailableDay" name="initialAvailableDay" placeholder="<?php echo  $initialAvailableDayDateFormated ?>" value="<?php echo  $initialAvailableDayDateFormated ?>">
                    					<div class="input-group-addon">
                      					<i class="fa fa-calendar" aria-hidden="true"></i>
                    					</div>
                  					</div>
                			</div>
                			<div class="dateSelect col-sm-6 col-xs-12">
                  				<label for="endAvailableDay" class="control-label">Data de Fim*</label>
                  					<div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
                    				<input maxlength="10" type="text" class="form-control" id="endAvailableDay" name="endAvailableDay" placeholder="<?php echo  $endAvailableDayDateFormated ?>" value="<?php echo  $endAvailableDayDateFormated ?>">
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
						<button type="submit" class="btn-submit">Atualizar Bem</button>
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
