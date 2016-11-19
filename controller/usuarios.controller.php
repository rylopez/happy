<?php
	session_start();
		
		//1. llamar  la conexion de la base de datos
		require_once("../model/db_conn.php");
		//2. llamar las  clases necesarias o que se requieran
		require_once("../model/usuarios.class.php");
		//3. instanciamos las variables globales y una llamada  $accion
		// la variable accion nos va  a indicar  que parte cel crud vamos a crear.
		$accion=$_REQUEST["acc"];
		switch ($accion) {
			case 'c':
				# crear
				#iniciamos las variables   que se envian desde el  formulario  y las  que necesito  para  almacenar la tabla.
			$tipo_documento     	=$_POST["tipo_documento"];         
			$numero_documento      	=$_POST["numero_documento"];
			$clave 			=$_POST["clave"];
			$nombre      	=$_POST["nombre"];
			$nombre         =strtoupper($nombre);
			$apellido    	=$_POST["apellido"];
			$apellido       =strtoupper($apellido);
			$telefono    	=$_POST["telefono"];
			$direccion   	=$_POST["direccion"];
			$ciudad			=$_POST["ciudad"];
			$ciudad         =strtoupper($ciudad);
			$correo      	=$_POST["correo"];
			$celular     	=$_POST["celular"];
			$fecha_nacimiento=$_POST["fecha_nacimiento"];
			$sexo        	=$_POST["sexo"];
			$sexo           =strtoupper($sexo); 
			$estado         =$_POST["estado"];			
			$id_rol			=$_POST["id_rol"];
			$autor			=$_POST["autor"];
			
			
		    $existente=Gestion_Usuarios::veref_exist($correo,$numero_documento);
				
			if($existente[2]==$numero_documento){
				$tipom=base64_encode("warning");
				$msn=base64_encode("el numero  de documento".$numero_documento." ya se encuentran en uso,el usuario no fue creado");
                header("location: ../views/dashboard.php?m=".$msn."&tm=".$tipom);

			 }elseif($existente[9]==$correo){
				$tipom=base64_encode("warning");
				$msn=base64_encode("el correo electronico ".$correo." ya se encuentran en uso, el usuario no fue creado");
                header("location: ../views/dashboard.php?m=".$msn."&tm=".$tipom);

			 }
			 else{
			 	
				try {
				Gestion_usuarios::Create($tipo_documento,$numero_documento,$clave,$nombre,$apellido,$telefono,$direccion,$ciudad,$correo,$celular,$fecha_nacimiento,$sexo,$estado,$id_rol,$autor);
				$msn= base64_encode("Su registro se creo correctamente :D");	
				$tipom=base64_encode("success");
				header("location: ../views/dashboard.php?m=".$msn."&tm=".$tipom);
						
			     } catch (Exception $e) {
				 $msn=base64_encode(":( ha  ocurrido un error, el error  fue: ".$e->getMessage()." en ".$e->getFile(). " en la linea".$e->getLine());
				 $tipom=base64_encode("warning");
				  header("location: ../views/dashboard.php?m=".$msn."&tm=".$tipom);
			         }
			   
			 }


				break;
				case 'u':
				# Actualizar
				#iniciamos las variables   que se envian desde el  formulario  y las  que necesito  para  almacenar la tabla.
			$tipo_documento   =$_POST["tipo_documento"];         
			$numero_documento    =$_POST["numero_documento"];
			$clave 			=$_POST["clave"];
			$nombre      	=$_POST["nombre"];
			$nombre 		=strtoupper($nombre);
			$apellido    	=$_POST["apellido"];
			$apellido 		=strtoupper($apellido);
			$telefono    	=$_POST["telefono"];
			$direccion   	=$_POST["direccion"];
			$ciudad			=$_POST["ciudad"];
			$ciudad         =strtoupper($ciudad);
			$correo      	=$_POST["correo"];
			$celular     	=$_POST["celular"];
			$fecha_nacimiento=$_POST["fecha_nacimiento"];
			$sexo        	=$_POST["sexo"];
			$sexo           =strtoupper($sexo);
			$estado         =$_POST["estado"];			
			$id_rol			=$_POST["id_rol"];
			$autor			=$_POST["autor"];
			$id_usuario =$_POST["id_usuario"];

			try {
				Gestion_usuarios::update($tipo_documento,$numero_documento,$clave,$nombre,$apellido,$telefono,$direccion,$ciudad,$correo,$celular,$fecha_nacimiento,$sexo,$estado,$id_rol,$autor,$id_usuario);
				$msn= base64_encode("se ha actualizado correctamente :D");
				$tipom=base64_encode("success");
				
			} catch (Exception $e) {
				$msn=":( ha  ocurrido un error, el error  fue: ".$e->getMessage()." en ".$e->getFile(). " en la linea".$e->getLine();
				$tipom=base64_encode("warning");
			}
			header("location: ../views/dashboard.php?m=".$msn."&tm=".$tipom);


				break;
			case 'd':
				# delete
				#iniciamos las variables   que se envian desde el  formulario  y las  que necesito  para  almacenar la tabla.
			       
			$id_usuario=base64_decode($_REQUEST["ui"]);
			
			try {
				Gestion_usuarios::desactivar($id_usuario);
				$msn=base64_encode("se Desactivo correctamente :D");
				$tipom=base64_encode("success");
				
			} catch (Exception $e) {
				$msn=base64_encode(":( ha  ocurrido un error, el error  fue: ".$e->getMessage()." en ".$e->getFile(). " en la linea".$e->getLine());
				$tipom=base64_encode("warning");
			}
			header("location: ../views/dashboard.php?m=".$msn."&tm=".$tipom);


				break;

		 case 'l':
				# loguear usuario
				#iniciamos las variables   que se envian desde el  formulario  
			       
			
			$correo      	=$_POST["correo"];
			$clave      	=$_POST["clave"]; 
			
			try {
				$usuario=Gestion_usuarios::loguear($correo,$clave);
				
                $usuario_existe = count($usuario[0]);
				if($usuario_existe == 0){
				       $msn=base64_encode("Debe de Registrarse Primero");
				       $tipo_msn= base64_encode("warning");
				    }
				    elseif ($usuario["estado"]==0) {
				       $msn= base64_encode("El usuario se encuentra inactivo,Por favor comunicate con el Admin del sistema");
				       $tipo_msn= base64_encode("warning");
				       
				  }else{	
				    		


						      $_SESSION["id_usuario"]     = $usuario[0];
						      $_SESSION["nombre"]         = $usuario[1];
						      $_SESSION["apellido"]       = $usuario[2];
						      $_SESSION["id_rol"]         = $usuario[14];
						      $msn=base64_encode("Bienvenido ".$usuario[1]." ".$usuario[2]);
						      $tipo_msn=base64_encode("success");		     
						    



						    
						}
						      
						      
						     
						     
			}catch (Exception $e) {
				$msn= base64_encode("A ocurrido un error ".$e->getMessage());
				$tipo_msn = base64_encode("warning");

				  }

				header("Location: ../view/index.php?m=".$msn."&tm=".$tipo_msn);
		break;
				  		
			}
			
			
			
?>


