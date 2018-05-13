<!DOCTYPE html>

<?php
  require_once('php/header_listings_EN.php');
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
  $yearBoughtDateFormated          = date('d-m-Y', strtotime($yearBought));
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

      // Check AAdd an Item for empty fields
      var itemName        = document.forms["add_item"]["itemName"].value;
      var itemPrice       = document.forms["add_item"]["itemPrice"].value;
      var securityFee       = document.forms["add_item"]["securityFee"].value;
      var addressLine1      = document.forms["add_item"]["addressLine1"].value;
      var postalCode      = document.forms["add_item"]["postalCode"].value;
      var initialAvailableDay = document.forms["add_item"]["initialAvailableDay"].value;
      var endAvailableDay     = document.forms["add_item"]["endAvailableDay"].value;
      
      if (itemName == "") {
          alert("Please enter the item name!");
          document.getElementById("itemName").focus();
          return false;
      }

      if (itemPrice == "") {
          alert("Please enter the item price!");
          document.getElementById("itemPrice").focus();
          return false;
      }

      if (securityFee == "") {
          alert("Please enter the amount of the fee!");
          document.getElementById("securityFee").focus();
          return false;
      }

      if (addressLine1 == "") {
          alert("Please enter the address line 1!");
          document.getElementById("addressLine1").focus();
          return false;
      }

      if (postalCode == "") {
          alert("Please enter the postal code!");
          document.getElementById("postalCode").focus();
          return false;
      }

      if (initialAvailableDay == "") {
          alert("Please enter the start rental date!");
          document.getElementById("initialAvailableDay").focus();
          return false;
      }

      if (endAvailableDay == "") {
          alert("Please enter the end rental date!");
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
        <h2>Insert a new Item</h2>
        <ol class="breadcrumb">
          <li><a href="listings_EN.php">Home</a></li>
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
						<h3>About the Item</h3>
							<div class="row">
								<div class="form-group col-sm-6 col-xs-12">
									<label for="itemName">Item Title*</label>
									<input maxlength="45" type="text" class="form-control" id="itemName" name="itemName" placeholder="<?php echo  $name ?>" value="<?php echo  $name ?>">
								</div>
								<div class="form-group col-sm-6 col-xs-12">
									<label for="listingCategory">Category</label>
									<div class="contactSelect">
										<select name="itemCategory" id="itemCategory" class="select-drop">
											<?php

						                        $result_nationality = $conn->query("select id, name from ItemCategory where language = 'EN'");

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
									<label for="itemDescription">Item Description</label>
									<textarea maxlength="300" class="form-control" rows="3" id="itemDescription" name="itemDescription" placeholder="<?php echo  $description ?>" value="<?php echo  $description ?>"></textarea>
								</div>
								<div class="form-group col-sm-6 col-xs-12">
									<label for="itemPrice">Price/day*</label>
									<input maxlength="6" type="text" class="form-control" id="itemPrice" name="itemPrice" placeholder="<?php echo  $price ?>" value="<?php echo  $price ?>">
								</div>
                <div class="dateSelect col-sm-6 col-xs-12">
                  <label for="yearBought" class="control-label">Year that was purchased</label>
                  <div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
                    <input maxlength="10" type="text" class="form-control" id="yearBought" name="yearBought" placeholder="<?php echo  $yearBoughtDateFormated ?>" value="<?php echo  $yearBoughtDateFormated ?>">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
					<div class="form-group col-xs-12">
						<h5>Disclaimer</h5>
          <p>We are not responsible for any damages caused by the use of this website. Please use our site at your own discretion and exercise good judgement as well as common sense when advertising business here.</p>
          </div>
				</div>
						</div>
					</div>
					<div class="dashboardBoxBg mb30">
						<div class="profileIntro paraMargin">
							<h3>Gallery</h3>
							<div class="row">
								<div class="form-group col-xs-12">
									<div class="imageUploader text-center">
										<div class="file-upload">
											<div class="upload-area">
												<input type="file" id="img" name="img[]" class="file">
												<button class="browse" type="button">Click or Drag images here</button>
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
							<h3>Security policy</h3>
							<div class="row">
								<div class="form-group col-sm-6 col-xs-12 contactSelect">
									<label for="scurityType">Type</label>
									<select name="securityType" id="securityType" class="select-drop">
                      <?php 
                        if ((strcmp("0",$type)) == 0) {
                          echo '<option value="0" selected>Security Deposit</option>';
                          echo '<option value="1">Statement of Responsability</option>';
                        } else {
                          echo '<option value="0">Security Deposit</option>';
                          echo '<option value="1" selected>Statement of Responsability</option>';
                        } 
                      ?>         
											</select>
								</div>
								<div class="form-group col-sm-6 col-xs-12">
									<label for="securityFee">Fee*</label>
									<input  maxlength="6" type="text" class="form-control" id="securityFee" name="securityFee" placeholder="<?php echo  $fee ?>" value="<?php echo  $fee ?>">
								</div>
								<div class="form-group col-xs-12">
									<label for="securityDescription">Fee reason description</label>
									<input  maxlength="200" type="text" class="form-control" id="securityDescription" name="securityDescription" placeholder="<?php echo  $description_SecurityPolice ?>" value="<?php echo  $description_SecurityPolice ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="dashboardBoxBg mb30">
						<div class="profileIntro paraMargin">
							<h3>Item Address</h3>
							<div class="row"> 
								<div class="form-group col-sm-6 col-xs-12 contactSelect">
									<label for="country" class="control-label">Country*</label>
									<div class="contactSelect scrollable">
										<select name="country" id="country" class="select-drop">

											<?php

												$result_Country = $conn->query("select id, countryEN from Country");

												while ($row = $result_Country->fetch_assoc()) {
              										unset($id, $name);
								                	$id = $row['id'];
								                	$name = $row['countryEN']; 
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
									<label for="city" class="control-label">City*</label>
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
									<label for="addressLine1" class="control-label">Address Line 1*</label>
									<input maxlength="60" type="text" class="form-control" id="addressLine1" name="addressLine1" placeholder="<?php echo  $addressLine1 ?>" value="<?php echo  $addressLine1 ?>">
								</div>
								<div class="form-group col-xs-12">
									<label for="addressLine2" class="control-label">Address Line 2*</label>
									<input maxlength="60" type="text" class="form-control" id="addressLine2" name="addressLine2" placeholder="<?php echo  $addressLine2 ?>" value="<?php echo  $addressLine2 ?>">
								</div>
								<div class="form-group col-xs-6">
									<label for="postalCode" class="control-label">Postal Code*</label>
									<input maxlength="15" type="text" class="form-control" id="postalCode" name="postalCode" placeholder="<?php echo  $postalCode ?>" value="<?php echo  $postalCode ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="dashboardBoxBg mb30">
						<div class="profileIntro paraMargin">
							<h3>Item Availability</h3>
							<div class="row">
								<div class="dateSelect col-sm-6 col-xs-12">
                  				<label for="initialAvailableDay" class="control-label">Beggining Date*</label>
                  					<div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
                    				<input maxlength="10" type="text" class="form-control" id="initialAvailableDay" name="initialAvailableDay" placeholder="<?php echo  $initialAvailableDayDateFormated ?>" value="<?php echo  $initialAvailableDayDateFormated ?>">
                    					<div class="input-group-addon">
                      					<i class="fa fa-calendar" aria-hidden="true"></i>
                    					</div>
                  					</div>
                			</div>
                			<div class="dateSelect col-sm-6 col-xs-12">
                  				<label for="endAvailableDay" class="control-label">End Date*</label>
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
						<input type="hidden" name="pageName" value="addEN"/>
            <button type="submit" class="btn-submit">Update Item</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>


<?php
  // disconnect to UniRent DB
  //$conn->close();

  require_once('php/footer_listings_EN.php');

  // print UniRent header
  do_unirent_footer();
?>
