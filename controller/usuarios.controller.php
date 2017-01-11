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
			$clave1 			=$_POST["clave1"];
			$clave2 			=$_POST["clave2"];
			$nombre      	=$_POST["nombre"];
			$nombre         =strtoupper($nombre);
			$apellido    	=$_POST["apellido"];
			$apellido       =strtoupper($apellido);
			$telefono    	=$_POST["telefono"];
			$direccion   	=$_POST["direccion"];
			$celular        =$_POST["celular"];
			$ciudad			=$_POST["ciudad"];
			$ciudad         =strtoupper($ciudad);
			$correo      	=$_POST["correo"];
			$celular     	=$_POST["celular"];
			$edad           =$_POST["edad"];
			$sexo        	=$_POST["sexo"];
			$sexo           =strtoupper($sexo); 
			$estado         =$_POST["estado"];			
			$id_rol			=$_POST["id_rol"];
			$autor			=$_POST["autor"];
			$existente=Gestion_Usuarios::veref_exist($correo);
   
     if(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $nombre))
    {
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='Error, s&oacute;lo se permiten letras';</script>";
        echo $mensaje;
    }
     elseif(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $apellido))
    {
        $mensaje = "<script>document.getElementById('e_apellido').innerHTML='Error, s&oacute;lo se permiten letras';</script>";
         echo $mensaje;
    }
    elseif(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $ciudad))
    {
        $mensaje = "<script>document.getElementById('e_ciudad').innerHTML='Error, s&oacute;lo se permiten letras';</script>";
         echo $mensaje;
    }
    
    else if ($existente[5] == $correo)
    {
        $mensaje = "<script>document.getElementById('e_correo').innerHTML='Correo electronico ya se encuentra en uso';</script>";
         echo $mensaje;
    }
    
    else if(!preg_match('/^([a-z]+[0-9]+)|([0-9]+[a-z]+)/i', $clave1))
    {
        $mensaje = "<script>document.getElementById('e_clave1').innerHTML='Obligatorio, letras y n&uacute;meros';</script>";
         echo $mensaje;
    }
    else if(strlen($clave1) < 8)
    {
        $mensaje = "<script>document.getElementById('e_clave1').innerHTML='El m&iacute;nimo permitido 8 caracteres';</script>";
         echo $mensaje;
    }
        else if(strlen($clave1) > 16)
    {
        $mensaje = "<script>document.getElementById('e_clave1').innerHTML='El m&aacute;ximo permitido 16 caracteres';</script>";
         echo $mensaje;
    }
    else if ($clave1 != $clave2)
    {
        $mensaje = "<script>document.getElementById('e_clave2').innerHTML='Las contraseñas  no coinciden';</script>";
         echo $mensaje;
    }
     else if ($edad <= 18)
    {
        $mensaje = "<script>document.getElementById('e_edad').innerHTML='Debe ser mayor de edad para registrarse';</script>";
         echo $mensaje;
    }
    else
    {
    	try {
				Gestion_usuarios::Create($tipo_documento,$numero_documento,$clave1,$nombre,$apellido,$telefono,$direccion,$ciudad,$correo,$celular,$edad,$sexo,$estado,$id_rol,$autor);
				$msn= base64_encode("Su registro se creo correctamente :D");	
				$tipom=base64_encode("success");
				$mensaje = "<script>window.location='index.php?p=".base64_encode("Gestion_usuarios")."&m=".$msn."&tm=".$tipom."';</script>";
				
						
			     } catch (Exception $e) {
				 $msn=base64_encode(":( ha  ocurrido un error, el error  fue: ".$e->getMessage()." en ".$e->getFile(). " en la linea".$e->getLine());
				 $tipom=base64_encode("warning");
				 $mensaje ="<script>window.location='index.php?p=".base64_encode("Gestion_usuarios")."&m=".$msn."&tm=".$tipom."';</script>";
				
			         }
			         echo $mensaje;
			        
    }
			
	

				break;
				case 'u':
				# Actualizar
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
			$celular        =$_POST["celular"];
			$ciudad			=$_POST["ciudad"];
			$ciudad         =strtoupper($ciudad);
			$correo      	=$_POST["correo"];
			$celular     	=$_POST["celular"];
			$edad           =$_POST["edad"];
			$sexo        	=$_POST["sexo"];
			$sexo           =strtoupper($sexo); 
			$estado         =$_POST["estado"];			
			$id_rol			=$_POST["id_rol"];
			$autor			=$_POST["autor"];
			$id_usuario     =$_POST["id_usuario"];
			try {
				Gestion_usuarios::update($tipo_documento,$numero_documento,$clave,$nombre,$apellido,$telefono,$direccion,$ciudad,$correo,$celular,$edad,$sexo,$estado,$id_rol,$autor,$id_usuario);
				$msn= base64_encode("se ha actualizado correctamente :D");
				$tipom=base64_encode("success");
				
			} catch (Exception $e) {
				$msn=":( ha  ocurrido un error, el error  fue: ".$e->getMessage()." en ".$e->getFile(). " en la linea".$e->getLine();
				$tipom=base64_encode("warning");
			}
			header("location: ../view/index.php?m=".$msn."&tm=".$tipom);


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


