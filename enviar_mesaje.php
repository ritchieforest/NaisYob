<?php
if(isset($_POST)){
    include 'ajax/conexion.php';
    $query=$pdo->query("insert into chat(descripcion,rela_empleado,rela_empleador,emisor) values('".$_POST['mensaje']."',".$_POST['empleado'].",".$_POST['empleador'].",".$_POST['empleador'].")");
    if($query->rowCount()>0){
        echo 'Mensaje Enviado';

    }
}


?>