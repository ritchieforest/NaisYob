<?php
session_start();
include 'ajax/conexion.php';
$sql="SELECT p2.nombres as nombre,p2.apellidos as apellido,c.descripcion as mensaje,c.emisor as emisor from chat c INNER JOIN empleador e on c.rela_empleador=e.id_empleador inner join empleado emp on c.rela_empleado=emp.id_empleado inner join persona p1 on p1.id_persona=e.rela_persona INNER join persona p2 on p2.id_persona=emp.rela_persona WHERE e.rela_persona=";
$queryMensajes=$pdo->query($sql.$_SESSION['persona']);
echo json_encode($queryMensajes->fetchAll());


?>