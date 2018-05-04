<!DOCTYPE html>

<?php
  require_once('php/header_listings.php');
  //require_once('db/unirent_functions.php');
  include('db/session.php');

  // print UniRent header
  do_unirent_header('Dashboard | UniRent');

  // connect to UniRent DB
  //$conn = db_connect();
?>


<!-- Dashboard breadcrumb section -->
<div class="section dashboard-breadcrumb-section bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>Dashboard</h2>
        <ol class="breadcrumb">
          <li><a href="listings.php">Início</a></li>
        </ol>
      </div>
    </div>
  </div>
</div>

<!-- DASHBOARD SECTION -->
<section class="clearfix bg-dark equalHeight dashboardSection">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-xs-12">
				<div class="panel panel-default panel-card">
					<div class="panel-heading">
						Bens Disponíveis <span class="label label-primary">Por Dia</span>
					</div>
					<div class="panel-body">
						<h3><center>5 unidades</center></h3>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="panel panel-default panel-card">
					<div class="panel-heading">
						Bens Alugados <span class="label label-primary">Por mês</span>
					</div>
					<div class="panel-body">
						<h3><center>5 unidades</center></h3>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="panel panel-default panel-card">
					<div class="panel-heading">
						Total de Bens <span class="label label-primary">Detalhes</span>
					</div>
					<div class="panel-body">
						<h3><center>10 unidades</center></h3>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 col-xs-12">
				<div class="panel panel-default panel-card">
					<div class="panel-heading">
						As minhas Reviwes <span class="label label-primary">Detalhes</span>
					</div>
					<div class="panel-body plr">
						<ul class="list-unstyled panel-list">
							<li>
								<div class="listWrapper">
									<div class="listName">
										<h3>Think Coffee<small>215 Terry Lane, New York</small></h3>
									</div>
									<div class="listResult">
										<ul class="list-inline rating">
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
										</ul>
										<span class="likePart"><i class="fa fa-heart-o primaryColor" aria-hidden="true"></i>8k</span>
										<span class="likeResult">Visits: <strong>20,500</strong></span>
									</div>
								</div>
							</li>
							<li>
								<div class="listWrapper">
									<div class="listName">
										<h3>Burger House<small>2726 Shinn Street, New York</small></h3>
									</div>
									<div class="listResult">
										<ul class="list-inline rating">
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
										</ul>
										<span class="likePart"><i class="fa fa-heart-o primaryColor" aria-hidden="true"></i>9.2k</span>
										<span class="likeResult">Visits: <strong>15,500</strong></span>
									</div>
								</div>
							</li>
							<li>
								<div class="listWrapper">
									<div class="listName">
										<h3>Tom's Restaurant<small>964 School Street, New York</small></h3>
									</div>
									<div class="listResult">
										<ul class="list-inline rating">
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
										</ul>
										<span class="likePart"><i class="fa fa-heart-o primaryColor" aria-hidden="true"></i>9.5K</span>
										<span class="likeResult">Visits: <strong>21,499</strong></span>
									</div>
								</div>
							</li>
							<li>
								<div class="listWrapper">
									<div class="listName">
										<h3>Sticky Band<small>Bishop Avenue, New York</small></h3>
									</div>
									<div class="listResult">
										<ul class="list-inline rating">
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
										</ul>
										<span class="likePart"><i class="fa fa-heart-o primaryColor" aria-hidden="true"></i>596k</span>
										<span class="likeResult">Visits: <strong>1,425</strong></span>
									</div>
								</div>
							</li>
							<li>
								<div class="listWrapper">
									<div class="listName">
										<h3>Hotel Govendor<small>778 Country Street, New York</small></h3>
									</div>
									<div class="listResult">
										<ul class="list-inline rating">
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
										</ul>
										<span class="likePart"><i class="fa fa-heart-o primaryColor" aria-hidden="true"></i>5k</span>
										<span class="likeResult">Visits: <strong>5,786</strong></span>
									</div>
								</div>
							</li>
							<li>
								<div class="listWrapper">
									<div class="listName">
										<h3>The Mayfair Hotel<small>242 W 49th St, New York</small></h3>
									</div>
									<div class="listResult">
										<ul class="list-inline rating">
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
											<li><i class="fa fa-star" aria-hidden="true"></i></li>
										</ul>
										<span class="likePart"><i class="fa fa-heart-o primaryColor" aria-hidden="true"></i>10k</span>
										<span class="likeResult">Visits: <strong>20,500</strong></span>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="panel panel-default panel-card">
					<div class="panel-heading" id="categories">
						Categorias Populares <span class="label label-primary">Por mês</span>
					</div>
					<div class="panel-body plr">
						<ul class="list-styled panel-list list-padding">
							<li class="listWrapper"><span class="itmeName"><i class="icon-listy icon-tea-cup-1 iconBox"></i>Restaurants</span> <span class="itemSubmit">Submited List: <strong>250</strong></span></li>
							<li class="listWrapper"><span class="itmeName"><i class="icon-listy icon-building iconBox"></i>Hotels</span> <span class="itemSubmit">Submited List: <strong>90</strong></span></li>
							<li class="listWrapper"><span class="itmeName"><i class="icon-listy icon-juice iconBox"></i>Nightclubs</span> <span class="itemSubmit">Submited List: <strong>260</strong></span></li>
							<li class="listWrapper"><span class="itmeName"><i class="icon-listy icon-car-1 iconBox"></i>Auto Motive</span> <span class="itemSubmit">Submited List: <strong>900</strong></span></li>
							<li class="listWrapper"><span class="itmeName"><i class="icon-listy icon-castle iconBox"></i>Museums</span> <span class="itemSubmit">Submited List: <strong>20</strong></span></li>
							<li class="listWrapper"><span class="itmeName"><i class="icon-listy icon-television iconBox"></i>Movie Theaters</span> <span class="itemSubmit">Submited List: <strong>150</strong></span></li>
							<li class="listWrapper"><span class="itmeName"><i class="icon-listy icon-mall-1 iconBox"></i>Shopping</span> <span class="itemSubmit">Submited List: <strong>300</strong></span></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="panel panel-default panel-card">
					<div class="panel-heading">
						Os meus Borrowers <span class="label label-primary">Detalhes</span>
					</div>
					<div class="panel-body plr">
						<ul class="list-styled panel-list list-padding-sm">
							<li  class="listWrapper"><span class="recentUserInfo"><img src="img/dashboard/recent-user-1.jpg" alt="Image User" class="img-circle">Aaren</span> <span class="userTime">Active 10m ago</span></li>
							<li  class="listWrapper"><span class="recentUserInfo"><img src="img/dashboard/recent-user-2.jpg" alt="Image User" class="img-circle">Abby</span> <span class="userTime">Active 12m ago</span></li>
							<li  class="listWrapper"><span class="recentUserInfo"><img src="img/dashboard/recent-user-3.jpg" alt="Image User" class="img-circle">Abriel</span> <span class="userTime">Active 15m ago</span></li>
							<li  class="listWrapper"><span class="recentUserInfo"><img src="img/dashboard/recent-user-4.jpg" alt="Image User" class="img-circle">Adam Smith</span> <span class="userTime">Active 17m ago</span></li>
							<li  class="listWrapper"><span class="recentUserInfo"><img src="img/dashboard/recent-user-1.jpg" alt="Image User" class="img-circle">Jone Deo</span> <span class="userTime">Active 19m ago</span></li>
							<li  class="listWrapper"><span class="recentUserInfo"><img src="img/dashboard/recent-user-2.jpg" alt="Image User" class="img-circle">Eelheid</span> <span class="userTime">Active 14m ago</span></li>
							<li  class="listWrapper"><span class="recentUserInfo"><img src="img/dashboard/recent-user-3.jpg" alt="Image User" class="img-circle">Aime</span> <span class="userTime">Active 1h ago</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-default panel-card">
					<div class="panel-heading" id="message">
						As minhas mensagens <span class="label label-default label-sm">3 Novas</span> <a href="" class="btn label label-primary">Enviar mensagem</a>
					</div>
					<div class="panel-body panel-message">
						<ul class="list-unstyled panel-list">
							<li class="messageCommon recentMessage listWrapper">
								<span class="messageInfo">
									<h5>Aden, <small>Today <span class="dayTime">11.08 AM</span></small></h5>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</span>
								<span class="messageTime">5m ago</span>
							</li>
							<li class="messageCommon recentMessage listWrapper">
								<span class="messageInfo">
									<h5>Adrien Smith, <small>Today <span class="dayTime">10.38 AM</span></small></h5>
									<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								</span>
								<span class="messageTime">5m ago</span>
							</li>
							<li class="messageCommon recentMessage listWrapper">
								<span class="messageInfo">
									<h5>Agata, Roy <small>Today <span class="dayTime">8.56 AM</span></small></h5>
									<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								</span>
								<span class="messageTime">5m ago</span>
							</li>
							<li class="messageCommon oldMessage listWrapper">
								<span class="messageInfo">
									<h5>Aileen Deo, <small>Today <span class="dayTime">8.07 PM</span></small></h5>
									<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
								</span>
								<span class="messageTime">5m ago</span>
							</li>
							<li class="messageCommon oldMessage listWrapper">
								<span class="messageInfo">
									<h5>Agneta Smith, <small>Today <span class="dayTime">11.08 AM</span></small></h5>
									<p>Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked</p>
								</span>
								<span class="messageTime">5m ago</span>
							</li>
							<li class="messageCommon oldMessage listWrapper">
								<span class="messageInfo">
									<h5>Alexa Deos, <small>Today <span class="dayTime">2.08 PM</span></small></h5>
									<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</p>
								</span>
								<span class="messageTime">5m ago</span>
							</li>
						</ul>
					</div>
				</div>
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
