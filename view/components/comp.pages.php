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

	default:

		break;

	case 'gestion_empresa':
		require_once("Gestion_empresa.php");
	break;

	default:

		break;
	case 'actualizar_usuario':

		require_once("ActualizarUsuario.php");
	break;

	case 'nuevo_usuario':

		require_once("nuevo_usuario.php");
	break;

	case 'gestion_producto':

		require_once("Gestion_productos.php");
	break;

	case 'gestion_proveedor':

		require_once("Gestion_proveedores.php");
	break;

	case 'nuevo_producto':

		require_once("nuevo_producto.php");
	break;

	case 'nuevo_proveedor':

		require_once("nuevo_proveedor.php");
	break;
	case 'nueva_empresa':

		require_once("nueva_empresa.php");
	break;

	case 'gestion_servicios':

		require_once("gestion_servicios.php");
	break;

	case 'nuevo_servicio':

		require_once("nuevo_servicio.php");
	break;

	case 'actualizar_servicio':

		require_once("ActualizarServicio.php");
	break;

	case 'gestion_citas':
		require_once("Gestion_citas.php");
	break;

	case 'registro_usuario':
		echo "<div id = 'form'>";
		require_once("registrate.php");
		echo "</div>";
	break;


	case 'nueva_empresa':

		require_once("nueva_empresa.php");
	break;

	case 'actualizar_empresa':

		require_once("ActualizarEmpresa.php");
	break;
	case 'gestion_servicios':
		
		require_once("gestion_servicios.php");
	break;
	case 'nuevo_servicio':
		
		require_once("nuevo_servicio.php");
	break;
	case 'actualizar_servicio':
		
		require_once("ActualizarServicio.php");
	break;
	case 'nuevo_empleado':
		
		require_once("nuevo_empleado.php");
	break;
	case 'actualizar_horario_empleado':
		
		require_once("Actualizar_horario_empleado.php");
	break;
	case 'agenda':
		
		require_once("agenda.php");
	break;
	case 'oferta':
		
		require_once("oferta.php");
	break;
	
	



}
?>
