<!DOCTYPE html>

<?php
  require_once('php/header_index_EN.php');
  require_once('db/unirent_functions.php');

  // print UniRent header
  do_unirent_header('UniRent');

  // connect to UniRent DB
  $conn = db_connect();
?>


<!-- BANNER SECTION -->
<section class="clearfix homeBanner" style="background-image: url(img/banner/5.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="banerInfo">
					<h1>All you can think, you can rent</h1>
					<p>The student's renting marketplace</p>
					<form class="form-inline" action="#" method="">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">Find</div>
								<input type="text" class="form-control" id="findItem" placeholder="What are you looking for?">
								<div class="input-group-addon addon-right"></div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Search <i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- WORKS SECTION -->
<section class="clearfix worksArea">
  <div class="container">
    <div class="page-header text-center">
      <h1>How it Works?</h1><br>
        <h3>UniRent is an innovative service for students like you who need an item just for a short period of time. It's safe and practical, and lets you browse thousands of items available to rent and match your needs.<br><br>
        <small>We give you a simple solution divided in 4 <b>easy</b> steps</small>
      </h3>
    </div>
    <div class="row">
      <div class="col-sm-3 col-xs-10">
        <div class="thumbnail text-center worksContent">
          <img src="img/works/Need.png" width="160" width="160" alt="Image works">
          <div class="caption">
            <a href="how-it-works_EN.php"><h3>Need</h3></a>
            <p>You had a need of an item, and the best way is to rent instead of buying.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-3 col-xs-10">
        <div class="thumbnail text-center worksContent">
          <img src="img/works/Search.png" width="160" width="160" alt="Image works">
          <div class="caption">
            <a href="how-it-works_EN.php"><h3>Search</h3></a>
            <p>You search for this item that you would like to rent in our platform.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-3 col-xs-10">
        <div class="thumbnail text-center worksContent">
          <img src="img/works/Rent.png" width="160" width="160" alt="Image works">
          <div class="caption">
            <a href="how-it-works_EN.php"><h3>Rent</h3></a>
            <p>Rent any item you need straight from its Owner in a easy way.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-3 col-xs-10">
        <div class="thumbnail text-center worksContent">
          <img src="img/works/Return.png" width="160" width="160" alt="Image works">
          <div class="caption">
            <a href="how-it-works_EN.php"><h3>Return</h3></a>
            <p>After used you return the item to its owner at a convenient time for both.</p>
          </div>
        </div>
      </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="btnArea text-center"><a href="#" class="btn btn-primary">Watch it now <i class="fa fa-play-circle" aria-hidden="true"></i></a></div>
      </div>
    </div>
  </div>
</section>


<!-- APP DOWNLOAD SECTION -->
<section class="clearfix appDownload">
  <div class="container">
    <div class="page-header text-center">
      <h2>Download on App Store</h2>
    </div>
    <div class="row">
      <div class="col-sm-4 col-xs-12">
        <a href="#" class="btn btn-primary btn-transparent">
          <i class="icon-listy icon-playstore"></i><span>available on <br><strong>Google Play</strong></span>
        </a>
      </div>
      <div class="col-sm-4 col-xs-12">
        <a href="#" class="btn btn-primary btn-transparent">
          <i class="icon-listy icon-apple"></i><span>available on <br><strong>Google Play</strong></span>
        </a>
      </div>
      <div class="col-sm-4 col-xs-12">
        <a href="#" class="btn btn-primary btn-transparent">
          <i class="icon-listy icon-microsoft"></i><span>available on <br><strong>Windows Store</strong></span>
        </a>
      </div>
    </div>
  </div>
</section>


