<?php

 require_once("../model/db_conn.php");
 require_once("../model/publicaciones.class.php");

  $accion = $_REQUEST["acc"];
   switch ($accion) {
   case 'u':


      $titulo       =strtoupper($_POST["Titulo"]);   
      $texto            = $_POST["texto"];
      $id_producto   =$_POST["id_producto"];
      $autor             =$_POST["autor"];
      $id_publicacion   =$_POST["id_publicacion"];
        
   	    
   	  
		try {
				Gestion_Publicaciones::Update($titulo,$texto,$id_producto,$autor,$id_publicacion);
				$tipomsn = base64_encode("success"); 
				$msn= base64_encode("su registro se Actualizo  correctamente :D");	
						
		 } catch (Exception $e) {
				 $m=":( ha  ocurrido un error, el error  fue: ".$e->getMessage()." en ".$e->getFile(). " en la linea".$e->getLine();
			         }
			    header("location: ../view/index.php?p=".base64_encode('gestion_publicaciones')."&m=".$msn."&tm=".$tipomsn);
			 

   	    break;
   	
   	   case 'c':


   		
      $titulo       =strtoupper($_POST["Titulo"]);   
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
	$permitidos = array("image/jpg", "image/jpeg", "image/png");
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
	     Gestion_Publicaciones::Create($titulo,$texto,$url_archivo,$id_producto,$autor);
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


       $titulo       =strtoupper($_POST["titulo"]);   
      $url_file      =$_POST["url_file"];
      $autor             =$_POST["autor"];
      $id_publicacion   =$_POST["id_publicacion"];
        

  if ($_FILES["file"]["error"] > 0)  {
    $tipomsn = base64_encode("warning"); 
  $msn= base64_encode("lo sentimos ha ocurrido un Error :(");
  header("location: ../view/index.php?p=".base64_encode('actualizar_file_publicacion')."&m=".$msn."&tm=".$tipomsn);
} else {
  //ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
  //y que el tamano del archivo no exceda los 100kb
  $permitidos = array("image/jpg", "image/jpeg", "image/png");
  $limite_kb = 5000;

  if (in_array($_FILES['file']['type'], $permitidos) && $_FILES['file']['size'] <= $limite_kb * 1024){
    //esta es la ruta donde copiaremos la imagen
    //recuerden que deben crear un directorio con este mismo nombre
    //en el mismo lugar donde se encuentra el archivo subir.php
     unlink($url_file);
     
      if (file_exists("../view/recursos/publicaciones/" .$titulo."_file")) {
      $tipomsn = base64_encode("warning"); 
       $msn= base64_encode("lo sentimos estos archivos se encuentran repetidos :(");
       header("location: ../view/index.php?p=".base64_encode('actualizar_file_publicacion')."&m=".$msn."&tm=".$tipomsn); 
            
         } else {
         if ($_FILES['file']['type'] =="image/jpg" ) {
             $formato=".jpg";
          } elseif (($_FILES['file']['type'] =="image/jpeg" )) {
            $formato=".jpeg";
          }else{
            $formato=".png";
          }

         $url_archivo="../view/recursos/publicaciones/" .$titulo."_file".$formato;
     

 
          $resultado=@move_uploaded_file($_FILES["file"]["tmp_name"], 
          $url_archivo);
          
    
    //comprobamos si este archivo existe para no volverlo a copiar.
    //pero si quieren pueden obviar esto si no es necesario.
    //o pueden darle otro nombre para que no sobreescriba el actual.
    //aqui movemos el archivo desde la ruta temporal a nuestra ruta
      //usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
      //almacenara true o false
       
      try {
  Gestion_publicaciones::updatefile($url_archivo,$autor,$id_publicacion);
        $tipomsn = base64_encode("success"); 
        $msn= base64_encode("el archivo de la publicacion, se actualizo exitosamente :D");
        
        
      } catch (Exception $e) {
        $mensaje=":( ha  ocurrido un error, el error  fue: ".$e->getMessage()." en ".$e->getFile(). " en la linea".$e->getLine();
      }
      header("location: ../view/index.php?p=".base64_encode('gestion_publicaciones')."&m=".$msn."&tm=".$tipomsn);
    
    
    }
    }else {
      $tipomsn = base64_encode("warning"); 
    $msn= base64_encode("archivos no permitidos, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes ");
    header("location: ../view/index.php?p=".base64_encode('actualizar_File_producto')."&m=".$msn."&tm=".$tipomsn);
    
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

   	
