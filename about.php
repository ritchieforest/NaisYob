<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Sobre NaisYob</title>
  <!-- web fonts -->
  <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap" rel="stylesheet">
  <!-- //web fonts -->
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">

  <style>
    /* Styles for dialog window */
    #small-dialog {
      background: white;
      padding: 5px;
      max-width: 750px;
      margin: 40px auto;
      position: relative;
    }

    div#small-dialog iframe {
      width: 100%;
      height: 400px;
      display: block;
    }


    /**
 * Fade-zoom animation for first dialog
 */

    /* start state */
    .my-mfp-zoom-in .zoom-anim-dialog {
      opacity: 0;

      -webkit-transition: all 0.2s ease-in-out;
      -moz-transition: all 0.2s ease-in-out;
      -o-transition: all 0.2s ease-in-out;
      transition: all 0.2s ease-in-out;



      -webkit-transform: scale(0.8);
      -moz-transform: scale(0.8);
      -ms-transform: scale(0.8);
      -o-transform: scale(0.8);
      transform: scale(0.8);
    }

    /* animate in */
    .my-mfp-zoom-in.mfp-ready .zoom-anim-dialog {
      opacity: 1;

      -webkit-transform: scale(1);
      -moz-transform: scale(1);
      -ms-transform: scale(1);
      -o-transform: scale(1);
      transform: scale(1);
    }

    /* animate out */
    .my-mfp-zoom-in.mfp-removing .zoom-anim-dialog {
      -webkit-transform: scale(0.8);
      -moz-transform: scale(0.8);
      -ms-transform: scale(0.8);
      -o-transform: scale(0.8);
      transform: scale(0.8);

      opacity: 0;
    }

    /* Dark overlay, start state */
    .my-mfp-zoom-in.mfp-bg {
      opacity: 0;
      -webkit-transition: opacity 0.3s ease-out;
      -moz-transition: opacity 0.3s ease-out;
      -o-transition: opacity 0.3s ease-out;
      transition: opacity 0.3s ease-out;
    }

    /* animate in */
    .my-mfp-zoom-in.mfp-ready.mfp-bg {
      opacity: 0.8;
    }

    /* animate out */
    .my-mfp-zoom-in.mfp-removing.mfp-bg {
      opacity: 0;
    }



    /**
 * Fade-move animation for second dialog
 */

    /* at start */
    .my-mfp-slide-bottom .zoom-anim-dialog {
      opacity: 0;
      -webkit-transition: all 0.2s ease-out;
      -moz-transition: all 0.2s ease-out;
      -o-transition: all 0.2s ease-out;
      transition: all 0.2s ease-out;

      -webkit-transform: translateY(-20px) perspective(600px) rotateX(10deg);
      -moz-transform: translateY(-20px) perspective(600px) rotateX(10deg);
      -ms-transform: translateY(-20px) perspective(600px) rotateX(10deg);
      -o-transform: translateY(-20px) perspective(600px) rotateX(10deg);
      transform: translateY(-20px) perspective(600px) rotateX(10deg);

    }

    /* animate in */
    .my-mfp-slide-bottom.mfp-ready .zoom-anim-dialog {
      opacity: 1;
      -webkit-transform: translateY(0) perspective(600px) rotateX(0);
      -moz-transform: translateY(0) perspective(600px) rotateX(0);
      -ms-transform: translateY(0) perspective(600px) rotateX(0);
      -o-transform: translateY(0) perspective(600px) rotateX(0);
      transform: translateY(0) perspective(600px) rotateX(0);
    }

    /* animate out */
    .my-mfp-slide-bottom.mfp-removing .zoom-anim-dialog {
      opacity: 0;

      -webkit-transform: translateY(-10px) perspective(600px) rotateX(10deg);
      -moz-transform: translateY(-10px) perspective(600px) rotateX(10deg);
      -ms-transform: translateY(-10px) perspective(600px) rotateX(10deg);
      -o-transform: translateY(-10px) perspective(600px) rotateX(10deg);
      transform: translateY(-10px) perspective(600px) rotateX(10deg);
    }

    /* Dark overlay, start state */
    .my-mfp-slide-bottom.mfp-bg {
      opacity: 0;

      -webkit-transition: opacity 0.3s ease-out;
      -moz-transition: opacity 0.3s ease-out;
      -o-transition: opacity 0.3s ease-out;
      transition: opacity 0.3s ease-out;
    }

    /* animate in */
    .my-mfp-slide-bottom.mfp-ready.mfp-bg {
      opacity: 0.8;
    }

    /* animate out */
    .my-mfp-slide-bottom.mfp-removing.mfp-bg {
      opacity: 0;
    }
  </style>
</head>