<!-- MOST RENTED SECTION -->
<section class="clearfix filterProtfolio">
  <div class="container">
    <div class="page-header text-center">
      <h2>What People Like You Are Renting <small>This Are Some Of Most Popular Renting Stuffs Nowadays</small></h2>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="filter-container isotopeFilters">
          <ul class="list-inline filter">
            <li class="active"><a href="#" data-filter="*">Popular Item</a></li>
            <li><a href="#" data-filter=".recentItem">Recent Item</a></li>
            <li><a href="#" data-filter=".featuredItem">Featured Item</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row isotopeContainer" id="container">
      <div class="col-md-4 col-sm-6 col-xs-12 isotopeSelector featuredItem">
        <article class="">
          <figure>
            <img src="img/cars/car-1.jpg" alt="Image Protfolio" class="img-responsive">
            <div class="overlay-background">
              <div class="inner"></div>
            </div>
            <a href="#">
              <div class="overlay">
                <div class="overlayInfo">
                  <span class="label label-primary"><i class="fa fa-heart-o" aria-hidden="true"></i> 11 k</span>
                  <span class="label label-primary"><i class="fa fa-camera" aria-hidden="true"></i> 45</span>
                </div>
              </div>
            </a>
          </figure>
          <div class="figureBody">
            <h2><a href="#">AUDI M3 E92 2016 <i class="fa fa-check-circle" aria-hidden="true"></i></a></h2>
            <p>19 Dec, 2017</p>
            <h3>$80,000</h3>
          </div>
          <div class="figureFooter">
            <p>Brand New,  Automatic,  50 km/h</p>
          </div>
        </article>
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12 isotopeSelector recentItem">
        <article class="">
          <figure>
            <img src="img/cars/car-2.jpg" alt="Image Protfolio" class="img-responsive">
            <div class="overlay-background">
              <div class="inner"></div>
            </div>
            <a href="#">
              <div class="overlay">
                <div class="overlayInfo">
                  <span class="label label-primary"><i class="fa fa-heart-o" aria-hidden="true"></i> 9k</span>
                  <span class="label label-primary"><i class="fa fa-camera" aria-hidden="true"></i>25</span>
                </div>
              </div>
            </a>
          </figure>
          <div class="figureBody">
            <h2><a href="#">BMW NP E87 2018 <i class="fa fa-check-circle" aria-hidden="true"></i></a></h2>
            <p>25 jan, 2018</p>
            <h3>$90,000</h3>
          </div>
          <div class="figureFooter">
            <p>Brand New,  Automatic,  80 km/h</p>
          </div>
        </article>
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12 isotopeSelector recentItem">
        <article class="">
          <figure>
            <img src="img/cars/car-3.jpg" alt="Image Protfolio" class="img-responsive">
            <div class="overlay-background">
              <div class="inner"></div>
            </div>
            <a href="#">
              <div class="overlay">
                <div class="overlayInfo">
                  <span class="label label-primary"><i class="fa fa-heart-o" aria-hidden="true"></i> 7.5k</span>
                  <span class="label label-primary"><i class="fa fa-camera" aria-hidden="true"></i> 35</span>
                </div>
              </div>
            </a>
          </figure>
          <div class="figureBody">
            <h2><a href="#">FERRARY F3 C95 2017 <i class="fa fa-check-circle" aria-hidden="true"></i></a></h2>
            <p>29 Dec, 2017</p>
            <h3>$70,000</h3>
          </div>
          <div class="figureFooter">
            <p>Brand New,  Automatic,  60km/h</p>
          </div>
        </article>
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12 isotopeSelector recentItem">
        <article class="">
          <figure>
            <img src="img/cars/car-4.jpg" alt="Image Protfolio" class="img-responsive">
            <div class="overlay-background">
              <div class="inner"></div>
            </div>
            <a href="#">
              <div class="overlay">
                <div class="overlayInfo">
                  <span class="label label-primary"><i class="fa fa-heart-o" aria-hidden="true"></i> 9.8k</span>
                  <span class="label label-primary"><i class="fa fa-camera" aria-hidden="true"></i> 39</span>
                </div>
              </div>
            </a>
          </figure>
          <div class="figureBody">
            <h2><a href="#">DASTUN F9E 2017 <i class="fa fa-check-circle" aria-hidden="true"></i></a></h2>
            <p>19 Nov, 2017</p>
            <h3>$75,000</h3>
          </div>
          <div class="figureFooter">
            <p>Brand New,  Automatic,  76 km/h</p>
          </div>
        </article>
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12 isotopeSelector featuredItem">
        <article class="">
          <figure>
            <img src="img/cars/car-5.jpg" alt="Image Protfolio" class="img-responsive">
            <div class="overlay-background">
              <div class="inner"></div>
            </div>
            <a href="#">
              <div class="overlay">
                <div class="overlayInfo">
                  <span class="label label-primary"><i class="fa fa-heart-o" aria-hidden="true"></i> 9.1k</span>
                  <span class="label label-primary"><i class="fa fa-camera" aria-hidden="true"></i> 68 </span>
                </div>
              </div>
            </a>
          </figure>
          <div class="figureBody">
            <h2><a href="#">HONDA XE E95 2017 <i class="fa fa-check-circle" aria-hidden="true"></i></a></h2>
            <p>28 Feb, 2018</p>
            <h3>$74,500</h3>
          </div>
          <div class="figureFooter">
            <p>Brand New,  Automatic,  76 km/h</p>
          </div>
        </article>
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12 isotopeSelector featuredItem">
        <article class="">
          <figure>
            <img src="img/cars/car-6.jpg" alt="Image Protfolio" class="img-responsive">
            <div class="overlay-background">
              <div class="inner"></div>
            </div>
            <a href="#">
              <div class="overlay">
                <div class="overlayInfo">
                  <span class="label label-primary"><i class="fa fa-heart-o" aria-hidden="true"></i>8.9 k</span>
                  <span class="label label-primary"><i class="fa fa-camera" aria-hidden="true"></i> 45</span>
                </div>
              </div>
            </a>
          </figure>
          <div class="figureBody">
            <h2><a href="#">SUZUKI S4 E96 2017 <i class="fa fa-check-circle" aria-hidden="true"></i></a></h2>
            <p>29 Jan, 2017</p>
            <h3>$73,500</h3>
          </div>
          <div class="figureFooter">
            <p>Brand New,  Automatic, 40km/h</p>
          </div>
        </article>
      </div>

    </div>
  </div>
