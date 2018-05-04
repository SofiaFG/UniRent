<!DOCTYPE html>

<?php
  require_once('php/header.php');
  require_once('db/unirent_functions.php');

  // print UniRent header
  do_unirent_header('Login - UniRent');
?>


<!-- LOGIN SECTION -->
<section class="clearfix loginSection">
	<div class="container">
		<div class="row">
			<div class="center-block col-md-5 col-sm-6 col-xs-12">
				<div class="panel panel-default loginPanel">
					<div class="panel-heading text-center">Login de Utilizadores</div>
					<div class="panel-body">
						<form class="loginForm" action="db/login_validation.php" method="post">
							<div class="form-group">
								<label for="username">Username*</label>
								<input type="text" class="form-control" name="username" id="username">
							</div>
							<div class="form-group">
								<label for="password">Password*</label>
								<input type="password" class="form-control" name="password" id="password">
							</div>
							<div class="form-group">
								<input type="hidden" name="pageName" value="login"/>
								<button type="submit" name="submit" class="btn btn-primary pull-left">Login</button>
								<a href="#" class="pull-right link">Esqueci-me da Password</a>
							</div>
						</form>
					</div>
					<div class="panel-footer text-center">
						<p>Ainda não tens conta?<a href="sign-up.php" class="link"> Sign up</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php
  require_once('php/footer.php');

  // print UniRent header
  do_unirent_footer();
?>
