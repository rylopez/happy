<?php
  

  require_once("../model/db_conn.php");
  require_once("../model/usuarios.class.php");

 
  $usuario = Gestion_Usuarios::ReadbyId(base64_decode($_REQUEST["ui"]));

?>
 <div class="row contenedor">
<div class="col-md-3 col-lg-2 ">
</div>
<div class="col-sm-12 col-md-7 col-lg-9 formulario">
 
<div class="form-style-6">

 
  <form   action="../controller/usuarios.controller.php" method="POST">
        <h3 >Actualizar Usuario</h3>
        
          <select name="tipo_documento"  required data-toggle="tooltip"  title="Tipo de documento" >
            <option value="" disabled selected>Seleccione tipo de documento</option>
            <option value="CC" <?php if($usuario[3] == "CC"){ echo "selected"; } ?> >Cedula de Ciudadanía</option>
            <option value="TI" <?php if($usuario[3] == "TI"){ echo "selected"; } ?>>Tarjeta de Identidad</option>
            <option value="RC" <?php if($usuario[3] == "RC"){ echo "selected"; } ?> >Registro Civil</option>
            <option value="Pasaporte" <?php if($usuario[3] == "Pasaporte"){ echo "selected"; } ?> >Pasaporte</option>
          </select>

          <input value="<?php echo $usuario[4] ?>"  type="number" placeholder="Numero de Documento" name="numero_documento" class="validate" required data-toggle="tooltip"  title="Numero  de documento" />
              
            <input value="<?php echo $usuario[1] ?>"  type="text" placeholder="Nombres" name="nombre"  required data-toggle="tooltip"  title="Nombres" />
             
            
            <input value="<?php echo $usuario[2] ?>"  type="text" name="apellido" placeholder="Apellido" required  data-toggle="tooltip"  title="Apellidos"/>
              
            
            <input value="<?php echo $usuario[8] ?>"  type="number" name="celular" placeholder="Número Celular"  required size="11" data-toggle="tooltip"  title="Numero Celular" />
          
            <input value="<?php echo $usuario[7] ?>"  type="number" name="telefono"  placeholder="Número telefofico" required size="10" data-toggle="tooltip"  title="Numero Telefonico" />
          
            
            <input value="<?php echo $usuario[9] ?>"  type="text" name="direccion"  placeholder="Dirección" required data-toggle="tooltip"  title="Direccion"/>
         
           
            <input value="<?php echo $usuario[10] ?>"  type="text" name="ciudad" placeholder="Ciudad de residencia" required  data-toggle="tooltip"  title="Ciudad de residencia"/>
            
          
            
            <input value="<?php echo $usuario[5] ?>"  type="email" name="correo" placeholder="Correo electronico"  required data-toggle="tooltip"  title="Correo Electronico"/>
           
            
            <input value="<?php echo $usuario[6] ?>"  type="password" name="clave"  placeholder="Ingrese Contraseña" required data-toggle="tooltip"  title="Contraseña"/>
            
           
           
            
          
      
         
            <input value="<?php echo $usuario[11] ?>"  type="number" name="edad" placeholder="Edad" required data-toggle="tooltip"  title="Edad"/>
           
         
           <select name="sexo"required data-toggle="tooltip"  title="Genero" >
            <option value="x" disabled selected>Seleccione Genero</option>
            <option value="Femenino"<?php if($usuario[12] == "FEMENINO"){ echo "selected"; } ?> >Femenino</option>
            <option value="Masculino" <?php if($usuario[12] == "MASCULINO"){ echo "selected"; } ?>>Masculino</option>
            <option value="otro" <?php if($usuario[12] == "otro"){ echo "selected"; } ?>>otro</option>
          </select>
            
        <?php


    
        if(!isset($_SESSION["id_usuario"])){ ?>
        <input name="id_rol" value="<?php echo $usuario[13] ?>"  type="hidden" />
          
        <?php    }else{ 
          if ($_SESSION["id_rol"]==1) {?>
        
                <select    name="id_rol" placeholder="Rol Usuario" required data-toggle="tooltip"  title="Rol Usuario">
                    <option value="x" disabled selected>Seleccione el Rol</option>
                    <option value="1" <?php if($usuario[13] == "1"){ echo "selected"; } ?>>Administrador</option>
                    <option value="2" <?php if($usuario[13] == "2"){ echo "selected"; } ?>>Empleado</option>
                    <option value="3" <?php if($usuario[13] == "3"){ echo "selected"; } ?>>Cliente</option>
                    <option value="4" <?php if($usuario[13] == "4"){ echo "selected"; } ?>>Experto</option>                     
                </select>
         
        <?php }else{  ?>
           
                <select    name="id_rol" required data-toggle="tooltip"  title="Rol Usuario">
                    <option value="" disabled selected>Seleccione el Rol</option>
                    <option value="2" <?php if($usuario[13] == "2"){ echo "selected"; } ?>>Empleado</option>
                    <option value="3" <?php if($usuario[13] == "3"){ echo "selected"; } ?>>Cliente</option>                    
                </select>
            
      <?php } } ?>
      
      
      
      <input type="hidden" name="estado" value="1">
      <input type="hidden" name="id_usuario" value="<?php echo $usuario[0] ?>" >
      <input type="hidden" name="autor" value="<?php echo ($_SESSION["nombre"])." ".($_SESSION["apellido"]); ?>">

      <br>

      <button class="guardar"   type="botton" name="acc" value="u">Guardar</button>
            <?php

      if(!isset($_SESSION["id_usuario"])){
                 
      ?>
      <a  class=" btn cancelar" href="index.php">Cancelar</a>  
      <?php 
       }else {
         if ($_SESSION["id_rol"]==1 ) {  
      ?>
      
      <a  class=" btn cancelar" href="index.php?p=<?php echo base64_encode("gestion_usuarios"); ?>">Cancelar</a>
      <?php 
       }}
      ?>
            

     

          
  </form>
  </div>
  </div>
  <div class="col-md-4 col-lg-1 ">
</div>
  </div>
