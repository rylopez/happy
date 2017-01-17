<?php

if($_SESSION["id_rol"]==1){//Menu Administrador

?> 

<a class="orange" href="index.php?p=<?php echo base64_encode('gestion_usuarios')?>"><i  class="fa fa-users iconos" aria-hidden="true"></i><h4 class="letramenu"> Usuarios</h4></a>
<a class="blue" href="index.php?p=<?php echo base64_encode('gestion_productos')?>"><i  class="fa fa-cubes iconos" aria-hidden="true"></i><h4 class="letramenu"> Productos</h4></a>

<a  class="verdeagua" href="index.php?p=<?php echo base64_encode('gestion_publicaciones')?>"><i class="fa fa-newspaper-o" aria-hidden="true"></i><h4 class="letramenu">Gest Publicaciones</h4></a>
<a class="red" href="index.php?p=<?php echo base64_encode('gestion_publicaciones')?>"><i  class="fa fa-truck iconos" aria-hidden="true"></i><h4 class="letramenu"> Pedidos</h4></a>
<?php }
elseif ($_SESSION["id_rol"]==2) {//menu empleado
	?>
<a class="orange" href="index.php?p=<?php echo base64_encode('gestion_productos')?>"><i  class="fa fa-cubes iconos" aria-hidden="true"></i><h4 class="letramenu"> Productos</h4></a>
<a class="verdeagua" href="#"><i  class="fa fa-truck iconos" aria-hidden="true"></i><h4 class="letramenu"> Pedidos</h4></a>
<?php }
elseif($_SESSION["id_rol"]==3){//cliente
	?>
	<a  class="red" href="#"><i  class="fa fa-shopping-cart iconos" aria-hidden="true"></i><h4 class="letramenu"> Mis compras</h4></a>
	<?php } 
elseif($_SESSION["id_rol"]==4){//expert 
	?>
	<a  class="red" href="index.php?p=<?php echo base64_encode('gestion_publicaciones')?>"><i class="fa fa-newspaper-o" aria-hidden="true"></i><h4 class="letramenu">Gest Publicaciones</h4></a>
	<?php } ?>