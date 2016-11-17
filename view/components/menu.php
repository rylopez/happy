<?php

if($_SESSION["id_rol"]==1){//Menu Administrador

?> 
<li><a href="#"><i class="fa fa-users" aria-hidden="true"></i> Usuarios</a></li>
<li><a href="#"><i class="fa fa-cubes" aria-hidden="true"></i> Productos</a></li>
<li><a href="#"><i class="fa fa-file-o" aria-hidden="true"></i> Publicaciones</a></li>
<li><a href="#"><i class="fa fa-truck" aria-hidden="true"></i> Pedidos</a></li>
<?php }
elseif ($_SESSION["id_rol"]==2) {//menu empleado
	?>
<li><a href="#"><i class="fa fa-cubes" aria-hidden="true"></i> Productos</a></li>
<li><a href="#"><i class="fa fa-truck" aria-hidden="true"></i> Pedidos</a></li
<?php }
elseif($_SESSION["id_rol"]==2){//cliente
	?>
	<li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Mis compras</a></li
	<?php } ?>
