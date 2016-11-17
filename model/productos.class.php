<?php
class Gestion_Productos{

   function veref_exist($referencia,$id_empresa)
    {
        //instacioamos y nos conectamos a la  base de  datos
        $conexion=style_plus_BD::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        //crear  el  query  que vamos a realizar.
        $consulta= "SELECT * FROM productos WHERE referencia=? AND id_empresa=? ";
        $query=$conexion->prepare($consulta);
        $query->execute(array($referencia,$id_empresa));
        
        $resultado=$query->fetch(PDO::FETCH_BOTH);
        return $resultado;

        style_plus_BD::Disconnect();
    }

	function create($referencia,$nombre,$valor_compra,$valor_venta,$iva,$descuento,$estado,$cant_existente,$id_tipoproducto,$id_proveedor,$id_empresa,$autor){
	 $conexion=style_plus_BD::Connect();
     $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //CAPTURAMOS LA  FECHA DEL SISTEMA
        $fecha_creacion=date("Y-m-d");
        
        
        //crear  el  quiery  que vamos a realizar.
        $consulta= "INSERT INTO productos (referencia,nombre,valor_compra,valor_venta,iva,descuento,estado,cant_existente,id_tipoproducto,id_proveedor,id_empresa,fecha_creacion,autor) values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $query=$conexion->prepare($consulta);
        $query->execute(array($referencia,$nombre,$valor_compra,$valor_venta,$iva,$descuento,$estado,$cant_existente,$id_tipoproducto,$id_proveedor,$id_empresa,$fecha_creacion,$autor));

        style_plus_BD::Disconnect();
    }



	function Readbyempresa($id_empresa)
    {
        //instacioamos y nos conectamos a la  base de  datos
        $conexion=style_plus_BD::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        //crear  el  query  que vamos a realizar.
        $consulta= "SELECT * FROM productos WHERE id_empresa=? ";
        $query=$conexion->prepare($consulta);
        $query->execute(array($id_empresa));
        
        $resultado=$query->fetchALL(PDO::FETCH_BOTH);
        return $resultado;

        style_plus_BD::Disconnect();
    }
    function Readbyid($id_productos)
    {
        //instacioamos y nos conectamos a la  base de  datos
        $conexion=style_plus_BD::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        //crear  el  query  que vamos a realizar.
        $consulta= "SELECT * FROM productos WHERE id_productos=? ";
        $query=$conexion->prepare($consulta);
        $query->execute(array($id_productos));
        
        $resultado=$query->fetch(PDO::FETCH_BOTH);
        return $resultado;

        style_plus_BD::Disconnect();
    }



 	function ReadReference($referencia){
 		$conexion=style_plus_BD::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

 		$consulta= "DELETE FROM contactos WHERE id=?";

 		$query =$conexion-> prepare($consulta);
        $query->$execute(array($id));
    }


    function Update($referencia,$nombre,$valor_compra,$valor_venta,$iva,$descuento,$estado,$cant_existente,$id_tipoproducto,$id_proveedor,$id_empresa,$autor,$id_productos){
    	$conexion=style_plus_BD::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $fecha_creacion=date("Y-m-d");

        $consulta= "UPDATE productos SET referencia=?,nombre=?,valor_compra=?,valor_venta=?, iva=?, descuento=?,estado=?,cant_existente=?,id_tipoproducto=?,id_proveedor=?,id_empresa=?, fecha_creacion=?,autor=? WHERE id_productos=?";
        $query=$conexion->prepare($consulta);
        $query->execute(array($referencia,$nombre,$valor_compra,$valor_venta,$iva,$descuento,$estado,$cant_existente,$id_tipoproducto,$id_proveedor,$id_empresa,$fecha_creacion,$autor,$id_productos));

        style_plus_BD::Disconnect();
    }


    function delete($id){
    	$conexion = style_plus:: connect();
    	$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    	$consulta= "DELETE FROM contacto WHERE id= ?";

    	$query =$conexion-> prepare($consulta);
        $query->$execute(array($id));
       
        style_plus::Disconnect();

    }



    


	}



?>
