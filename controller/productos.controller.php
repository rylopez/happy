<?php

 require_once("../model/db_conn.php");
 require_once("../model/productos.class.php");

 $accion = $_REQUEST["acc"];
   switch ($accion) {
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
   	
   	   case 'c':


   		$referencia        = $_POST["referencia"];
        $referencia        =strtoupper($referencia);   
   	    $nombre            = $_POST["nombre"];
   	    $nombre            =strtoupper($nombre);   	    
   	    $valor_compra      = $_POST["valor_compra"];   	    
   	    $valor_venta       = $_POST["valor_venta"];
   	    $iva               =$_POST["iva"];
   	    $descuento         =$_POST["descuento"];   	    
   	    $cantidad    =$_POST["cantidad"];
   	    $id_tipoproducto  = $_POST["id_tipoproducto"];   	    
   	    $descripcion      =$_POST["descripcion"];
   	    $sexo              =$_POST["sexo"];
   	    $talla             =$_POST["talla"];
   	    $autor             =$_POST["autor"];
   	    $id_productos       =$_POST["id_productos"];

  if (($_FILES["foto1"]["error"] > 0) || ($_FILES["foto2"]["error"] > 0) || ($_FILES["foto2"]["error"] > 0)) {
  	$tipomsn = base64_encode("warning"); 
	$msn= base64_encode("lo sentimos ha ocurrido un Error :(");
	header("location: ../view/index.php?p=".base64_encode('nuevo_producto')."&m=".$msn."&tm=".$tipomsn);
} else {
	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 100kb
	$permitidos = array("image/jpg", "image/jpeg", "image/png");
	$limite_kb = 3000;

	if ((in_array($_FILES['foto1']['type'], $permitidos) && $_FILES['foto1']['size'] <= $limite_kb * 1024) && (in_array($_FILES['foto2']['type'], $permitidos) && $_FILES['foto2']['size'] <= $limite_kb * 1024) && (in_array($_FILES['foto3']['type'], $permitidos) && $_FILES['foto3']['size'] <= $limite_kb * 1024)){
		//esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		  if ((file_exists("../view/recursos/productos/" .$referencia."_foto1")) || (file_exists("../view/recursos/productos/" .$referencia."_foto2")) || (file_exists("../view/recursos/productos/" .$referencia."_foto3")))  {
		  $tipomsn = base64_encode("warning"); 
	     $msn= base64_encode("lo sentimos esta referencia ya se encuentra repetida :(");
	     header("location: ../view/index.php?p=".base64_encode('nuevo_producto')."&m=".$msn."&tm=".$tipomsn); 
            
         } else { 
 
          $resultado1=@move_uploaded_file($_FILES["foto1"]["tmp_name"], 
          "../view/recursos/productos/" .$referencia."_foto1");
          $resultado2=@move_uploaded_file($_FILES["foto2"]["tmp_name"], 
          "../view/recursos/productos/" .$referencia."_foto2");
          $resultado3=@move_uploaded_file($_FILES["foto3"]["tmp_name"], 
          "../view/recursos/productos/" .$referencia."_foto3");
		
		//comprobamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
		   $url_foto1="view/recursos/productos/" .$referencia."_foto1";
		 $url_foto2="view/recursos/productos/" .$referencia."_foto2";
		  $url_foto3="view/recursos/productos/" .$referencia."_foto3";
			
		
		
		}
    }else {
    	$tipomsn = base64_encode("warning"); 
		$msn= base64_encode("archivos no permitidos, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes ");
		header("location: ../view/index.php?p=".base64_encode('nuevo_producto')."&m=".$msn."&tm=".$tipomsn);
		
	}
}
try {
	Gestion_productos::create($referencia,$nombre,$valor_compra,$valor_venta,$descuento,$iva,$descripcion,$url_foto1,$url_foto2,$url_foto3,$id_tipoproducto,$cantidad,$sexo,$talla,$autor);
				$tipomsn = base64_encode("success"); 
				$msn= base64_encode("su registro se actualizo correctamente :D");
				
				
			} catch (Exception $e) {
				$mensaje=":( ha  ocurrido un error, el error  fue: ".$e->getMessage()." en ".$e->getFile(). " en la linea".$e->getLine();
			}
			header("location: ../view/index.php?p=".base64_encode('gestion_productos')."&m=".$msn."&tm=".$tipomsn);




		


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

   	
