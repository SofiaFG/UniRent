<?php
	function do_unirent_footer() {
	// print UniRent footer
?>

	<!-- FOOTER -->
    <footer style="background-image: url(img/banner/4.jpg);">
      <!-- FOOTER INFO -->
      <div class="clearfix footerInfo">
        <div class="container">
          <div class="row">
            <div class="col-sm-7 col-xs-12">
              <div class="footerText">
                <p>The student's renting marketplace</p>
                <ul class="list-styled list-contact">
                  <li><i class="fa fa-phone" aria-hidden="true"></i>[+351] 657 524 332</li>
                  <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:contacto@unirent.online?Subject=Contact%20UniRent" target="_top">contacto@unirent.online</a></li>
                  <li><i class="fa fa-globe" aria-hidden="true"></i><a href="index.php">Change language to <u>Portuguese</u></a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-3 col-xs-12">
            </div>
            <div class="col-sm-2 col-xs-12">
              <div class="footerInfoTitle">
                <h4>Company</h4>
              </div>
              <div class="useLink">
                <ul class="list-unstyled">
                  <li><a href="contact-us_EN.php">Contact Us</a></li>
                  <li><a href="terms-of-services_EN.php">Terms and Conditions</a></li>
                  <li><a href="how-it-works_EN.php">How It Works</a></li>
                  <li><a href="pricing-table_EN.php">Assurance</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- COPY RIGHT -->
      <div class="clearfix copyRight">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <div class="copyRightWrapper">
                <div class="row">
                  <div class="col-sm-5 col-sm-push-7 col-xs-12">
                    <ul class="list-inline socialLink">
                      <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                      <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    </ul>
                  </div>
                  <div class="col-sm-7 col-sm-pull-5 col-xs-12">
                    <div class="copyRightText">
                      <p>Copyright &copy; 2018. All Rights Reserved by <a href="index_EN.php">UniRent</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </footer>
  </div>

  <!-- LOGIN  MODAL -->
  <div id="loginModal" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Log In to your Account</h4>
        </div>
        <div class="modal-body">
          <form class="loginForm">
            <div class="form-group">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <input type="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="form-group">
              <i class="fa fa-lock" aria-hidden="true"></i>
              <input type="password" class="form-control" id="pwd" placeholder="Password">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">Log In</button>
            </div>
            <div class="checkbox">
              <label><input type="checkbox"> Remember me</label>
              <a href="#" class="pull-right link">Fogot Password?</a>
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <p>Don't have an Account? <a href="sign-up_EN.php" class="link">Sign up</a></p>
        </div>
      </div>
    </div>
  </div>

  <!-- JAVASCRIPTS -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="plugins/smoothscroll/SmoothScroll.min.js"></script>
  <script src="plugins/waypoints/waypoints.min.js"></script>
  <script src="plugins/counter-up/jquery.counterup.min.js"></script>
  <script src="plugins/datepicker/bootstrap-datepicker.min.js"></script>
  <script src="plugins/selectbox/jquery.selectbox-0.1.3.min.js"></script>
  <script src="plugins/owl-carousel/owl.carousel.min.js"></script>
  <script src="plugins/slick/slick.min.js"></script>
  <script src="plugins/isotope/isotope.min.js"></script>
  <script src="plugins/fancybox/jquery.fancybox.min.js"></script>
  <script src="plugins/isotope/isotope-triger.min.js"></script>
  <script src="plugins/rateyo/jquery.rateyo.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEDfNcQRmKQEyulDN8nGWjLYPm8s4YB58"></script>
  <script src="plugins/map/js/rich-marker.js"></script>
  <script src="plugins/map/js/infobox_packed.js"></script>
  <script src="js/single-map.js"></script>
  <script src="js/map.js"></script>
  <script src="js/custom.js"></script>

</body>

</html>

<?php
	};
?>