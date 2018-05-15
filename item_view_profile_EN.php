<!DOCTYPE html>

<?php
  require_once('php/header_listings_EN.php');
  require_once('db/unirent_functions.php');
  include('db/session.php');

  // connect to UniRent DB
  $conn = db_connect();

  // Retrieve Login ID 
  $Login_idLogin = retrieve_Login($login_session);

  // Get searched item selected in previous menu
  $itemID = $_GET['itemID'];

  /*********************************************************************************/
  /*********************************** ITEM DB *************************************/
  /*********************************************************************************/

  // check for Item in Item DB
  $result_Item = $conn->query("select * from Item where id = " . $itemID . "");

  if (!$result_Item) {
    throw new Exception('Could not execute Address query');
  }

  // Item variables
  $name;
  $description;
  $price;
  $publishDate;
  $initialAvailableDay;
  $endAvailableDay;
  $Customer_id;
  $SecurityPolice_id;
  $ItemCategory_id;

  if ($result_Item->num_rows>0) {
    while ($row = $result_Item->fetch_assoc()) {
      unset($name, $description, $price, $publishDate, $initialAvailableDay, $endAvailableDay, $Customer_id, $SecurityPolice_id, $ItemCategory_id);
      $name                = $row['name'];
      $description         = $row['description'];
      $price               = $row['price'];
      $publishDate         = $row['publishDate'];
      $initialAvailableDay = $row['initialAvailableDay'];
      $endAvailableDay     = $row['endAvailableDay'];
      $Customer_id         = $row['Customer_id'];
      $SecurityPolice_id   = $row['SecurityPolice_id'];
      $ItemCategory_id     = $row['ItemCategory_id'];
    }
  }

  // print UniRent header
  do_unirent_header($name);

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

  /*********************************************************************************/
  /********************************* CUSTOMER DB ***********************************/
  /*********************************************************************************/


  // check for Customer in Customer DB
  $result_Customer = $conn->query("select name, surname from Customer where id = " . $Login_idLogin . "");

  if (!$result_Customer) {
    throw new Exception('Could not execute Customer query');
  }

  // Customer variables
  $Customer_name;
  $Customer_surname;

  if ($result_Customer->num_rows>0) {
    while ($row = $result_Customer->fetch_assoc()) {
      unset($Customer_name, $Customer_surname);
      $Customer_name    = $row['name'];
      $Customer_surname = $row['surname'];
    }
  }

  $newType;

  // Convert type variable format
  if ($type == 0) {
    $newType = "Caução";
  } else {
    $newType = "Termo de Responsabilidade";
  }
?>


<!-- PROCESS SECTION -->
<section class="clearfix processSection">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="processArea">
					<ul class="list-inline">
            <li>
              <h2><?php echo $name; ?></h2>
              <h3><?php echo $description; ?></h3>
              <p><?php echo "€ " . $price . " /day"; ?></p>
              <hr>
              <div class="profileIntro paraMargin">
              <h3>Item Availability</h3>
              <div class="row">
                <div class="dateSelect col-sm-6 col-xs-12">
                    <label for="initialAvailableDay" class="control-label">Beggining Date</label>
                      <div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
                      <input maxlength="10" type="text" class="form-control" id="initialAvailableDay" name="initialAvailableDay" placeholder="<?php echo $initialAvailableDay; ?>" value="<?php echo $initialAvailableDay; ?>" disabled>
                        <div class="input-group-addon">
                          <i class="fa fa-calendar" aria-hidden="true"></i>
                        </div>
                      </div>
                </div>
                <div class="dateSelect col-sm-6 col-xs-12">
                    <label for="endAvailableDay" class="control-label">End Date</label>
                      <div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
                      <input maxlength="10" type="text" class="form-control" id="endAvailableDay" name="endAvailableDay" placeholder="<?php echo $endAvailableDay; ?>" value="<?php echo $endAvailableDay; ?>" disabled>
                        <div class="input-group-addon">
                          <i class="fa fa-calendar" aria-hidden="true"></i>
                        </div>
                      </div>
                </div>
              </div>
              </div>
              <hr>
              <h2>Security policy</h2>
              <h3><?php echo "Type: " . $newType; ?></h3>
              <?php
                // Check if description is null
                if (!is_null($description_SecurityPolice)) {
                  echo "<h3><?php echo 'Description: ' . $description_SecurityPolice ?></h3>";  
                }
              ?>
              <h3><?php echo "Security Policy Reason: " . $description_SecurityPolice; ?></h3>
              <p><?php echo "Fee: € " . $fee ?></p>
              <hr>
              <label><?php echo "Category: " . $itemCategory; ?></label>
              <br>
              <label><?php echo "Published: " . $publishDate; ?></label>
              <hr>
            </li>
            <li>
              <?php
                if ($Login_idLogin == $Customer_id) {
                  echo "<h2>This item is yours!</h2>";
                  echo "<p>What do you want to do:</p>";
                  echo "<br>";
                  echo '<div class="row">';
                    echo '<div class="col-sm-6 col-xs-12">';
                      echo '<div class="form-group">';
                        echo '<button type="submit" class="label label-success">Edit item</button>';
                      echo '</div>';
                    echo '</div>';                  
                    echo '<div class="col-sm-6 col-xs-12">';
                      echo '<div class="form-group">';
                        echo '<button type="submit" class="label label-danger">Delete item</button>';
                      echo '</div>';
                    echo '</div>';
                  echo '</div>';
                } else {
                  echo "<h2>Carry out the rental</h2>";
                  echo "<p>Total price of the rental: € ??</p>";
                  echo "<br>";
                  echo '<form class="loginForm">';
                    echo '<div class="form-group">';
                      echo "<input type='text' class='form-control' name='cardHOlderName' id='cardHOlderName' placeholder='$Customer_name $Customer_surname' value='' disabled>";
                    echo '</div>';
                    echo '<div class="form-group">';
                      echo '<textarea rows="4" cols="50" class="form-control" name="purpose" id="purpose" placeholder="Rentals purpose"></textarea>';
                    echo '</div>';
                    echo '<div class="checkbox">';
                      echo '<label>';
                        echo '<input type="checkbox"> By confirming you agree to UniRent <a href="terms-of-services_profile_EN.php">Services Terms</a>';
                      echo '</label>';
                    echo '</div>';
                    echo '<div class="form-group mgnBtm0">';
                      echo '<button type="button" class="btn btn-primary">Confirm Rental</button>';
                    echo '</div>';
                  echo '</form>';
                }
              ?>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>


<?php
  require_once('php/footer_listings_EN.php');
  // print UniRent header
  do_unirent_footer();
?>
