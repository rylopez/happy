<?php


    
        if(!isset($_SESSION["id_usuario"])){
         $titulo="Registrate";  
            }else{
         $titulo="Nuevo Usuario";
         } 
           
        
?>
<div class="row contenedor">
<div class="col-md-3 col-lg-2 ">
</div>
<div class="col-sm-12 col-md-7 col-lg-9 ">
 
<div class="form-style-6">

 
  <form   action="../controller/usuarios.controller.php"  method="POST">
        <h3 ><?php echo $titulo ?></h3>
        
          
          <select name="tipo_documento"  required data-toggle="tooltip" title="Tipo De Documento" >
            <option value="x" disabled selected>Seleccione tipo de documento</option>
            <option value="CC">Cedula de Ciudadanía</option>
            <option value="TI">Tarjeta de Identidad</option>
            <option value="RC">Registro Civil</option>
            <option value="Pasaporte">Pasaporte</option>
          </select>

          <input type="number" placeholder="Numero de Documento" name="numero_documento" class="validate" required data-toggle="tooltip" title="Numero de Documento" />
              
            <input type="text" placeholder="Nombres" name="nombre"  required data-toggle="tooltip"  title="Nombres" />
             
            
            <input type="text" name="apellido" placeholder="Apellido" required data-toggle="tooltip"  title="Titulo" />
              
            
            <input type="number" name="celular" placeholder="Número Celular"  required size="11" data-toggle="tooltip"  title="Numero Celular"  />
          
            <input type="number" name="telefono"  placeholder="Número telefofico" required size="10" data-toggle="tooltip"  title="Numero Telefonico"  />
          
            
            <input type="text" name="direccion"  placeholder="Dirección" required data-toggle="tooltip"  title="Direccion" />
         
           
            <input type="text" name="ciudad" placeholder="Ciudad de residencia" required data-toggle="tooltip"  title="Ciudad"  / >
            
          
            
            <input type="email" name="correo" placeholder="Correo electronico"  required data-toggle="tooltip"  title="Correo Electronico" />
           
            
            <input type="password" name="clave1"  placeholder="Ingrese Contraseña" required data-toggle="tooltip"  title="Contraseña" />      
           
            
          
      
         
            <input type="number" name="edad" placeholder="Edad" required data-toggle="tooltip"  title="Edad" />
           
         
           <select name="sexo" required data-toggle="tooltip"  title="Sexo" >
            <option value="x" disabled selected>Seleccione Genero</option>
            <option value="Femenino">Femenino</option>
            <option value="Masculino">Masculino</option>
            <option value="otro">otro</option>
          </select>
            
        <?php


    
        if(!isset($_SESSION["id_usuario"])){ ?>
        <input name="id_rol"  value="3" type="hidden" />
          
        <?php    }else{ 
          if ($_SESSION["id_rol"]==1) {?>
        
                <select    name="id_rol" placeholder="Rol Usuario" required data-toggle="tooltip"  title="Rol usuario" >
                    <option value="x" disabled selected>Seleccione el Rol</option>
                    <option value="1">Administrador</option>
                    <option value="2">Empleado</option>
                    <option value="3">Cliente</option>                    
                </select>
         
        <?php }else{  ?>
           
                <select    name="id_rol" required placeholder="Rol Usuario" data-toggle="tooltip"  title="Rol Usuario" >
                    <option value="" disabled selected>Seleccione el Rol</option>
                    <option value="2">Empleado</option>
                    <option value="3">Cliente</option>                    
                </select>
            
      <?php } } ?>
      
      
      <input type="hidden" name="acc" value="c">
      <input type="hidden" name="estado" value="1">
      <input type="hidden" name="autor" value="<?php echo ($_SESSION["nombre"])." ".($_SESSION["apellido"]); ?>">



      <br>
      <button class="guardar"   type="submit">Guardar</button>
            <?php

      if(!isset($_SESSION["id_usuario"])){
                 
      ?>
      <a  class="btn cancelar" href="index.php">Cancelar</a>   
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
