<!DOCTYPE html>

<?php
  require_once('php/header_index.php');
  require_once('db/unirent_functions.php');

  // print UniRent header
  do_unirent_header('UniRent');

  // connect to UniRent DB
  $conn = db_connect();
?>

<script>
  function validateForm() {
    
      var x = document.forms["search_items"]["findItem"].value;

      if (x == "") {
          alert("Por favor, introduza o que estás à procura!");
          document.getElementById("findItem").focus();
          return false;
      }
  }

  function validateFormNewsletter() {
    
      var x = document.forms["newsletter_form"]["email"].value;

      if (x == "") {
          alert("Por favor, introduza o que seu email!");
          document.getElementById("email").focus();
          return false;
      }
  }
</script>

<!-- BANNER SECTION -->
<section class="clearfix homeBanner" style="background-image: url(img/banner/5.jpg);">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="banerInfo">
          <h1>Aluga tudo o que possas imaginar</h1>
          <p>O mercado de aluguer para estudantes</p>
          <form name="search_items" class="form-inline" onsubmit="return validateForm()" action="search_items.php" method="POST">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">Encontrar</div>
                <input type="text" class="form-control" id="findItem" name="findItem" placeholder="O que estás à procura?">
                <div class="input-group-addon addon-right"></div>
              </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Pesquisar <i class="fa fa-search" aria-hidden="true"></i></button>
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
      <h1>Como Funciona</h1><br>
        <h3>UniRent é um serviço inovador para estudantes como Tu, que precisam de um bem apenas por um curto período de tempo. É seguro, prático e permite que navegues por milhares de bens disponíveis para alugar e atender às tuas necessidades.<br><br>
        <small>Nós oferecemos-te uma solução <b>fácil</b> e <b>simples</b> em 4 passos</small>
      </h3>
    </div>
    <div class="row">
      <div class="col-sm-3 col-xs-10">
        <div class="thumbnail text-center worksContent">
          <img src="img/works/Need.png" width="160" width="160" alt="Image works">
          <div class="caption">
            <a href="how-it-works.php"><h3>Necessidade</h3></a>
            <p>Se tens a necessidade de utilizar um bem, a melhor solução é alugar em vez de comprar.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-3 col-xs-10">
        <div class="thumbnail text-center worksContent">
          <img src="img/works/Search.png" width="160" width="160" alt="Image works">
          <div class="caption">
            <a href="how-it-works.php"><h3>Pesquisar</h3></a>
            <p>Procura pelo bem que gostarias de alugar na nossa plataforma.</p>
            <span style="display:inline-block; width: YOURWIDTH;"></span>
          </div>
        </div>
      </div>
      <div class="col-sm-3 col-xs-10">
        <div class="thumbnail text-center worksContent">
          <img src="img/works/Rent.png" width="160" width="160" alt="Image works">
          <div class="caption">
            <a href="how-it-works.php"><h3>Alugar</h3></a>
            <p>Aluga qualquer bem diretamente com o <em>Owner</em> de uma maneira fácil.</p>
            <span style="display:inline-block; width: YOURWIDTH;"></span>
          </div>
        </div>
      </div>
      <div class="col-sm-3 col-xs-10">
        <div class="thumbnail text-center worksContent">
          <img src="img/works/Return.png" width="160" width="160" alt="Image works">
          <div class="caption">
            <a href="how-it-works.php"><h3>Devolver</h3></a>
            <p>Depois de o utilizares, devolves o bem ao seu <em>Owner</em> da forma mais conveniente.</p>
            <span style="display:inline-block; width: YOURWIDTH;"></span>
          </div>
        </div>
      </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="btnArea text-center"><a href="#" class="btn btn-primary">Vê agora <i class="fa fa-play-circle" aria-hidden="true"></i></a></div>
      </div>
    </div>
  </div>
</section>


