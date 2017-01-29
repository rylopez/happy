<?php

if($_SESSION["id_rol"]==1){//Menu Administrador

?> 

<li><a  href="index.php?p=<?php echo base64_encode('gestion_usuarios')?>"></i><h2 > Usuarios</h2></a></li>
<li><a  href="index.php?p=<?php echo base64_encode('gestion_productos')?>"><h2> Productos</h2></a></li>

<li><a   href="index.php?p=<?php echo base64_encode('gestion_publicaciones')?>"><h2 >Gestion de  Publicaciones</h2></a></li>
<li><a  href="index.php?p=<?php echo base64_encode('gestion_publicaciones')?>"><h2 > Pedidos</h2></a></li>
<?php }
elseif ($_SESSION["id_rol"]==2) {//menu empleado
	?>
<li><a href="index.php?p=<?php echo base64_encode('gestion_productos')?>"><h2 > Productos</h2></a></li>
<li><a href="#"><h2> Pedidos</h2></a></li>
<?php }
elseif($_SESSION["id_rol"]==3){//cliente
	?>
	<li><a  href="#"><h2> Mis compras</h2></a></li>
	<?php } 
elseif($_SESSION["id_rol"]==4){//expert 
	?>
	<li><a href="index.php?p=<?php echo base64_encode('gestion_publicaciones')?>"><h2 >Gestion de Publicaciones</h2></a></li>
	<?php } ?>