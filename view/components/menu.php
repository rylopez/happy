<?php

if($_SESSION["id_rol"]==1){//Menu Administrador

?> 

<a class="orange" href="index.php?p=<?php echo base64_encode('gestion_usuarios')?>"><i id="iconos" class="fa fa-users" aria-hidden="true"></i><h4 class="letramenu"> Usuarios</h4></a>
<a class="blue" href="#"><i id="iconos" class="fa fa-cubes" aria-hidden="true"></i><h4 class="letramenu"> Productos</h4></a>
<a class="verdeagua" href="#"><i id="iconos" class="fa fa-file-o" aria-hidden="true"></i><h4 class="letramenu"> Publicaciones</h4></a>
<a class="red" href="#"><i id="iconos" class="fa fa-truck" aria-hidden="true"></i><h4 class="letramenu"> Pedidos</h4></a>
<?php }
elseif ($_SESSION["id_rol"]==2) {//menu empleado
	?>
<a class="orange" href="#"><i id="iconos" class="fa fa-cubes" aria-hidden="true"></i><h4 class="letramenu"> Productos</h4></a>
<a class="verdeagua" href="#"><i id="iconos" class="fa fa-truck" aria-hidden="true"></i><h4 class="letramenu"> Pedidos</h4></a>
<?php }
elseif($_SESSION["id_rol"]==2){//cliente
	?>
	<a  class="red" href="#"><i id="iconos" class="fa fa-shopping-cart" aria-hidden="true"></i><h4 class="letramenu"> Mis compras</h4></a></li
	<?php } ?>
