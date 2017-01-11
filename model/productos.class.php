<?php
class Gestion_Productos{

   function veref_exist($referencia,$id_empresa)
    {
        //instacioamos y nos conectamos a la  base de  datos
        $conexion=happy_BD::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        //crear  el  query  que vamos a realizar.
        $consulta= "SELECT * FROM productos WHERE referencia=? AND id_empresa=? ";
        $query=$conexion->prepare($consulta);
        $query->execute(array($referencia,$id_empresa));
        
        $resultado=$query->fetch(PDO::FETCH_BOTH);
        return $resultado;

        happy_BD::Disconnect();
    }
    function Create($referencia,$nombre,$valor_compra,$valor_venta,$descuento,$iva,$descripcion,$url_foto1,$url_foto2,$url_foto3,$id_tipoproducto,$cantidad,$sexo,$talla,$autor){
        //instacioamos y nos conectamos a la  base de  datos
        $conexion=happy_BD::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //CAPTURAMOS LA  FECHA DEL SISTEMA
        $fecha_creacion=date("Y-m-d");
        
        
        //crear  el  quiery  que vamos a realizar.
        $consulta= "INSERT INTO producto (referencia,nombre,valor_compra,valor_venta,descuento,iva,descripcion,url_foto1,url_foto2,url_foto3,id_tipoproducto,cantidad,sexo,talla,autor,fecha_creacion) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $query=$conexion->prepare($consulta);
        $query->execute(array($referencia,$nombre,$valor_compra,$valor_venta,$descuento,$iva,$descripcion,$url_foto1,$url_foto2,$url_foto3,$id_tipoproducto,$cantidad,$sexo,$talla,$autor,$fecha_creacion));


	
        happy_BD::Disconnect();
    }



	
    function Readbyid($id_producto)
    {
        //instacioamos y nos conectamos a la  base de  datos
        $conexion=happy_BD::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        //crear  el  query  que vamos a realizar.
        $consulta= "SELECT * FROM producto WHERE id_producto=? ";
        $query=$conexion->prepare($consulta);
        $query->execute(array($id_producto));
        
        $resultado=$query->fetch(PDO::FETCH_BOTH);
        return $resultado;

        happy_BD::Disconnect();
    }



 	function ReadReference($referencia){
 		$conexion=happy_BD::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

 		$consulta= "DELETE FROM contactos WHERE id=?";

 		$query =$conexion-> prepare($consulta);
        $query->$execute(array($id));
        happy_BD::Disconnect();
    }


    function Update($referencia,$nombre,$valor_compra,$valor_venta,$iva,$descuento,$estado,$cant_existente,$id_tipoproducto,$id_proveedor,$id_empresa,$autor,$id_productos){
    	$conexion=happy_BD::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $fecha_creacion=date("Y-m-d");

        $consulta= "UPDATE productos SET referencia=?,nombre=?,valor_compra=?,valor_venta=?, iva=?, descuento=?,estado=?,cant_existente=?,id_tipoproducto=?,id_proveedor=?,id_empresa=?, fecha_creacion=?,autor=? WHERE id_productos=?";
        $query=$conexion->prepare($consulta);
        $query->execute(array($referencia,$nombre,$valor_compra,$valor_venta,$iva,$descuento,$estado,$cant_existente,$id_tipoproducto,$id_proveedor,$id_empresa,$fecha_creacion,$autor,$id_productos));

        happy_BD::Disconnect();
    }


    function delete($id){
    	$conexion = happy_BD:: connect();
    	$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    	$consulta= "DELETE FROM contacto WHERE id= ?";

    	$query =$conexion-> prepare($consulta);
        $query->$execute(array($id));
       
        happy_BD::Disconnect();

    }
    function ReadAll()
    {
        //instacioamos y nos conectamos a la  base de  datos
        $conexion=happy_BD::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        //crear  el  query  que vamos a realizar.
        $consulta= "SELECT * FROM producto ORDER BY nombre";
        $query=$conexion->prepare($consulta);
        $query->execute();
        // devolmemos el resultado en un arreglo
        //Fetch:Es  el  resultado que arroja la   consultta   en forma   de vector   o matris  segun sea el caso
        //para  consultas donde arroja mas de un dato    el  fetch  debe  ir  acompañado   con la  palabra ALL
        $resultado=$query->fetchALL(PDO::FETCH_BOTH);
        return $resultado;

        happy_BD::Disconnect();
    }



    


	}



?>
