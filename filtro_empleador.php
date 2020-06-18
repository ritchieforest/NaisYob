<?php
///// CONEXION A LA BASE DE DATOS /////////
$usuario='root';
$contraseña='';
$host='localhost';
$base='db_naisyob';

try {
      $conexion = new PDO('mysql:host='.$host.';dbname='.$base, $usuario, $contraseña);
  } 
  catch (PDOException $e) 
  {
      print "¡Error!: " . $e->getMessage() . "<br/>";
      die();
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
    <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap" rel="stylesheet">
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
            <a class="nav-link" href="index.html">Casa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">Acerca De</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contacto</a>
          </li>
        </ul>
        <div class="form-inline">
          <a href="login.html" class="login mr-4">Iniciar Sessión</a>
            <a href="Filtro/filtro_busqueda.php" class="btn btn-primary btn-theme">Registrarme</a>
        </div>
      </div>
    </div>
  </nav>
</div>
<header>
      <div  class="alert alert-info" style="position: relative;  top:100px">
      <h1>Bienvenido</h1>
       <h6>Desea Buscar Servicios</h6>
      </div>
    </header>

    <section style="position: relative;  top:150px">
      <form method="post">
        <input type="text" placeholder="Nombre..." name="xnombre"/>
        <select name="xcarrera">
          <option value="">Carrera </option>
          <?
            while ($registroCarreras = $resCarreras->fetch_array(MYSQLI_BOTH))
            {
              echo '<option value="'.$registroCarreras['carrera'].'">'.$registroCarreras['carrera'].'</option>';
            }
          ?>
        </select>

        
        <button name="buscar" type="submit">Buscar</button>
      </form>
      <table class="table">
        <tr>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Sexo</td>
        <td>Carrera</td>
        <td>Rubro</td>
        
      </tr>

        <?php

        $query="SELECT Al.nombre, Al.apellido,
                 Sex.desc_sexo,
                 Car.nombre_carrera, 
                 rub.desc_rubro
            FROM persona Al
            INNER JOIN sexo sex ON Al.rela_sexo = Carr.id_carrera
            INNER JOIN carrera Car ON Al.rela_carrera = Carr.id_carrera
            INNER JOIN rubro rub ON Al.rela_grupo = Gru.id_grupo";
        $consulta=$conexion->query($query);
        while ($fila=$consulta->fetch(PDO::FETCH_ASSOC))
          {
            echo'
            <tr>
            <td>'.$fila['nombre'].'</td>
            <td>'.$fila['apellido'].'</td>
            <td>'.$fila['sexo'].'</td>
            <td>'.$fila['carrera'].'</td>
            <td>'.$fila['rubro'].'</td>
            </tr>
            ';
          }


        ?>
      </table>

      <?
        echo $mensaje;
      ?>
    </section>


    
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
      <script src="assets/js/jquery-3.3.1.min.js"></script>
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

</body>
</html>