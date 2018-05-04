<!DOCTYPE html>

<?php
  require_once('php/header_EN.php');

  // print UniRent header
  do_unirent_header('Login - UniRent');
?>


<!-- LOGIN SECTION -->
<section class="clearfix loginSection">
	<div class="container">
		<div class="row">
			<div class="center-block col-md-5 col-sm-6 col-xs-12">
				<div class="panel panel-default loginPanel">
					<div class="panel-heading text-center">Members log in</div>
					<div class="panel-body">
						<form class="loginForm" action="db/login_validation.php" method="post">
							<div class="form-group">
								<label for="username">Username*</label>
								<input type="text" class="form-control" id="username" name="username">
							</div>
							<div class="form-group">
								<label for="password">Password*</label>
								<input type="password" class="form-control" id="password" name="password">
							</div>
							<div class="form-group">
								<input type="hidden" name="pageName" value="loginEN">
								<button type="submit" name="submit" class="btn btn-primary pull-left">Log In</button>
								<a href="#" class="pull-right link">Fogot Password?</a>
							</div>
						</form>
					</div>
					<div class="panel-footer text-center">
						<p>Not a member yet? <a href="sign-up_EN.php" class="link">Sign up</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php
  require_once('php/footer_EN.php');

  // print UniRent header
  do_unirent_footer();
?>
