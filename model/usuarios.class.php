<?php
# -> class: GEstion_Contactos
#->method(s): create(),ReadAll,readbydocumento(),ReadbyName(),update, delete(),loguear(),
# Author:@yohanny_116

class Gestion_usuarios{
	//metodo crear
	// este  metodo  guardara  en la tabla  contactos   todos  los parametros desde el  formulario.
	function Create($tipo_documento,$numero_documento,$clave,$nombre,$apellido,$telefono,$direccion,$ciudad,$correo,$celular,$fecha_nacimiento,$sexo,$estado,$id_rol,$autor)
	{
		//instacioamos y nos conectamos a la  base de  datos
		$conexion=style_plus_BD::Connect();
		$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//CAPTURAMOS LA  FECHA DEL SISTEMA
		$fecha_creacion=date("Y-m-d");
		
		
		//crear  el  quiery  que vamos a realizar.
		$consulta= "INSERT INTO usuario (tipo_documento,numero_documento,clave,nombre,apellido,telefono,direccion,ciudad,correo,celular,fecha_nacimiento,sexo,estado,id_rol,fecha_creacion,autor) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$query=$conexion->prepare($consulta);
		$query->execute(array($tipo_documento,$numero_documento,$clave,$nombre,$apellido,$telefono,$direccion,$ciudad,$correo,$celular,$fecha_nacimiento,$sexo,$estado,$id_rol,$fecha_creacion,$autor));

		style_plus_BD::Disconnect();
	}
	//Metodo  consultar  todos
	function ReadAll()
	{
		//instacioamos y nos conectamos a la  base de  datos
		$conexion=style_plus_BD::Connect();
		$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		//crear  el  query  que vamos a realizar.
		$consulta= "SELECT * FROM usuario ORDER BY nombre";
		$query=$conexion->prepare($consulta);
		$query->execute();
		// devolmemos el resultado en un arreglo
		//Fetch:Es  el  resultado que arroja la   consultta   en forma   de vector   o matris  segun sea el caso
		//para  consultas donde arroja mas de un dato    el  fetch  debe  ir  acompañado   con la  palabra ALL
		$resultado=$query->fetchALL(PDO::FETCH_BOTH);
		return $resultado;

		style_plus_BD::Disconnect();
	}
	function Readbyempresa($id_empresa)
	{
		//instacioamos y nos conectamos a la  base de  datos
		$conexion=style_plus_BD::Connect();
		$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		//crear  el  query  que vamos a realizar.
		$consulta="SELECT usuario.id_usuario,usuario.tipo_documento, usuario.numero_documento,usuario.nombre,usuario.apellido,usuario.correo,usuario.id_rol,usuario.estado  from usuario INNER JOIN  empleado on usuario.id_usuario=empleado.id_usuario
                    INNER JOIN empresa on empleado.id_empresa=empresa.id_empresa WHERE empresa.id_empresa=?";
		$query=$conexion->prepare($consulta);
		$query->execute(array($id_empresa));
		// devolmemos el resultado en un arreglo
		//Fetch:Es  el  resultado que arroja la   consultta   en forma   de vector   o matris  segun sea el caso
		//para  consultas donde arroja mas de un dato    el  fetch  debe  ir  acompañado   con la  palabra ALL
		$resultado=$query->fetchALL(PDO::FETCH_BOTH);
		return $resultado;

		style_plus_BD::Disconnect();
	}
function ReadbyId($id_usuario)
	{
		//instacioamos y nos conectamos a la  base de  datos
		$conexion=style_plus_BD::Connect();
		$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		//crear  el  query  que vamos a realizar.
		$consulta= "SELECT * FROM usuario WHERE id_usuario=?";
		$query=$conexion->prepare($consulta);
		$query->execute(array($id_usuario));
		// devolmemos el resultado en un arreglo
		//Fetch:Es  el  resultado que arroja la   consultta   en forma   de vector   o matris  segun sea el caso
		//para  consultas donde arroja mas de un dato    el  fetch  debe  ir  acompañado   con la  palabra ALL
		$resultado=$query->fetch(PDO::FETCH_BOTH);
		return $resultado;

		style_plus_BD::Disconnect();
	}
	//METODO UPDATE
	function update($tipo_documento,$numero_documento,$clave,$nombre,$apellido,$telefono,$direccion,$ciudad,$correo,$celular,$fecha_nacimiento,$sexo,$estado,$id_rol,$autor,$id_usuario)
	{
		//instacioamos y nos conectamos a la  base de  datos
		$conexion=style_plus_BD::Connect();
		$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//CAPTURAMOS LA  FECHA DEL SISTEMA
		$fecha_creacion=date("Y-m-d");
		//crear  el  quiery  que vamos a realizar.
		$consulta= "UPDATE usuario SET tipo_documento=?,numero_documento=?, clave=?,nombre=?,apellido=?,telefono=?,direccion=?,ciudad=?,correo=?,celular=?,fecha_nacimiento=?,sexo=?,estado=?,id_rol=?,autor=?,fecha_creacion=?  WHERE id_usuario=?  ";
		$query=$conexion->prepare($consulta);
		$query->execute(array($tipo_documento,$numero_documento,$clave,$nombre,$apellido,$telefono,$direccion,$ciudad,$correo,$celular,$fecha_nacimiento,$sexo,$estado,$id_rol,$autor,$fecha_creacion,$id_usuario));

		style_plus_BD::Disconnect();
	}
 	function desactivar($id_usuario)
	{
		//instacioamos y nos conectamos a la  base de  datos
		$conexion=style_plus_BD::Connect();
		$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//CAPTURAMOS LA  FECHA DEL SISTEMA
		//crear  el  quiery  que vamos a realizar.
		$estado="Inactivo";
		$consulta="UPDATE usuario SET estado=? WHERE id_usuario=?  ";
		$query=$conexion->prepare($consulta);
		$query->execute(array($estado,$id_usuario));

		style_plus_BD::Disconnect();
	}
	function loguear($correo,$clave)
	{
		//instacioamos y nos conectamos a la  base de  datos
		$conexion=style_plus_BD::Connect();
		$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		//crear  el  query  que vamos a realizar.
		$consulta= "SELECT * FROM usuario WHERE correo=? And clave=?";
		$query=$conexion->prepare($consulta);
		$query->execute(array($correo,$clave));
		// devolmemos el resultado en un arreglo
		//Fetch:Es  el  resultado que arroja la   consultta   en forma   de vector   o matris  segun sea el caso
		//para  consultas donde arroja mas de un dato    el  fetch  debe  ir  acompañado   con la  palabra ALL
		$resultado=$query->fetch(PDO::FETCH_BOTH);
		

		style_plus_BD::Disconnect();
		return $resultado;
	}
	function veref_exist($correo,$numero_documento)
	{
		//instacioamos y nos conectamos a la  base de  datos
		$conexion=style_plus_BD::Connect();
		$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		//crear  el  query  que vamos a realizar.
		$consulta= "SELECT * FROM usuario WHERE correo=? OR numero_documento=?";
		$query=$conexion->prepare($consulta);
		$query->execute(array($correo,$numero_documento));
		// devolmemos el resultado en un arreglo
		//Fetch:Es  el  resultado que arroja la   consultta   en forma   de vector   o matris  segun sea el caso
		//para  consultas donde arroja mas de un dato    el  fetch  debe  ir  acompañado   con la  palabra ALL
		$resultado=$query->fetch(PDO::FETCH_BOTH);
		return $resultado;

		style_plus_BD::Disconnect();
	}
	function cons_empresa($id_usuario)
	{
		//instacioamos y nos conectamos a la  base de  datos
		$conexion=style_plus_BD::Connect();
		$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		//crear  el  query  que vamos a realizar.
		$consulta= "SELECT empleado.id_empresa as id_empresa,empresa.razon_social as nombre_empresa from empleado INNER JOIN empresa on empleado.id_empresa=empresa.id_empresa WHERE id_usuario=?";
		$query=$conexion->prepare($consulta);
		$query->execute(array($id_usuario));
		// devolmemos el resultado en un arreglo
		//Fetch:Es  el  resultado que arroja la   consultta   en forma   de vector   o matris  segun sea el caso
		//para  consultas donde arroja mas de un dato    el  fetch  debe  ir  acompañado   con la  palabra ALL
		$resultado=$query->fetch(PDO::FETCH_BOTH);
		return $resultado;

		style_plus_BD::Disconnect();
	}

}
?>
