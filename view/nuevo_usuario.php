<?php


    
        if(!isset($_SESSION["id_usuario"])){
         $titulo="Registrate";  
            }else{
         $titulo="Nuevo Usuario";
         } 
           
        
?>
 <div id="mensaje"></div>
<div class="form-style-6">

 
  <form   action="<?php echo $_SERVER["PHP_SELF"] ?>" id="nuevousuario" method="POST">
        <h3 ><?php echo $titulo ?></h3>

       
          <select name="tipo_documento" placeholder="Tipo de documento" required >
            <option value="" disabled selected>Seleccione</option>
            <option value="CC">Cedula de Ciudadanía</option>
            <option value="TI">Tarjeta de Identidad</option>
            <option value="RC">Registro Civil</option>
            <option value="Pasaporte">Pasaporte</option>
          </select>

          <input type="number" placeholder="Numero de Documento" name="numero_documento" class="validate" required  />
              
            <input type="text" placeholder="Nombres" name="nombre"  required />
            <div id="e_nombre"></div>  
            
            <input type="text" name="apellido" placeholder="Apellido" required />
             <div id="e_apellido"></div> 
            
            <input type="number" name="celular" placeholder="Número Celular"  required size="11" />
          
            <input type="number" name="telefono"  placeholder="Número telefofico" required size="10" />
          
            
            <input type="text" name="direccion"  placeholder="Dirección" required/ >
         
           
            <input type="text" name="ciudad" placeholder="Ciudad" required / >
            <div id="e_ciudad"></div>
          
            
            <input type="email" name="correo" placeholder="Ciudad de residencia"  required/ >
            <div id="e_correo"></div>
            
            <input type="password" name="clave1"  placeholder="Ingrese Contraseña" required/>
            <div id="e_clave1"></div>
           
            <input type="password" name="clave2" placeholder="Repita Contraseña" required/>
            <div id="e_clave2"></div>
          
      
         
            <input type="number" name="edad" placeholder="Edad" required/ >
            <div id="e_edad"></div>
         
            <label  >Seleccione Género</label>
            
            <input name="sexo"  value="mujer" type="radio" id="sex1" required/ />
            <label for="sex1" >Femenino</label>
            
            <input name="sexo"  value="Hombre" type="radio" id="sex2" />
            <label for="sex2" >Masculino</label>
            
        <?php


    
        if(!isset($_SESSION["id_usuario"])){ ?>
        <input name="id_rol"  value="3" type="hidden" />
          
        <?php    }else{ 
          if ($_SESSION["id_rol"]==1) {?>
        
                <select    name="id_rol" placeholder="Rol Usuario" required>
                    <option value="" disabled selected>Seleccione el Rol</option>
                    <option value="1">Administrador</option>
                    <option value="2">Empleado</option>
                    <option value="3">Cliente</option>                    
                </select>
         
        <?php }else{  ?>
           
                <select    name="id_rol" required placeholder="Rol Usuario">
                    <option value="" disabled selected>Seleccione el Rol</option>
                    <option value="2">Empleado</option>
                    <option value="3">Cliente</option>                    
                </select>
            
      <?php } } ?>
      
      
      <input type="hidden" name="acc" value="c">
      <input type="hidden" name="estado" value="1">
      <input type="hidden" name="autor" value="<?php echo ($_SESSION["nombre"])." ".($_SESSION["apellido"]); ?>">



      <button   class="btn" id="btnnuevouser">Guardar</button>
            <?php

      if(!isset($_SESSION["id_usuario"])){
                 
      ?>
      <a clas="btn" href="index.php">Cancelar</a>   
      <?php 
       }else {
         if ($_SESSION["id_rol"]==1 ) {  
      ?>
      
      <a  clas="btn" href="index.php?p=<?php echo base64_encode("gestion_usuarios"); ?>">Cancelar</a>
      <?php 
       }}
      ?>
            

     

          
  </form>
  </div>
