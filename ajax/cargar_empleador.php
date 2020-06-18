<?php 
if (isset($_POST)) {
	include 'conexion.php';
	$query=$pdo->query("select count(*) as cantidad from persona where dni like '%".$_POST['dni']."%' or cuil like '%".$_POST['cuil']."%'");
	$verificacion=$query->fetch();
	if ($verificacion['cantidad']>0) {
		echo "Dni o Cuil existentes";
	}else{
		$perfil = base64_encode(file_get_contents($_FILES['perfil']['tmp_name']));
		$queryInsertPersona=$pdo->query("insert into persona(nombre,apellidos,dni,cuil,fecha_nacimiento,perfil_imagen,rela_sexo) values ('".$_POST['nombre']."','".$_POST['apellido']."','".$_POST['dni']."','".$_POST['cuil']."',".$_POST['nac'].",'".$perfil."',".$_POST['sexo'].")  ");
		if ($queryInsertPersona->rowCount()>0) {
			$lastIdPersona=$pdo->query("select last_insert_id(id_persona) as id from persona");
			$Id=$lastIdPersona->fetch();
			if ($Id['id']!=0) {
				$queryInsertEmpleador=$pdo->query("insert into empleador(rela_persona) values(".$Id['id'].")");
				if ($queryInsertEmpleador->rowCount()>0) {
					$queryVerificacion=$pdo->query("select count(*) as cantidad from usuario where user_name like '%".$_POST['user']."%' and password like '%".$_POST['pass']."%'");
					$cantidad=$queryVerificacion->fetch();
					if ($cantidad['cantidad']>0) {
						$queryInsertUsuario=$pdo->query("insert into usuario(user_name,password,rela_persona,rela_tipo_usuario) values('".$_POST['user']."','".$_POST['pass']."',".$Id['id'].",".$_POST['tipo'].")");
						if ($queryInsertUsuario->rowCount()>0) {
							echo "Datos Agregados Correctamente";	
						}
					}
				}
			}else{
				echo "Hubo un error en la carga de datos";
			}
		}
	}
}






 ?>