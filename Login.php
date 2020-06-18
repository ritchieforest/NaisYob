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
    
    <title>Registro</title>
    <!-- web fonts -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900&display=swap" rel="stylesheet">
    <!-- //web fonts -->
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    </head>
  <body>
<script>
(function(){
  if(typeof _bsa !== 'undefined' && _bsa) {
      // format, zoneKey, segment:value, options
      _bsa.init('flexbar', 'CKYI627U', 'placement:w3layoutscom');
    }
})();
</script>
<script>
(function(){
if(typeof _bsa !== 'undefined' && _bsa) {
  // format, zoneKey, segment:value, options
  _bsa.init('fancybar', 'CKYDL2JN', 'placement:demo');
}
})();
</script>
<script>
(function(){
  if(typeof _bsa !== 'undefined' && _bsa) {
      // format, zoneKey, segment:value, options
      _bsa.init('stickybox', 'CKYI653J', 'placement:w3layoutscom');
    }
})();
</script>
<!--<script>(function(v,d,o,ai){ai=d.createElement("script");ai.defer=true;ai.async=true;ai.src=v.location.protocol+o;d.head.appendChild(ai);})(window, document, "//a.vdo.ai/core/w3layouts_V2/vdo.ai.js?vdo=34");</script>-->
<div id="codefund"><!-- fallback content --></div>
<script src="https://codefund.io/properties/441/funder.js" async="async"></script>
  
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src='https://www.googletagmanager.com/gtag/js?id=UA-149859901-1'></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-149859901-1');
</script>

<script>
     window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
     ga('create', 'UA-149859901-1', 'demo.w3layouts.com');
     ga('require', 'eventTracker');
     ga('require', 'outboundLinkTracker');
     ga('require', 'urlChangeTracker');
     ga('send', 'pageview');
   </script>
<script async src='/js/autotrack.js'></script>

<meta name="robots" content="noindex">
<body><link rel="stylesheet" href="/images/demobar_w3_4thDec2019.css">
  <!-- Demo bar start -->


<div class="w3l-bootstrap-header fixed-top">
  <nav class="navbar navbar-expand-lg navbar-light p-2">
    <div class="container">
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
          <a href="login.html" class="login mr-4">Iniciar Sesión</a>
            <a href="Empleador_Empleado.html" class="btn btn-primary btn-theme">Registrarme</a>
        </div>
      </div>
    </div>
  </nav>
</div>
<!-- index-block1 -->
  


   

<section class="w3l-login">
  <div class="login-box">
    <div class="container">
      
      <div class="login-form py-5 px-4 mx-auto">
        <h3 class="account-title mb-4" style="position: absolute; left: 350px; top:90px;" >Por favor Entrar o <a href="registrar.html">Registrarse</a></h3>
        <form action="#" method="POST" id="inicio"  style="position: absolute; left: 400px; top:150px;">
          <div class="form-group">
            <label class="field-info" for="inputUsernameEmail">Nombre de Usuario o Correo Electrónico</label>
            <input type="text" class="form-control" name="user" id="email" required="">
          </div>
          <div class="form-group">
            <a class="pull-right forgot" href="#"> ¿Se te Olvidoó tu Contraseña? </a> 
            <label class="field-info" for="inputPassword"> Constraseña </label>
            <input type="password" class="form-control" name="pass" id="pass" required="">
          </div>
          <button type="submit" name="iniciar" class="btn btn-primary btn-theme">
            Iniciar Sessión
          </button>
          <?php 

            if (isset($_POST['iniciar'])) {
              include 'ajax/conexion.php';
              $queryVerificacion=$pdo->query("select count(*) as cantidad from usuario where user_name like '%".$_POST['user']."%' and password like '%".$_POST['pass']."%'");
              $cantidad=$queryVerificacion->fetch();
              if ($cantidad['cantidad']>0) {
                echo "<p>Usuario Correcto</p>";
              }else{
                echo "<p>Usuario Incorrecto</>";
              }
            }






 ?>
        </form>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="aseets/js/bootstrap.min.js"></script>
</body>

</html>