</section>


<!-- BENEFITS SECTION -->
<section class="clearfix articlesArea">
  <div class="container">
    <div class="page-header text-center">
      <h2>Your Main Benefits <small>We are sure that your short time need can be found here.</small></h2>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="servicesItem">
          <ul class="list-inline listServices">
            <li>
              <div class="servicesIcon">
                <i class="icon-listy icon-key"></i>
              </div>
              <div class="servicesInfo">
                <h2>Secure Trading</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed eiusmod</p>
              </div>
            </li>
            <li>
              <div class="servicesIcon">
                <i class="icon-listy icon-wreath"></i>
              </div>
              <div class="servicesInfo">
                <h2>24/7 Hours Support</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed eiusmod</p>
              </div>
            </li>
            <li>
              <div class="servicesIcon">
                <i class="icon-listy icon-tag3"></i>
              </div>
              <div class="servicesInfo">
                <h2>Easy Trading</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed eiusmod</p>
              </div>
            </li>
          </ul>
        </div>
      </div>
  </div>
</section>


<!-- UNIRENT DATA SECTION -->
<section class="clearfix countUpSection">
  <div class="container">
    <div class="page-header text-center">
      <h2>Some data about <u>UniRent</u></h2>
    </div>
    <div class="row">
      <div class="col-sm-4 col-xs-12">
        <div class="text-center countItem">
          <div class="counter">
            
            <?php

              $result_Customers = $conn->query("select * from Customer");
              $row_Customers = $result_Customers->num_rows;
              echo $row_Customers;

            ?>

          </div>
          <div class="counterInfo bg-color-1">Number of users</div>
        </div>
      </div>
      <div class="col-sm-4 col-xs-12">
        <div class="text-center countItem">
          <div class="counter">

            <?php

              $result_ToRent = $conn->query("SELECT * FROM Item i WHERE NOT EXISTS(SELECT * FROM Rental r WHERE r.Item_ID = i.id)");
              $row_ToRent = $result_ToRent->num_rows;
              echo $row_ToRent;

            ?>

          </div>
          <div class="counterInfo bg-color-2">Things to rent</div>
        </div>
      </div>
      <div class="col-sm-4 col-xs-12">
        <div class="text-center countItem">
          <div class="counter">

            <?php

              $result_Rented = $conn->query("SELECT * FROM Item i WHERE EXISTS(SELECT * FROM Rental r WHERE r.Item_ID = i.id)");
              $row_Rented = $result_Rented->num_rows;
              echo $row_Rented;

            ?>

          </div>
          <div class="counterInfo bg-color-3">Things already rented</div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="btnArea text-center">
          <a href="sign-up.php" class="btn btn-primary">Get started</a>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- OUR TEAM SECTION SECTION -->
