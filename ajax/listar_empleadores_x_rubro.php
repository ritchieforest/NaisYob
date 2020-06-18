<?php 

include 'conexion.php';
	$sql="select r.desc_rubro as rubro,c.nombre_cargo as cargo, s.desc_sexo as sexo,p.nombres as nombre,p.apellidos as apellido,p.dni as dni, p.cuil as cuil from persona p inner join empleado e on p.id_persona=e.rela_persona inner join cargo_empleado ce on e.id_empleado=ce.rela_empleado inner join cargo c on c.id_cargo=ce.rela_cargo inner join rubro r on r.id_rubro=c.rela_rubro inner join sexo s on s.id_sexo=p.rela_sexo where r.id_rubro".$_POST['id_rubro']."";
	$queryListOfertasTrabajos=$pdo->query($sql);
	if ($queryListOfertasTrabajos->rowCount()>0) {
		echo json_encode($queryListOfertasTrabajos->fetchAll());
	}





 ?>