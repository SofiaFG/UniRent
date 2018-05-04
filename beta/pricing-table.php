<!DOCTYPE html>

<?php
  require_once('php/header.php');
  
  // print UniRent header
  do_unirent_header('Seguro - UniRent');
?>


<!-- PAGE TITLE SECTION -->
<section class="clearfix pageTitleSection" style="background-image: url();">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="pageTitle">
					<h2>Seguro</h2>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- PRICING TABLE -->
<section class="clearfix priceTableSection">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
				<div class="pricingIntro">
					<p>Fornecemos-te a opção de adicionares um seguro a cada aluguer que fizeres, para que não tenhas que pagar nenhuma caução nem tenhas que te responsabilizar por qualquer eventualidade que aconteça ao bem que estás a alugar.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="priceTableWrapper advancedSupport">
					<div class="priceTableTitle">
						<h2>Sem Seguro</h2><br>
					</div>
					<div class="priceAmount">
						<h2>0<small>€</small></h2>
					</div>
					<div class="priceInfo">
						<ul class="priceShorting">
							<li><i class="fa fa-check-square"></i><p>A UniRent não se responsabiliza</p></li>
							<li><i class="fa fa-check-square"></i><p>Sujeito às condições do <u>Owner</u>:</p>
								<ul>
									<li><i class="fa fa-check-square"></i>Pagamento de Caução</li>
									<li><i class="fa fa-check-square"></i>Termo de Responsabilidade</li>
								</ul>
							</li>
						</ul>
						<div class="priceBtn">
							<a href="sign-up.php" class="btn btn-primary">Começa Agora</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<div class="priceTableWrapper advancedSupport active">
					<div class="priceTableTitle">
						<h2>Com Seguro<small>Sem Preocupações</small></h2>
					</div>
					<div class="priceAmount">
						<h2>Variável<sup>*</sup></h2>
					</div>
					<div class="priceInfo">
						<ul class="priceShorting">
							<li class="active"><i class="fa fa-check-square"></i><p>A UniRent cobre todo e qualquer dano</p></li>
							<li class="active"><i class="fa fa-check-square"></i><p>As condições do <u>Owner</u> ficam sem efeito:</p>
								<ul>
									<li class="active"><i class="fa fa-check-square"></i>Sem Pagamento de Caução</li>
									<li class="active"><i class="fa fa-check-square"></i>Sem Termo de Responsabilidade</li>
								</ul>
							</li>
						</ul>
						<div class="priceBtn">
							<a href="sign-up.php" class="btn btn-primary">Aluga sem Medos!</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12">
				<div class="signUpMessage">
					<p>Não tens Conta? <a href="sign-up.php">Sign up</a></p>
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
