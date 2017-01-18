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


   		$titulo       = $_POST["titulo"];
      $titulo       =strtoupper($titulo);   
   	  $texto            = $_POST["texto"];
   	  $id_producto   =$_POST["id_producto"];
   	  $autor             =$_POST["autor"];
   	    

  if ($_FILES["file"]["error"] > 0)  {
  	$tipomsn = base64_encode("warning"); 
	$msn= base64_encode("lo sentimos ha ocurrido un Error :(");
	header("location: ../view/index.php?p=".base64_encode('nueva_publicacion')."&m=".$msn."&tm=".$tipomsn);
} else {
	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 100kb
	$permitidos = array("image/jpg", "image/jpeg", "image/png","video/avi","video/mp4","video/mpeg");
	$limite_kb = 6000;

	if (in_array($_FILES['file']['type'], $permitidos) && $_FILES['file']['size'] <= $limite_kb * 1024){
		//esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		  if (file_exists("../view/recursos/publicaciones/" .$titulo."_file"))  {
		  $tipomsn = base64_encode("warning"); 
	     $msn= base64_encode("lo sentimos esta publicacion ya fue hecha  :(");
	     header("location: ../view/index.php?p=".base64_encode('nueva_publicacion')."&m=".$msn."&tm=".$tipomsn); 
            
         } else {
         if ($_FILES['file']['type'] =="image/jpg" ) {
          	 $formato=".jpg";
          } elseif (($_FILES['file']['type'] =="image/jpeg" )) {
          	$formato=".jpeg";
          }elseif (($_FILES['file']['type'] =="image/png" )){
          	$formato=".png";
          }
          elseif (($_FILES['file']['type'] =="video/mp4" )) {
          	 $formato=".mp4";
          } elseif (($_FILES['file']['type'] =="video/avi" )) {
          	$formato=".avi";
          }else{
          	$formato=".mpeg";
          }

         $url_archivo="../view/recursos/publicaciones/" .$titulo."_file".$formato;
		 

 
          $resultado1=@move_uploaded_file($_FILES["file"]["tmp_name"], 
          $url_archivo);
          
		
		//comprobamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
		   
		  try {
	Gestion_publicaciones::create($titulo,$texto,$url_archivo,$id_producto,$autor);
				$tipomsn = base64_encode("success"); 
				$msn= base64_encode("Se creo la publicacion correctamente");
				
				
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
     case 'uf':


        $referencia        = $_POST["referencia"];
        $referencia        =strtoupper($referencia);   
        $url_foto1         =$_POST["url_foto1"];
        $url_foto2         =$_POST["url_foto2"];
        $url_foto3         =$_POST["url_foto3"];
        $autor             =$_POST["autor"];
        $id_producto       =$_POST["id_producto"];

  if (($_FILES["foto1"]["error"] > 0) || ($_FILES["foto2"]["error"] > 0) || ($_FILES["foto2"]["error"] > 0)) {
    $tipomsn = base64_encode("warning"); 
  $msn= base64_encode("lo sentimos ha ocurrido un Error :(");
  header("location: ../view/index.php?p=".base64_encode('actualizar_foto_producto')."&m=".$msn."&tm=".$tipomsn);
} else {
  //ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
  //y que el tamano del archivo no exceda los 100kb
  $permitidos = array("image/jpg", "image/jpeg", "image/png");
  $limite_kb = 3000;

  if ((in_array($_FILES['foto1']['type'], $permitidos) && $_FILES['foto1']['size'] <= $limite_kb * 1024) && (in_array($_FILES['foto2']['type'], $permitidos) && $_FILES['foto2']['size'] <= $limite_kb * 1024) && (in_array($_FILES['foto3']['type'], $permitidos) && $_FILES['foto3']['size'] <= $limite_kb * 1024)){
    //esta es la ruta donde copiaremos la imagen
    //recuerden que deben crear un directorio con este mismo nombre
    //en el mismo lugar donde se encuentra el archivo subir.php
     unlink($url_foto1);
     unlink($url_foto2);
     unlink($url_foto3);
      if ((file_exists("../view/recursos/productos/" .$referencia."_foto1")) || (file_exists("../view/recursos/productos/" .$referencia."_foto2")) || (file_exists("../view/recursos/productos/" .$referencia."_foto3")))  {
      $tipomsn = base64_encode("warning"); 
       $msn= base64_encode("lo sentimos estos archivos se encuentran repetidos :(");
       header("location: ../view/index.php?p=".base64_encode('actualizar_foto_producto')."&m=".$msn."&tm=".$tipomsn); 
            
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
  Gestion_productos::updatefoto($url_foto1,$url_foto2,$url_foto3,$autor,$id_producto);
        $tipomsn = base64_encode("success"); 
        $msn= base64_encode("Los archivos del producto, se actualizaron exitosamente :D");
        
        
      } catch (Exception $e) {
        $mensaje=":( ha  ocurrido un error, el error  fue: ".$e->getMessage()." en ".$e->getFile(). " en la linea".$e->getLine();
      }
      header("location: ../view/index.php?p=".base64_encode('gestion_productos')."&m=".$msn."&tm=".$tipomsn);
    
    
    }
    }else {
      $tipomsn = base64_encode("warning"); 
    $msn= base64_encode("archivos no permitidos, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes ");
    header("location: ../view/index.php?p=".base64_encode('actualizar_foto_producto')."&m=".$msn."&tm=".$tipomsn);
    
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

   	
