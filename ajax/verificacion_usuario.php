<?php 

if (isset($_POST)) {
	include 'conexion.php';
	$queryVerificacion=$pdo->query("select count(*) as cantidad from usuario where user_name like '%".$_POST['user']."%' and password like '%".$_POST['pass']."%'");
	$cantidad=$queryVerificacion->fetch();
	if ($cantidad['cantidad']>0) {
		echo 1;
	}else{
		echo 0;
	}
}






 ?>