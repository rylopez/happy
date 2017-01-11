<?php
# -> class: GEstion_Contactos
#->method(s): create(),ReadAll,readbydocumento(),ReadbyName(),update, delete(),loguear(),
# Author:@yohanny_116

class Gestion_usuarios{
	//metodo crear
	// este  metodo  guardara  en la tabla  contactos   todos  los parametros desde el  formulario.
	function Create($tipo_documento,$numero_documento,$clave1,$nombre,$apellido,$telefono,$direccion,$ciudad,$correo,$celular,$edad,$sexo,$estado,$id_rol,$autor)
	{
		//instacioamos y nos conectamos a la  base de  datos
		$conexion=happy_BD::Connect();
		$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//CAPTURAMOS LA  FECHA DEL SISTEMA
		$fecha_creacion=date("Y-m-d");
		
		
		//crear  el  quiery  que vamos a realizar.
		$consulta= "INSERT INTO usuario (tipo_documento,numero_documento,clave,nombre,apellido,telefono,direccion,ciudad,correo,celular,edad,sexo,estado,id_rol,fecha_creacion,autor) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$query=$conexion->prepare($consulta);
		$query->execute(array($tipo_documento,$numero_documento,$clave1,$nombre,$apellido,$telefono,$direccion,$ciudad,$correo,$celular,$edad,$sexo,$estado,$id_rol,$fecha_creacion,$autor));

		happy_BD::Disconnect();
	}
	//Metodo  consultar  todos
	function ReadAll()
	{
		//instacioamos y nos conectamos a la  base de  datos
		$conexion=happy_BD::Connect();
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

		happy_BD::Disconnect();
	}
	
function ReadbyId($id_usuario)
	{
		//instacioamos y nos conectamos a la  base de  datos
		$conexion=happy_BD::Connect();
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

		happy_BD::Disconnect();
	}
	//METODO UPDATE
	function update($tipo_documento,$numero_documento,$clave,$nombre,$apellido,$telefono,$direccion,$ciudad,$correo,$celular,$edad,$sexo,$estado,$id_rol,$autor,$id_usuario)
	{
		//instacioamos y nos conectamos a la  base de  datos
		$conexion=happy_BD::Connect();
		$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//CAPTURAMOS LA  FECHA DEL SISTEMA
		$fecha_creacion=date("Y-m-d");
		//crear  el  quiery  que vamos a realizar.
		$consulta= "UPDATE usuario SET tipo_documento=?,numero_documento=?, clave=?,nombre=?,apellido=?,telefono=?,direccion=?,ciudad=?,correo=?,celular=?,edad=?,sexo=?,estado=?,id_rol=?,autor=?,fecha_creacion=?  WHERE id_usuario=?  ";
		$query=$conexion->prepare($consulta);
		$query->execute(array($tipo_documento,$numero_documento,$clave,$nombre,$apellido,$telefono,$direccion,$ciudad,$correo,$celular,$edad,$sexo,$estado,$id_rol,$autor,$fecha_creacion,$id_usuario));

	happy_BD::Disconnect();
	}
 	function desactivar($id_usuario)
	{
		//instacioamos y nos conectamos a la  base de  datos
		$conexion=happy_BD::Connect();
		$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//CAPTURAMOS LA  FECHA DEL SISTEMA
		//crear  el  quiery  que vamos a realizar.
		$estado="Inactivo";
		$consulta="UPDATE usuario SET estado=? WHERE id_usuario=?  ";
		$query=$conexion->prepare($consulta);
		$query->execute(array($estado,$id_usuario));

		happy_BD::Disconnect();
	}
	function loguear($correo,$clave)
	{
		//instacioamos y nos conectamos a la  base de  datos
		$conexion=happy_BD::Connect();
		$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		//crear  el  query  que vamos a realizar.
		$consulta= "SELECT * FROM usuario WHERE correo=? And clave=?";
		$query=$conexion->prepare($consulta);
		$query->execute(array($correo,$clave));
		// devolmemos el resultado en un arreglo
		//Fetch:Es  el  resultado que arroja la   consultta   en forma   de vector   o matris  segun sea el caso
		//para  consultas donde arroja mas de un dato    el  fetch  debe  ir  acompañado   con la  palabra ALL
		$resultado=$query->fetch(PDO::FETCH_BOTH);
		

		happy_BD::Disconnect();
		return $resultado;
	}
	function veref_exist($correo)
	{
		//instacioamos y nos conectamos a la  base de  datos
		$conexion=happy_BD::Connect();
		$conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		//crear  el  query  que vamos a realizar.
		$consulta= "SELECT * FROM usuario WHERE correo=?";
		$query=$conexion->prepare($consulta);
		$query->execute(array($correo));
		// devolmemos el resultado en un arreglo
		//Fetch:Es  el  resultado que arroja la   consultta   en forma   de vector   o matris  segun sea el caso
		//para  consultas donde arroja mas de un dato    el  fetch  debe  ir  acompañado   con la  palabra ALL
		$resultado=$query->fetch(PDO::FETCH_BOTH);
		return $resultado;

		happy_BD::Disconnect();
	}
	

}
?>