<!-- APP DOWNLOAD SECTION -->
<section class="clearfix appDownload">
  <div class="container">
    <div class="page-header text-center">
      <h2>Descarrega na App Store</h2>
    </div>
    <div class="row">
      <div class="col-sm-4 col-xs-12">
        <a href="#" class="btn btn-primary btn-transparent">
          <i class="icon-listy icon-playstore"></i><span>disponível em <br><strong>Google Play</strong></span>
        </a>
      </div>
      <div class="col-sm-4 col-xs-12">
        <a href="#" class="btn btn-primary btn-transparent">
          <i class="icon-listy icon-apple"></i><span>disponível em <br><strong>Google Play</strong></span>
        </a>
      </div>
      <div class="col-sm-4 col-xs-12">
        <a href="#" class="btn btn-primary btn-transparent">
          <i class="icon-listy icon-microsoft"></i><span>disponível em <br><strong>Windows Store</strong></span>
        </a>
      </div>
    </div>
  </div>
</section>


<!-- BENEFITS SECTION -->
<section class="clearfix articlesArea">
  <div class="container">
    <div class="page-header text-center">
      <h2>Os Teus Principais Benefícios <small>Temos a convicção de que a tua necessidade pode ser satisfeita aqui.</small></h2>
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
                <h2>Negociação Segura</h2>
                <p>Os teus dados vão permanecer seguros, não serão transmitidos a terceiros sem a tua permissão.</p>
              </div>
            </li>
            <li>
              <div class="servicesIcon">
                <i class="icon-listy icon-wreath"></i>
              </div>
              <div class="servicesInfo">
                <h2>Suporte 24 horas por dia, 7 dias por semana</h2>
                <p>Estamos sempre disponíveis para responder a qualquer dúvida que te possa surgir.</p>
              </div>
            </li>
            <li>
              <div class="servicesIcon">
                <i class="icon-listy icon-tag3"></i>
              </div>
              <div class="servicesInfo">
                <h2>Negociação Fácil</h2>
                <p>O bem que estás a alugar está à distância de um simples clique!</p>
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
      <h2>Mais informações sobre a <u>UniRent</u></h2>
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
          <div class="counterInfo bg-color-1">Número de utilizadores</div>
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
          <div class="counterInfo bg-color-2">O que podes alugar</div>
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
          <div class="counterInfo bg-color-3">Bens já alugados</div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="btnArea text-center">
          <a href="sign-up.php" class="btn btn-primary">Começa já</a>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- OUR TEAM SECTION SECTION -->
<section class="clearfix thingsArea">
  <div class="container">
    <div class="page-header text-center">
      <h2>Conhece a nossa Equipa <small>5 Amigos Loucos do ISEG - De Lisboa para o Mundo</small><small><a href="about-us.php">Sobre Nós</a></small></h2>
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
                    <img src="img/team/patrick.jpeg" alt="Patrick Fonseca" height="350" width="500">
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
                    <img src="img/team/catia.jpeg" alt="Cátia Matias" height="350" width="500">
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
                    <img src="img/team/rui.jpeg" alt="Rui Varela" height="350" width="500">
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
                    <img src="img/team/sofia.jpeg" alt="Sofia Gonçalves" height="350" width="500">
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
      <div class="col-md-15 col-sm-15 col-xs-20">
        <div class="callInfo">
          <h4><span>UniRent</span> é a <span>melhor maneira</span> <br>para encontrar os Melhores Produtos para um curto período de tempo</h4>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- NEWSLETTER -->
<section class="clearfix thingsArea">
  <div class="container">
    <div class="row">
      <div class="page-header text-center">
        <h2>Fique atento às nossas novidades</h2>
      </div>
      <div class="center-block col-md-5 col-sm-6 col-xs-12">
        <div class="panel panel-default loginPanel">
          <div class="panel-heading text-center">Newsletter</div>
          <div class="panel-body">
            <form name="newsletter_form" onsubmit="return validateFormNewsletter()" class="loginForm" action="sendEmail.php" method="post">
              <div class="form-group">
                <label for="email">Email*</label>
                <input maxlength="45" type="text" class="form-control" name="email" id="email" >
              </div>
              <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary pull-left">Subscrever</button>
              </div>
            </form>
          </div>
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

  require_once('php/footer.php');

  // print UniRent header
  do_unirent_footer();
?>
