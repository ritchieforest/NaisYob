 <?php 
 session_start();
 if (!isset($_SESSION['active']) and $_SESSION['active']!=true) {
  print "<meta http-equiv=Refresh content=\"2 ; url= index.php\">";
}
?>
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Registro</title>
  <!-- web fonts -->
  <!-- //web fonts -->
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">
</head>
<body>
  <script src='//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script><script src="//m.servedby-buysellads.com/monetization.js" type="text/javascript"></script>
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
<script async src='assets/js/autotrack.js'></script>
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
<!-- index-block1 -->





<section class="w3l-login">
  <div class="login-box">
    <div class="container">
      <div class="login-form py-5 px-4 mx-auto">
        <h3 class="account-title mb-4" style="position: absolute;left: 350px; top:90px;">Crear Ofertas de Trabajo</h3>
        <form action="#" method="POST" style="position: absolute; left: 400px; top:150px;">
          <div class="form-group">
            <label class="field-info" for="inputNombre">Descripcion de Oferta de Trabajo</label>
            <input type="text" class="form-control" name="des" id="inputNombre" required="">
          </div>
          <div class="form-group">
            <label for="start">Fecha hasta que quede activada la escucha de ofertas</label>

            <input type="date" id="start" name="hasta" value="2018-07-22">

          </div>
          <div class="form-group">
            <label for="Provincia">Rubros</label>
            <select name="rubro" id="Provincia">
              <option value=""></option>
              <option value="1">Informatica</option>
              <option value="2">Otros</option>
            </select>
          </div>
          <div class="form-group">
            <label for="Provincia">Sexo</label>
            <select name="sexo" id="Provincia">
              <option value=""></option>
              <option value="1">Masculino</option>
              <option value="2">Femenino</option>
            </select>
          </div>
          <div class="form-group">
            <div class="form-group">

              <label class="field-info" for="inputTelefono">Horario</label>
              <input type="text" class="form-control" name="horario" id="inputTelefono" required="">
            </div>
            <button type="submit" name="iniciar" class="btn btn-primary btn-theme mt-4">Crear Ofertas de Trabajo</button>
          </form>
          <?php 
          if (isset($_POST['iniciar'])) {
            include 'ajax/conexion.php';
            $consultar=$pdo->query("select e.id_empleado as id from persona p inner join empleador e on p.id_persona=e.rela_persona where rela_persona=".$_SESSION['persona']);
            if ($consltar->rowCount()>0) {
              $datos=$consultar->fetch();
              $queryInsertOfertas=$pdo->query("insert into oferta_empleo(rela_rubro,rela_sexo,horario,desc_oferta,fecha_desde,fecha_hasta,rela_empleador) values(".$_POST['rubro'].",".$_POST['sexo'].",'".$_POST['horario']."','".$_POST['des']."',NOW(),'".$_POST['hasta']."',".$data['id'].")");
              if ($queryInsertOfertas->rowCount()>0) {
                echo "Alta Correcta";
              }else{
                echo "No se pudo ingresar la oferta de trabajo";
              }
            }            
            
          }

          ?>
        </div>
      </div>
    </div>
  </section>
</body>

</html>