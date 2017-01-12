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
   	    $cantidad          =$_POST["cantidad"];
   	    $id_tipoproducto   =$_POST["id_tipoproducto"];
   	    $sexo              =$_POST["sexo"];
   	    $talla             =$_POST["talla"];
   	    $talla             =strtoupper($talla);
   	    $descripcion       =strtoupper($_POST["descripcion"]);   	    
   	    $autor             =$_POST["autor"];
   	    $id_producto       =$_POST["id_producto"];
   	    
   	  
		try {
				Gestion_Productos::Update($referencia,$nombre,$valor_compra,$valor_venta,$iva,$descuento,$cantidad,$id_tipoproducto,$talla,$sexo,$descripcion,$autor,$id_producto);
				$tipomsn = base64_encode("success"); 
				$msn= base64_encode("su registro se Actualizo  correctamente :D");	
						
		 } catch (Exception $e) {
				 $m=":( ha  ocurrido un error, el error  fue: ".$e->getMessage()." en ".$e->getFile(). " en la linea".$e->getLine();
			         }
			    header("location: ../view/index.php?p=".base64_encode('gestion_productos')."&m=".$msn."&tm=".$tipomsn);
			 

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
   	    $talla             =strtoupper($talla);
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
         if ($_FILES['foto1']['type'] =="image/jpg" ) {
          	 $formato1=".jpg";
          } elseif (($_FILES['foto1']['type'] =="image/jpeg" )) {
          	$formato1=".jpeg";
          }else{
          	$formato1=".png";
          }
          if ($_FILES['foto2']['type'] =="image/jpg" ) {
          	 $formato2=".jpg";
          } elseif (($_FILES['foto2']['type'] =="image/jpeg" )) {
          	$formato2=".jpeg";
          }else{
          	$formato2=".png";
          }
          if ($_FILES['foto3']['type'] =="image/jpg" ) {
          	 $formato3=".jpg";
          } elseif (($_FILES['foto3']['type'] =="image/jpeg" )) {
          	$formato3=".jpeg";
          }else{
          	$formato3=".png";
          }

         $url_foto1="../view/recursos/productos/" .$referencia."_foto1".$formato1;
		 $url_foto2="../view/recursos/productos/" .$referencia."_foto2".$formato2;
		 $url_foto3="../view/recursos/productos/" .$referencia."_foto3".$formato3;

 
          $resultado1=@move_uploaded_file($_FILES["foto1"]["tmp_name"], 
          $url_foto1);
          $resultado2=@move_uploaded_file($_FILES["foto2"]["tmp_name"], 
          $url_foto2);
          $resultado3=@move_uploaded_file($_FILES["foto3"]["tmp_name"], 
          $url_foto3);
		
		//comprobamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
		   
		  try {
	Gestion_productos::create($referencia,$nombre,$valor_compra,$valor_venta,$descuento,$iva,$descripcion,$url_foto1,$url_foto2,$url_foto3,$id_tipoproducto,$cantidad,$sexo,$talla,$autor);
				$tipomsn = base64_encode("success"); 
				$msn= base64_encode("El producto se creo exitosamente :D");
				
				
			} catch (Exception $e) {
				$mensaje=":( ha  ocurrido un error, el error  fue: ".$e->getMessage()." en ".$e->getFile(). " en la linea".$e->getLine();
			}
			header("location: ../view/index.php?p=".base64_encode('gestion_productos')."&m=".$msn."&tm=".$tipomsn);
		
		
		}
    }else {
    	$tipomsn = base64_encode("warning"); 
		$msn= base64_encode("archivos no permitidos, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes ");
		header("location: ../view/index.php?p=".base64_encode('nuevo_producto')."&m=".$msn."&tm=".$tipomsn);
		
	}
}






		


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

   	
