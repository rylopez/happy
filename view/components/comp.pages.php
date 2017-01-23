<?php

if(isset($_GET["p"])){
	$page = base64_decode($_GET["p"]);
}else{
	$page = "";
}

switch ($page) {
	case '':
		require_once("inicio.php");
		break;
	case 'gestion_usuarios':
		require_once("Gestion_usuarios.php");
	break;	

	
	case 'actualizar_usuario':

		require_once("ActualizarUsuario.php");
	break;

	case 'nuevo_usuario':

		require_once("nuevo_usuario.php");
	break;

	case 'gestion_productos':

		require_once("Gestion_productos.php");
	break;

	case  'nuevo_producto':

	 require_once("nuevo_producto.php");
	break;


	case  'actualizar_producto':

	 require_once("ActualizarProducto.php");
	break;


case  'actualizar_foto_producto':

	 require_once("ActualizarFotoProducto.php");
	break;
	
case 'gestion_publicaciones':

		require_once("Gestion_publicaciones.php");
	break;

	case  'nueva_publicacion':

	 require_once("nueva_publicacion.php");
	break;


	case  'actualizar_publicacion':

	 require_once("ActualizarPublicacion.php");
	break;


case  'actualizar_file_publicacion':

	 require_once("actualizarfilepublicacion.php");
	break;


}
?>