<body>
  <div class="w3l-bootstrap-header fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light p-2">
      <div class="container">
        <a class="navbar-brand" href="index.html"><span class="fa fa-diamond"></span>NaisYob</a>
        <!-- if logo is image enable this   
    <a class="navbar-brand" href="#index.html">
        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
    </a> -->
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
            <a href="login.html" class="login mr-4">Iniciar Sesión</a>
            <a href="Empleador_Empleado.html" class="btn btn-primary btn-theme">Registrarme</a>
          </div>
        </div>
      </div>
    </nav>
  </div>
  <section class="w3l-about1">
    <div class="new-block top-bottom">
      <div class="container">
        <div class="middle-section">
          <!-- <h5>Tagline</h5> -->
          <div class="section-width">
            <h2>ESTA PLATAFORMA ES PARA ENCONTRAR EMPLEO Y TALENTO </h2>
          </div>
          <div class="link-list-menu">
            <p>Si buscas talento para tu empresa, en NaisYob te ayudamos a potenciar tu marca de empleador y ponemos a tu alcance las mejores herramientas para que encuentres al profesional que necesitas en el menor tiempo posible.
Si eres un profesional, busques empleo o no, entra en NaisYob para saber qué ofertas nuevas han publicado las empresas o para ver puestos de trabajo similares al tuyo con un mejor horario o salario.
</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="w3l-about3 py-5">
    <div class="container py-lg-3">
      <h3 class="text-center mb-3 timeline-title">Hemos recorrido un largo camino</h3>
      <ul class="timeline">
        <!-- Item 1 -->
        <li>
          <div class="direction-r">
            <div class="flag-wrapper">
              <span class="flag">Nuestro inicio</span>
            </div>
            <div class="desc"> NaisYob nació en 2020 siendo un proyecto de una materia, integrado por 5 estudiantes 
Villalba Ricardo, Villafañe Pamela, Gómez Gonzalo, Villalba Nicolás y Rahn Ana </div>
          </div>
        </li>       


        <!-- Item 2 -->
        <li>
          <div class="direction-l">
            <div class="flag-wrapper">
              <span class="flag">Planes futuros</span>
            </div>
            <div class="desc">Gentes de todo el mundo empiece a utilizar NaisYob, consiguiendo de trabajo o ofreciendo trabajo una manera más flexible 
            </div>
          </div>
        </li>

      </ul>
    </div>
  </section>
  <section class="w3l-about4">
    <div class="contact1-bg py-5">
      <div class="container py-lg-3">
        <div class="contact-main row align-items-center">
          <div class="col-md-6">
            <div class="column">
              <h3 class="header mb-4">Estamos aquí para ti</h3>
              <p class="head-main mb-3"> si tienes alguna duda o quiere consultar, Gracias por su visita </p>
            </div>
            
          </div>
          <div class="col-md-6 map mt-md-0 mt-4">

<iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d229395.16726864906!2d-58.45937248919385!3d-26.056467018622754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x945ca5e488cf4f05%3A0xbcaebe65a1bae72!2sFormosa%2C%20Formosa%20Province%2C%20Argentina!3m2!1d-26.1857768!2d-58.1755669!5e0!3m2!1sen!2sin!4v1592292626826!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- about-block6 -->
  <section class="w3l-about6 py-5">
    <div class="container py-md-3 text-center">
      <div class="heading text-center mx-auto">
        <h3 class="head">Nos encantaria Conversar </h3>
      </div>
      <div class="buttons mt-4">
       
        <a href="#url" class="btn btn-primary btn-demo ml-2">Ponerse en contacto</a>
      </div>
    </div>
  </section>
  <!-- / about-block6 -->
  <!-- footer-28 block -->
  <section class="w3l-market-footer">
    <footer class="footer-28">
      <div class="footer-bg-layer">
        <div class="container py-lg-3">
          <div class="row footer-top-28">
            <div class="col-md-6 footer-list-28 mt-5">
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
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-4 footer-list-28 mt-5">
                  <h6 class="footer-title-28">Empresa</h6>
                  <ul>
                    <li><a href="about.html">Acerca De</a></li>
                    
                  </ul>
                </div>
                <div class="col-md-4 footer-list-28 mt-5">
                  <h6 class="footer-title-28">Support</h6>
                  <ul>
                    <li><a href="contact.html">Contacta con nosotros</a></li>
                    <li><a href="registrar.html">Crear una cuenta</a></li>
                    
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="midd-footer-28 align-center py-lg-4 py-3 mt-5">
          <div class="container">
            <p class="copy-footer-28 text-center"> &copy; 2020 Market. All Rights Reserved. Design by <a
                href="https://w3layouts.com/">W3Layouts</a></p>
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