<?php 
if (isset($_POST)) {
	include 'conexion.php';
	$queryInsertOfertas=$pdo->query("insert into ofertas_empleo(rela_cargo,rela_sexo,horario,des_oferta,fecha_desde,fecha_hasta,rela_empleador) values(".$_POST['cargo'].",".$_POST['sexo'].",'".$_POST['horario']."','".$_POST['des']."','".$_POST['desde']."','".$_POST['hasta']."',".$_POST['empleador'].")");
	if ($queryInsertOfertas->rowCount()>0) {
		echo "Alta Correcta";
	}else{
		echo "No se pudo ingresar la oferta de trabajo";
	}
}






 ?>