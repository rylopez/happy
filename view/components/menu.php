<?php

if($_SESSION["id_rol"]==1){//Menu Administrador

?> 
<li><a href="#"><i class="fa fa-users" aria-hidden="true"></i> Gestion de usuarios</a></li>
<li><a href="#"><i class="fa fa-cubes" aria-hidden="true"></i> Gestion de productos</a></li>
<li><a href="#"><i class="fa fa-file-o" aria-hidden="true"></i> Gestion de publicaciones</a></li>
<li><a href="#"><i class="fa fa-truck" aria-hidden="true"></i> Gestion de pedidos</a></li>
<?php }
elseif ($_SESSION["id_rol"]==2) {//menu empleado
	?>
<li><a href="#"><i class="fa fa-cubes" aria-hidden="true"></i> Gestion de productos</a></li>
<li><a href="#"><i class="fa fa-truck" aria-hidden="true"></i> Gestion de pedidos</a></li
<?php }
elseif($_SESSION["id_rol"]==2){//cliente
	?>
	<li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Mis compras</a></li
	<?php } ?>
