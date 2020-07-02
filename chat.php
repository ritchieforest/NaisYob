<?php
 session_start();
 if (!isset($_SESSION['active']) and $_SESSION['active']!=true) {
  print "<meta http-equiv=Refresh content=\"2 ; url= index.php\">";
}
include 'ajax/conexion.php';

$sql2="SELECT distinct p2.nombres as nombre,p2.apellidos as apellido from chat c INNER JOIN empleador e on c.rela_empleador=e.id_empleador inner join empleado emp on c.rela_empleado=emp.id_empleado inner join persona p1 on p1.id_persona=e.rela_persona INNER join persona p2 on p2.id_persona=emp.rela_persona WHERE e.rela_persona=";
$query=$pdo->query($sql2.$_SESSION['persona']);

$queryEmpleador=$pdo->query("select e.id_empleador as id_emp from persona p inner join empleador e on p.id_persona=e.rela_persona where e.rela_persona=".$_SESSION['persona']);
$id_empleador=0;
if($queryEmpleador->rowCount()>0){
  $fetch=$queryEmpleador->fetch();
  $id_empleador=$fetch['id_emp'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/chat.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="left">
                <div class="top">
                    <input type="text" placeholder="Search" />
                    <a href="javascript:;" class="search"></a>
                </div>
                <ul class="people">
                <?php if($query->rowCount()>0){ while($data=$query->fetch()){?>
                    <li class="person" data-chat="person1">
                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/382994/thomas.jpg" alt="" />
                        <span class="name"><?php $nombre_completo=$data['nombre']." ".$data['apellido']; echo $data['nombre']." ".$data['apellido'];?></span>
                        <span class="time">2:09 PM</span>
                        <span class="preview">I was wondering...</span>
                </li><?php }}?>
                </ul>
            </div>
            <div class="right">
                <div class="top"><span>To: <span class="name"><?php echo $nombre_completo;?></span></span></div>
                <div class="chat" data-chat="person1">
                    <div class="conversation-start">
                        <span>Today, 5:38 PM</span>
                    </div>
                    <div id="s">
                    </div>
                    
                </div>
                <div class="write">
                    <a href="javascript:;" class="write-link attach"></a>
                    <input type="text" />
                    <a href="javascript:;" class="write-link smiley"></a>
                    <a href="javascript:;" class="write-link send"></a>
                </div>
            </div>
        </div>
    </div>
    <script src="jquery-3.1.1.min.js"></script>
    <script src="chat.js" ></script>
    <script type="">
    $(document).ready(function(){
        $.ajax({
            url:'listar_mensajes.php',
        }).done(function(res){
            var id="<?php echo $id_empleador;?>"
            var ineer=" ";
            $.each($.parseJSON(res),function(i,item){
                if(item.emisor==id){
                ineer= ineer+"<div class='bubble me'>"+item.mensaje+"</div>"
                }else{
                    ineer=inner+"<div class='bubble you'>"+item.mensaje+"</div>"
                    
                }
            })
            
            
            $('#s').html(ineer);

        })
    })
    </script>
</body>
</html>