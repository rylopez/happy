<?php
  

  require_once("../model/db_conn.php");
  require_once("../model/usuarios.class.php");

 
  $usuario = Gestion_Usuarios::ReadbyId(base64_decode($_REQUEST["ui"]));

?>

  
    <form class="col s12 center" action="../controller/usuarios.controller.php" method="POST" id="form">
      <h3>Actualizar Usuario</h3>
      <div class="row">
        <div class="col s12  m4 black-text ">
          <label class="white-text" >tipo de documento </label>
            
            <select name="tipo_documento">
              <option value="CC" <?php if($usuario[1] == "CC"){ echo "selected"; } ?>>Cédula de ciudadania</option>
              <option value="TI" <?php if($usuario[1] =="TI"){ echo "selected"; } ?>>Tarjeta de Identidad</option>
              <option value="RC" <?php if($usuario[1] == "RC"){ echo "selected"; } ?>>Registro Civil</option>
              <option value="Pasaporte" <?php if($usuario[1] =="Pasaporte"){ echo "selected"; } ?>>Pasaporte</option>
            </select>
        </div>
        <div class="col s12 m4 black-text ">
          <label>Número de documento</label>
            
            <input type="text" value="<?php echo $usuario[2] ?>" name="numero_documento" class="validate" required/ > 
        </div>
         <div class="col s12  m4 black-text ">
          <label>Contraseña</label>
          <br>
          <input type="password" value="<?php echo $usuario[3] ?>" name="clave" class="validate" required/ >
        </div>
      </div>
      
      <div class="row">
      <div class="col s12 m5 black-text ">
          <label>Nombres</label>
          
          <input type="text" value="<?php echo $usuario[4] ?>"name="nombre" class="validate" required/ >
        </div>
        <div class="col s12 m5 black-text ">
          <label>Apellidos</label>
          
          <input type="text"value="<?php echo $usuario[5] ?>" name="apellido" class="validate" >
          </div>
        
      </div>
      <div class="row center">
      <div class="col s12 m4 black-text ">
          <label>Número de telefono</label>
          
          <input type="text" value="<?php echo $usuario[6] ?>"name="telefono" class="validate" required/ >          
        </div>
        <div class="col s12 m4 black-text ">
          <label>Dirección</label>
          
          <input type="text" value="<?php echo $usuario[7] ?>" name="direccion" class="validate" required/ >
        </div>
        <div class="col s12 m4 black-text ">
          <label>Ciudad</label>
          
          <input type="text" value="<?php echo $usuario[8] ?>" name="ciudad" class="validate" required/ >
        </div>
      </div>
      <div class="row center">
        <div class="col s12 m4 black-text ">
          <label>Correo Electrónico</label>
          
          <input type="email" value="<?php echo $usuario[9] ?>"name="correo" class="validate" required/ >
        </div>
        <div class="col s12 m4 black-text ">
          <label>Número celular</label>
          
          <input type="text" value="<?php echo $usuario[10] ?>"name="celular" class="validate" required/>
        </div>
        <div class="col s12 m4 black-text ">
        <label>fecha de nacimiento </label>
                   
        <input type="date"value="<?php echo $usuario[11] ?>" name="fecha_nacimiento" min="1900-01-01" class="validate" required/ >
        </div>
      </div>
     
       
                    
          


      <div class="row" >
       <div class="col s12 m4  ">
          <label >Género</label>
          
          <select name="sexo">
            <option value="mujer" <?php if($usuario[12] == "mujer" || $usuario[12] == "MUJER"){ echo "selected"; } ?>>Femenino</option>
            <option value="hombre" <?php if($usuario[12] =="hombre" || $usuario[12] == "HOMBRE"){ echo "selected"; } ?>>Masculino</option>
          </select> 
        </div>
      
      <?php 
       if($_SESSION["id_rol"]==4){
       ?>
      <div class="col s12 m6" name>
      <label >Rol usuario</label>
      
          <select name="id_rol">
            <option value="1" <?php if($usuario[14] == 1){ echo "selected"; } ?>>Usuario Publico</option>
            <option value="2" <?php if($usuario[14] ==2){ echo "selected"; } ?>>Empleado</option>
            <option value="3" <?php if($usuario[14] == 3){ echo "selected"; } ?>>Cliente Administrador</option>
            <option value="4" <?php if($usuario[14] ==4){ echo "selected"; } ?>>Administrador</option>
          </select>  
      </div>
      <?php
      }elseif ($_SESSION["id_rol"]==3) {              
      ?>
      <div class="col s12 m6" name>
      <label >Rol usuario</label>
      
                  <select name="id_rol">
            <option value="1" <?php if($usuario[14] == 1){ echo "selected"; } ?>>Usuario Publico</option>
            <option value="2" <?php if($usuario[14] ==2){ echo "selected"; } ?>>Empleado</option>
            <option value="3" <?php if($usuario[14] == 3){ echo "selected"; } ?>>Cliente Administrador</option>
            
          </select>  
      </div>
      <?php
      }elseif ($_SESSION["id_rol"]==2) {              
      ?>
      <div class=" col s12 m6" name>
      <label >Rol usuario</label>
      
                  <select name="id_rol">
            <option value="1" <?php if($usuario[14] == 1){ echo "selected"; } ?>>Usuario Publico</option>
            <option value="2" <?php if($usuario[14] ==2){ echo "selected"; } ?>>Empleado</option>
            
            
          </select>  
      </div>
      <?php
      }elseif ($_SESSION["id_rol"]==1) {              
      ?>
      <div class=" col s12 m6" name>
      <label >Rol usuario</label>
      
            <select name="id_rol">
            <option value="1" <?php if($usuario[14] == 1){ echo "selected"; } ?>>Usuario Publico</option>
             </select>
             
      </div>
      <?php 
       }
      ?>
    
      </div>
               
      
        
      <div class="row center">
        <input type="hidden" value="<?php echo $usuario[13] ?>" name="estado"  class="validate" required />
      
         <input type="hidden" name="id_usuario" value="<?php echo $usuario[0] ?>">  
         <input type="hidden" name="autor" value="Autoregistrado">               
         <button  type="botton" name="acc" value="u" class="waves-effect black btn">Guardar</button>
      <?php
      if ($_SESSION["id_rol"]==4 || $_SESSION["id_rol"]==3 ) {              
      ?>
         <a class="waves-effect black btn" href="dashboard.php?p=<?php echo base64_encode("gestion_usuarios"); ?>">Cancelar</a>
      <?php 
       }else {
      ?>
      <a class="waves-effect black btn" href="dashboard.php?p=<?php echo base64_encode(""); ?>">Cancelar</a>
      <?php 
       }
      ?>

       
      </div>
    </form>
 

 
  
  
