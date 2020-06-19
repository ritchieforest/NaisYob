 <?php 

 session_start();
 if (!isset($_SESSION['active']) and $_SESSION['active']!=true) {
  header('location: index.php');
}
include 'ajax/conexion.php';

$sqlExpLab=$pdo->query("select  e.desc_experiencia as exp,c.nombre_cargo as cargo from experiencia_laboral e inner join cargo c on c.id_cargo=e.rela_cargo inner join empleado emp on emp.id_empleado=rela_empleado inner join persona p on p.id_persona=emp.rela_persona where emp.rela_persona=".$_SESSION['persona']);
$sqlDatosAcad=$pdo->query("select c.nombre_carrera as carrera, d.nombre_institucion as edu from datos_academicos dat inner join carrera c on c.id_carrera=dat.rela_carrera inner join empleado emp on emp.id_empleado=dat.rela_empleado inner join persona p on p.id_persona=emp.rela_persona inner join intitucion_educativa d on d.id_institucion_educativa=c.rela_institucion where emp.rela_persona=".$_SESSION['persona']);

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
          <?php if ($_SESSION['tipo']==1 or $_SESSION['tipo']==3) {
           ?>
           <li class="nav-item">
            <a class="nav-link" href="ofertas_trabajo.php">Filtros de Ofertas de Trabajo</a>
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
    <h6>Se encuentra en su Perfil</h6>
  </div>
</header>
<br>
<br>
<br>
<br>
<br>
<div class="row">
 <div class="col-md-4">
   <div class="card" style="width: 25rem;">
    <div class="card-header">
      Estudios Realizados
    </div>
    <ul class="list-group list-group-flush">
      <?php if ($sqlDatosAcad->rowCount()>0) { while($data=$sqlDatosAcad->fetch()){?>
        <li class="list-group-item"><?php echo $data['edu']."-".$data['carrera']; ?></li>
      <?php }}else{ ?>
        <li class="list-group-item">Agregar</li>
      <?php }?>
      <div id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Agregar Estudios Realizados
              </button>
            </h5>
          </div>

          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              <form method="POST">
                <div class="row">
                  <div class="col-md-4">
                    <label>Institucion Educativa</label>
                  </div>
                  <div class="col-md-6">
                   <select name="universidad">
                    <option>Seleccione Una Opcion</option>
                    <option value="1">Universidad Nacional Formosa</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4"><label>Ingrese la Carrera</label></div>
                <input type="text" name="carrera">
                <div class="col-md-6"></div>
              </div><br><br>
              <div class="row">
                <button class="btn btn-danger mx-auto" name="educacion">Agregar Estudios</button>
                
              </div><br>
              <?php
              if (isset($_POST['educacion'])) {
               $consultar=$pdo->query("select id_empleado as id from persona p inner join empleado e on p.id_persona=e.rela_persona where rela_persona=".$_SESSION['persona']);
               if ($consultar->rowCount()>0) {
                $empleadoId=$consultar->fetch();
                $query=$pdo->query("insert into carrera(nombre_carrera,rela_institucion) values('".$_POST['carrera']."',".$_POST['universidad'].")");
                if ($query->rowCount()>0) {
                  $lastIdCarrera=$pdo->lastInsertId();
                  $insertDatosAcademico=$pdo->query("insert into datos_academicos(rela_carrera,rela_empleado) values(".$lastIdCarrera.",".$empleadoId['id'].")");
                  if ($insertDatosAcademico->rowCount()>0) {
                   print "<meta http-equiv=Refresh content=\"2 ; url= mi_perfil.php\">";

                 }
               }
             }
           }

           ?>
         </form>
       </div>
     </div>
   </div>
 </div>
</ul>
</div>
</div>
<div class="col-md-4">
  <div class="card" style="width: 25rem;">
    <div class="card-header">
      Experiencia Laboral
    </div>
    <ul class="list-group list-group-flush">
      <?php if ($sqlExpLab->rowCount()>0) { while($data=$sqlExpLab->fetch()){?>
        <li class="list-group-item"><?php echo $data['exp']."-".$data['cargo']; ?></li>
      <?php }}else{ ?>
        <li class="list-group-item">Agrege su Experiencia Laboral</li>  
      <?php } ?>
      <div id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#el" aria-expanded="true" aria-controls="collapseOne">
                Agregar Experiencia Laboral
              </button>
            </h5>
          </div>

          <div id="el" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              <form method="POST">
                <div class="row">
                  <div class="col-md-4">
                    <label>Cargo Laboral</label>

                  </div>
                  <div class="col-md-6">
                   <select name="cargo">
                    <option>Seleccione Una Opcion</option>
                    <option value="1">Soporte Tecnico-Informatica</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4"><label>Lugar Laboral</label></div>
                <input type="text" name="trabajo" placeholder="Escriba donde trabajo">
                <div class="col-md-6"></div>
              </div><br><br>
              <div class="row">
                <button class="btn btn-danger mx-auto" name="enviar">Agregar Experiencia Laboral</button>

              </div><br>
              <?php  
              if (isset($_POST['enviar'])) {
                $consultar=$pdo->query("select id_empleado as id from persona p inner join empleado e on p.id_persona=e.rela_persona where rela_persona=".$_SESSION['persona']);
                if ($consultar->rowCount()>0) {
                  $empleadoId=$consultar->fetch();
                  $query=$pdo->query("insert into experiencia_laboral(desc_experiencia,rela_empleado,rela_cargo) values('".$_POST['trabajo']."',".$empleadoId['id'].",".$_POST['cargo'].")");

                  if ($query->rowCount()>0) {
                    print "<meta http-equiv=Refresh content=\"2 ; url= mi_perfil.php\">";

                  }
                }

              }
              ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </ul>
</div>

</div>
</div>
<div class="col-md-10 mx-auto">
 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="imagenes/imagen1.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>Aqui Trabajando para el Empleador Tal</h5>
        <p>...</p>
      </div>
    </div>
    <div class="carousel-item active">
      <img class="d-block w-100" src="imagenes/imagen1.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>Aqui Trabajando para el Empleador Tal</h5>
        <p>...</p>
      </div>
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100" src="imagenes/imagen1.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>Aqui Trabajando para el Empleador Tal</h5>
        <p>...</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="imagenes/imagen1.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>Aqui Trabajando para el Empleador Tal</h5>
        <p>...</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="imagenes/imagen1.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>Aqui Trabajando para el Empleador Tal</h5>
        <p>...</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> 
<div class="col-md-7 mx-auto">
  <div id="accordion">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Añadir Trabajos Realizados
          </button>
        </h5>
      </div>

      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
            <form action="mi_perfil.php"  method="POST" enctype="multipart/form-data"/>
            Añadir imagen: <input name="archivo" id="archivo" type="file"/>
            <input type="submit" class="btn btn-danger" name="subir" value="Subir imagen"/>
            <?php 
                if (isset($_POST['subir'])) {
                  $consultar=$pdo->query("select id_empleado as id from persona p inner join empleado e on p.id_persona=e.rela_persona where rela_persona=".$_SESSION['persona']);
                if ($consultar->rowCount()>0) {
                  $empleadoId=$consultar->fetch();
                  $imagen=addslashes(file_get_contents($_FILES['archivo']['tmp_name']));
                  $query=$pdo->query("insert into muro_trabajo(rela_empleado,imagen_trabajo) values(".$empleadoId['id'].",'".$imagen."')");

                  if ($query->rowCount()>0) {
                    print "<meta http-equiv=Refresh content=\"2 ; url= mi_perfil.php\">";

                  }
                }
                }

             ?>
          </form>
      </div>
    </div>
  </div>
</div>

</div>
</div>   

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