<?php

 require_once("../model/db_conn.php");
 require_once("../model/productos.class.php");

 $accion = $_REQUEST["acc"];
   switch ($accion) {
   case 'c':


        $referencia        = $_POST["referencia"];
        $referencia        =strtoupper($referencia);   
   	    $nombre            = $_POST["nombre"];
   	    $nombre            =strtoupper($nombre);   	    
   	    $valor_compra      = $_POST["valor_compra"];   	    
   	    $valor_venta       = $_POST["valor_venta"];
   	    $iva               =$_POST["iva"];
   	    $descuento         =$_POST["descuento"];
   	    $estado            =$_POST["estado"];
   	    $cant_existente    =$_POST["cant_existente"];
   	    $id_tipoproducto  = $_POST["id_tipoproducto"];
   	    $id_proveedor      = $_POST["id_proveedor"];
   	    $id_empresa        =$_POST["id_empresa"];
   	    $autor             =$_POST["autor"];
   	    
   	    $existente=Gestion_Productos::veref_exist($referencia,$id_empresa);
				
			if($existente[1]==$referencia){
				$tipomensaje = base64_encode("success"); 
				$m=  base64_encode("La referencia de la  ya se encuentra en uso");
                header("location: ../views/dashboard.php?m=".$m."&tm=".$tipomensaje);

			 }else{
			 	
				try {
				Gestion_Productos::Create($referencia,$nombre,$valor_compra,$valor_venta,$iva,$descuento,$estado,$cant_existente,$id_tipoproducto,$id_proveedor,$id_empresa,$autor);
				$tipomensaje = base64_encode("success"); 
				$m= base64_encode("su registro se creo correctamente :D");	
						
			     } catch (Exception $e) {
				 $m=":( ha  ocurrido un error, el error  fue: ".$e->getMessage()." en ".$e->getFile(). " en la linea".$e->getLine();
			         }
			    header("location: ../views/dashboard.php?m=".$m."&tm=".$tipomensaje);
			 }

   	    break;
   	
   	   case 'u':


   		$referencia        = $_POST["referencia"];
        $referencia        =strtoupper($referencia);   
   	    $nombre            = $_POST["nombre"];
   	    $nombre            =strtoupper($nombre);   	    
   	    $valor_compra      = $_POST["valor_compra"];   	    
   	    $valor_venta       = $_POST["valor_venta"];
   	    $iva               =$_POST["iva"];
   	    $descuento         =$_POST["descuento"];
   	    $estado            =$_POST["estado"];
   	    $cant_existente    =$_POST["cant_existente"];
   	    $id_tipoproducto  = $_POST["id_tipoproducto"];
   	    $id_proveedor      = $_POST["id_proveedor"];
   	    $id_empresa        =$_POST["id_empresa"];
   	    $autor             =$_POST["autor"];
   	    $id_productos       =$_POST["id_productos"];

		try {
				Gestion_productos::update($referencia,$nombre,$valor_compra,$valor_venta,$iva,$descuento,$estado,$cant_existente,$id_tipoproducto,$id_proveedor,$id_empresa,$autor,$id_productos);
				$tipomensaje = base64_encode("success"); 
				$m= base64_encode("su registro se actualizo correctamente :D");
				
				
			} catch (Exception $e) {
				$mensaje=":( ha  ocurrido un error, el error  fue: ".$e->getMessage()." en ".$e->getFile(). " en la linea".$e->getLine();
			}
			header("location: ../views/dashboard.php?m=".$m."&tm=".$tipomensaje);


				break;
			case 'd':
			
			try {
				$tipomensaje = base64_encode("success"); 
				Gestion_usuarios::update($referencia,$nombre,$valor_compra,$valor_venta,$id_tipoproductos,$id_proveedor,$autor);
				$mensaje= "se elimino correctamente :D";
				
			} catch (Exception $e) {
				$mensaje=":( ha  ocurrido un error, el error  fue: ".$e->getMessage()." en ".$e->getFile(). " en la linea".$e->getLine();
			}
			header("location: ../Gestion_productos.php?msn=".$mensaje."&tm=".$tipomensaje);


				break;
			
			
			
			
		}
?>

   	