<section class="clearfix thingsArea">
  <div class="container">
    <div class="page-header text-center">
      <h2>Meet Our Team <small>5 Crazy Friends From ISEG - Lisbon To The World</small></h2>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div id="thubmnailSlider" class="carousel slide thumbnailCarousel">

          <ol class="carousel-indicators">
            <li data-target="#thubmnailSlider" data-slide-to="0" class="active"></li>
            <li data-target="#thubmnailSlider" data-slide-to="1"></li>
            <li data-target="#thubmnailSlider" data-slide-to="2"></li>
            <li data-target="#thubmnailSlider" data-slide-to="3"></li>
            <li data-target="#thubmnailSlider" data-slide-to="4"></li>
            <li data-target="#thubmnailSlider" data-slide-to="5"></li>
          </ol>

          <!-- Carousel items -->
          <div class="carousel-inner">
            <div class="item row active">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="thingsBox">
                  <div class="thingsImage">
                    <img src="img/team/ana.jpeg" alt="Ana Rodrigues">
                  </div>
                  <div class="thingsCaption">
                    <ul class="list-inline captionItem">
                      <li><i class="fa" aria-hidden="true"></i> Ana Rodrigues</li>
                      <li><a href="https://www.linkedin.com/in/aropio/" target="_blank">LinkedIn</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="item row">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="thingsBox">
                  <div class="thingsImage">
                    <img src="img/team/catia.png" alt="Cátia Matias" height="350" width="500">
                  </div>
                  <div class="thingsCaption">
                    <ul class="list-inline captionItem">
                      <li><i class="fa" aria-hidden="true"></i> Cátia Matias</li>
                      <li><a href="https://www.linkedin.com/in/catiamatias/" target="_blank">LinkedIn</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="item row">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="thingsBox">
                  <div class="thingsImage">
                    <img src="img/team/patrick.jpg" alt="Patrick Fonseca" height="350" width="500">
                  </div>
                  <div class="thingsCaption">
                    <ul class="list-inline captionItem">
                      <li><i class="fa" aria-hidden="true"></i> Patrick Fonseca</li>
                      <li><a href="https://www.linkedin.com/in/patrickfcf/" target="_blank">LinkedIn</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="item row">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="thingsBox">
                  <div class="thingsImage">
                    <img src="img/team/rui.png" alt="Rui Varela" height="350" width="500">
                  </div>
                  <div class="thingsCaption">
                    <ul class="list-inline captionItem">
                      <li><i class="fa" aria-hidden="true"></i> Rui Varela</li>
                      <li><a href="https://www.linkedin.com/in/rui-rodrigues-varela/" target="_blank">LinkedIn</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="item row">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="thingsBox">
                  <div class="thingsImage">
                    <img src="img/team/sofia.png" alt="Sofia Gonçalves" height="350" width="500">
                  </div>
                  <div class="thingsCaption">
                    <ul class="list-inline captionItem">
                      <li><i class="fa" aria-hidden="true"></i> Sofia Gonçalves</li>
                      <li><a href="https://www.linkedin.com/in/sofia-gonçalves-7aa753111/" target="_blank">LinkedIn</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <a class="left carousel-control" href="#thubmnailSlider" data-slide="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
          <a class="right carousel-control" href="#thubmnailSlider" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- CALL TO ACTION SECTION -->
<section class="clearfix callAction">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-sm-9 col-xs-12">
				<div class="callInfo">
					<h4><span>UniRent</span> is the <span>best way</span> <br>to Find Great Products for a short time</h4>
				</div>
			</div>
			<div class="col-md-2 col-sm-3 col-xs-12">
				<div class="btnArea">
					<a href="sign-up_EN.php" class="btn btn-primary btn-block">Get Started</a>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- MAP SECTION -->
<section class="clearfix p0">
  <div id="map-canvas"></div>
</section>


<?php
  // disconnect to UniRent DB
  $conn->close();

  require_once('php/footer_EN.php');

  // print UniRent header
  do_unirent_footer();
?>
