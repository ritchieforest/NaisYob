 <?php 
 session_start();
 if (!isset($_SESSION['active']) and $_SESSION['active']!=true) {
  print "<meta http-equiv=Refresh content=\"2 ; url= index.php\">";
}
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



  <title>NaisYob</title>
  <!-- web fonts -->
  <!-- //web fonts -->
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/star.css">



</head>
<body>
  <div class="w3l-bootstrap-header fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light p-2">
      <div class="container" style="  height: 50px; " >
        <a class="navbar-brand" href="index.html"><span class="fa fa-diamond"></span>NaisYob</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="mi_perfil.php">Mi Perfil</a>
          </li>
          <?php if ($_SESSION['tipo']==1 or $_SESSION['tipo']==2 ) {
           ?>
           <li class="nav-item">
            <a class="nav-link" href="about.php">Filtros de Ofertas de Trabajo</a>
          </li>
        <?php } ?>
        <?php if($_SESSION['tipo']==2 or $_SESSION['tipo']==3){  ?>
          <li class="nav-item">
            <a class="nav-link" href="filtro_empleado.php">Filtros de Empleado por Rubro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="crear_oferta.php">Crear Oferta de Trabajo</a>
          </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link" href="salir.php">Salir</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>
<header>
  <div  class="alert alert-info" style="position: relative;  top:100px">
    <h1>Bienvenido</h1>
    <h6>Desea Buscar Empleo</h6>
    <select class="form-control" id="name">
     <option>Eliga un Rubro por el que desee buscar empleados</option>
     <option value="1">Informatica</option> 
   </select>
 </div>
</header>
<br>
<br>
<br><br>
<?php 
if (isset($_GET['id_dato'])) {
  include 'ajax/conexion.php';
  $sql="select r.desc_rubro as rubro,c.nombre_cargo as cargo,u.user_name as email ,s.desc_sexo as sexo,p.nombres as nombre,p.apellidos as apellido,p.dni as dni, p.cuil as cuil from persona p 
  inner join empleado e on p.id_persona=e.rela_persona inner join cargo_empleado ce on e.id_empleado=ce.rela_empleado 
  inner join cargo c on c.id_cargo=ce.rela_cargo inner join rubro r on r.id_rubro=c.rela_rubro
  inner join usuario u on p.id_persona=u.rela_persona 
  inner join sexo s on s.id_sexo=p.rela_sexo where r.id_rubro=".$_GET['id_dato']."";
  $queryEmpleados=$pdo->query($sql);

  ?>
  <?php if ($queryEmpleados->rowCount()>0) {
    while ($data=$queryEmpleados->fetch()) {
        # code...
      ?>      
      <div class="card" style="width: 16rem;">
        <img class="card-img-top" src="assets/images/user.png"   alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?php echo $data['apellido']." ".$data['nombre']; ?></h5>
          <p class="card-text"><?php echo $data['dni']; ?></p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><?php echo $data['rubro']; ?></li> 
          <li class="list-group-item"><?php echo $data['cargo']; ?></li>
          <li class="list-group-item"><?php echo $data['email']; ?></li>
          <li class="list-group-item">Carrera que estudia:</li>
          <li class="list-group-item"></li>
          <li class="list-group-item"><a href="#" class="card-link">Enviar Mensaje</a></li>
          <li class="list-group-item"><a href="#" class="card-link">Ver Perfil</a></li>
        </ul>
      </div>
      <?php
    }  }
  } ?>

  <!-- footer-28 block -->
  <section class="w3l-market-footer" >
    <footer class="footer-28" >
      <div class="footer-bg-layer" >
        <div class="container py-lg-3">
          <div class="row footer-top-28">
            <div class="col-md-6 footer-list-28 mt-5" style="position: absolute;  top:1500px; left:  50px;">
              <h6 class="footer-title-28">Información del contacto</h6>
              <ul>

                <li>
                  <p><strong>Teléfono</strong> : <a href="tel:+5493704501577">+5493704501577</a></p>
                </li>
                <li>
                  <p><strong>Correo Electrónico</strong> : <a href="mailto:keirahn18@gmail.com">keirahn18@gmail.com</a></p>
                </li>
              </ul>

              <div class="main-social-footer-28 mt-3">
                <ul class="social-icons">
                  <li class="facebook">
                    <a href="#link" title="Facebook">
                      <span class="fa fa-facebook" aria-hidden="true"></span>
                    </a>
                  </li>
                  <li class="twitter">
                    <a href="#link" title="Twitter">
                      <span class="fa fa-twitter" aria-hidden="true"></span>
                    </a>
                  </li>
                  <li class="dribbble">
                    <a href="#link" title="Dribbble">
                      <span class="fa fa-dribbble" aria-hidden="true"></span>
                    </a>
                  </li>
                  <li class="google">
                    <a href="#link" title="Google">
                      <span class="fa fa-google" aria-hidden="true"></span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-6" style="position: absolute;  top:1500px; left : 600px;">
              <div class="row">
                <div class="col-md-4 footer-list-28 mt-5">
                  <h6 class="footer-title-28">Empresa</h6>
                  <ul>
                    <li><a href="about.html">Acerca De</a></li>
                    
                  </ul>
                </div>
                <div class="col-md-4 footer-list-28 mt-5" style="position: absolute;  left:  400px;">
                  <h6 class="footer-title-28">Apoyo</h6>
                  <ul>
                    <li><a href="contact.html">Contacta con nosotros</a></li>
                    <li><a href="registrar.html">Crear una cuenta</a></li>
                    
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>
    </footer>

    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
      &#10548;
    </button>
    <script>
          // When the user scrolls down 20px from the top of the document, show the button
          window.onscroll = function () {
            scrollFunction()
          };

          function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
              document.getElementById("movetop").style.display = "block";
            } else {
              document.getElementById("movetop").style.display = "none";
            }
          }

          // When the user clicks on the button, scroll to the top of the document
          function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
          }
        </script>
        <!-- /move top -->
      </section>
      <!-- //footer-28 block -->

      <!-- jQuery, Bootstrap JS -->
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>

      <!-- Template JavaScript -->
      
      <script src="assets/js/owl.carousel.js"></script>

      <!-- script for owlcarousel -->
      <script>
        $(document).ready(function () {
          $('.owl-one').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            responsiveClass: true,
            autoplay: false,
            autoplayTimeout: 5000,
            autoplaySpeed: 1000,
            autoplayHoverPause: false,
            responsive: {
              0: {
                items: 1,
                nav: false
              },
              480: {
                items: 1,
                nav: false
              },
              667: {
                items: 1,
                nav: true
              },
              1000: {
                items: 1,
                nav: true
              }
            }
          })
        })
      </script>
      <!-- //script for owlcarousel -->

      <!-- disable body scroll which navbar is in active -->
      <script>
        $(function () {
          $('.navbar-toggler').click(function () {
            $('body').toggleClass('noscroll');
          })
        });
      </script>
      <!-- disable body scroll which navbar is in active -->

      <script src="assets/js/jquery.magnific-popup.min.js"></script>
      <script>
        $(document).ready(function () {
          $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
          });

          $('.popup-with-move-anim').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-slide-bottom'
          });
        });
      </script>
      <script type="text/javascript">

        $(document).ready(function(){
          $('.collapse').collapse({toggle: false});
          $('#name').change(function(){
            var dato=$(this).val();
            location.href="http://localhost:8080/NaisYob/filtro_empleado.php?id_dato="+dato;
          })

        })

      </script>
    </body>
    </html>