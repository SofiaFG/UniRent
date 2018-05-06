<!DOCTYPE html>

<?php
  require_once('php/header_listings_EN.php');
  require_once('db/unirent_functions.php');

  // connect to UniRent DB
  $conn = db_connect();

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
  $SecurityPolice_id;
  $ItemCategory_id;

  if ($result_Item->num_rows>0) {
    while ($row = $result_Item->fetch_assoc()) {
      unset($name, $description, $price, $publishDate, $initialAvailableDay, $endAvailableDay, $SecurityPolice_id, $ItemCategory_id);
      $name                = $row['name'];
      $description         = $row['description'];
      $price               = $row['price'];
      $publishDate         = $row['publishDate'];
      $initialAvailableDay = $row['initialAvailableDay'];
      $endAvailableDay     = $row['endAvailableDay'];
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
                      <input maxlength="10" type="text" class="form-control" id="initialAvailableDay" name="initialAvailableDay" placeholder="<?php echo $initialAvailableDay; ?>" value="<?php echo $initialAvailableDay; ?>">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar" aria-hidden="true"></i>
                        </div>
                      </div>
                </div>
                <div class="dateSelect col-sm-6 col-xs-12">
                    <label for="endAvailableDay" class="control-label">End Date</label>
                      <div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
                      <input maxlength="10" type="text" class="form-control" id="endAvailableDay" name="endAvailableDay" placeholder="<?php echo $endAvailableDay; ?>" value="<?php echo $endAvailableDay; ?>">
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
              <h3><?php echo "Description: " . $description_SecurityPolice; ?></h3>
              <p><?php echo "Fee: € " . $fee ?></p>
              <hr>
              <label><?php echo "Category: " . $itemCategory; ?></label>
              <br>
              <label><?php echo "Published: " . $publishDate; ?></label>
              <hr>
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
