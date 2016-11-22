<?php


    
        if(!isset($_SESSION["id_usuario"])){
         $titulo="Registrate";  
            }else{
         $titulo="Nuevo Usuario";
         } 
           
        
?>


  <form   action="../controller/usuarios.controller.php" method="POST">
        <h3 ><?php echo $titulo ?></h3>

        <label class="black-text">Tipo de Documento</label>
        <br>
          <select name="tipo_documento" required >
            <option value="" disabled selected>Seleccione</option>
            <option value="CC">Cedula de Ciudadanía</option>
            <option value="TI">Tarjeta de Identidad</option>
            <option value="RC">Registro Civil</option>
            <option value="Pasaporte">Pasaporte</option>
          </select>

            <label class="black-text">Número de documento</label>
            <br>
            <input type="number" name="numero_documento" class="validate" required  />
              
            <label >Nombres</label>
            <br>
            <input type="text" name="nombre" class="validate" required />
              
            <label >Apellidos</label>
            <br>
            <input type="text" name="apellido" class="validate" required />
              
            <label >Número celular</label>
            <br>
            <input type="number" name="celular" class="validate" required size="11" />
          
            <label >Número de telefono</label>
            <br>
            <input type="number" name="telefono" class="validate" required size="10" />
          
            <label >Dirección</label>
            <br>
            <input type="text" name="direccion" class="validate" required/ >
         
            <label >Ciudad</label>
            <br>
            <input type="text" name="ciudad" class="validate" required / >
          <
            <label >Correo Electrónico</label>
            <br>
            <input type="email" name="correo" class="validate" required/ >
         
            <label >Ingrese una Contraseña</label>
            <br>
            <input type="password" name="clave1" class="validate" required/>
            <label >Repita Contraseña</label>
            <br>
            <input type="password" name="clave2" class="validate" required/>
          
      
          <label >edad </label>
            <br>
            <input type="number" name="edad" required/ >
         
            <label class="black-text center" >Seleccione Género</label>
            <br>
           
            <input name="sexo"  value="mujer"type="radio" id="sex1" required/ />
            <label for="sex1" class="black-text">Femenino</label>
            
            <input name="sexo"  value="Hombre" type="radio" id="sex2" />
            <label for="sex2" class="black-text">Masculino</label>
            
        <?php


    
        if(!isset($_SESSION["id_usuario"])){ ?>
        <input name="id_rol"  value="3" type="hidden" />
          
        <?php    }else{ 
          if ($_SESSION["id_rol"]==1) {?>
          <label >Rol usuario</label>
            <br>
                <select    name="id_rol" required>
                    <option value="" disabled selected>Seleccione el Rol</option>
                    <option value="1">Administrador</option>
                    <option value="2">Empleado</option>
                    <option value="3">Cliente</option>                    
                </select>
         
        <?php }else{  ?>
            <label >Rol usuario</label>
            <br>
                <select    name="id_rol" required>
                    <option value="" disabled selected>Seleccione el Rol</option>
                    <option value="2">Empleado</option>
                    <option value="3">Cliente</option>                    
                </select>
            
      <?php } } ?>
      
      

      <input type="hidden" name="estado" value="1">
      <input type="hidden" name="autor" value="<?php echo ($_SESSION["nombre"])." ".($_SESSION["apellido"]); ?>">

          <div class="col s12 center">

            <button  name="acc" value="c" class="waves-effect black btn">Guardar</button>
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
            

     

          
  </form>
