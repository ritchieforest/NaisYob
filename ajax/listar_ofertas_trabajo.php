<?php 

if (isset($_POST)) {
	include 'conexion.php';
	$sql="select r.des_rubro as rubro,c.nombre_cargo as cargo, s.des_sexo as sexo,o.horario as horario,o.des_oferta as oferta,o.fecha_desde as fecha_desde,o.fecha_hasta as fecha_hasta,p.nombre as nombre,p.apellidos as apellidos from oferta_trabajo o 
		inner join cargo c on c.id_cargo=o.rela_cargo
		inner join rubro r on r.id_rubro=c.rela_rubro
		inner join sexo s on s.id_sexo=o.rela_sexo
		inner join empleador e on e.rela_empleador=e.id_empleado
		inner join persona p on p.id_persona=e.rela_persona
		where r.id_rubro=".$_POST['id_rubro']."";
	$queryListOfertasTrabajos=$pdo->query($sql);
	if ($queryListOfertasTrabajos->rowCount()>0) {
		echo json_encode($queryListOfertasTrabajos->fetchAll());
	}
}







 ?>
