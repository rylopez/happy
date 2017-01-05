
 <div class="row contenedor">

<div class="col-sm-12 col-md-7 col-lg-9 formulario">
 
<div class="form-style-6">

 
  <form  id action="../controller/productos.controller.php" method="POST" enctype="multipart/form-data">
        <h3 >Nuevo Producto</h3>
        
        

          <input   type="text" placeholder="Referencia" name="Referencia"  required  />
              
            <input  type="text" placeholder="Nombre" name="nombre"  required />             
            
            <input   type="number" name="valor_compra" placeholder="Valor Compra" required />

            <input   type="number" name="valor_venta" placeholder="Valor Venta" required />

            <input   type="number" name="descuento" placeholder="Descuento" required />

            <input   type="number" name="iva" placeholder="Iva" required />
              http://casamadrugada.net/tutoriales/php/como-subir-archivos-imagenes-utilizando-php-y-mysql/
            
            <input value="<?php echo $usuario[8] ?>"  type="number" name="celular" placeholder="Número Celular"  required size="11" />
          
            <input value="<?php echo $usuario[7] ?>"  type="number" name="telefono"  placeholder="Número telefofico" required size="10" />
          
            
            <input value="<?php echo $usuario[9] ?>"  type="text" name="direccion"  placeholder="Dirección" required/ >
         
           
            <input value="<?php echo $usuario[10] ?>"  type="text" name="ciudad" placeholder="Ciudad de residencia" required / >
            
          
            
            <input value="<?php echo $usuario[5] ?>"  type="email" name="correo" placeholder="Correo electronico"  required/ >
           
            
            <input value="<?php echo $usuario[6] ?>"  type="password" name="clave1"  placeholder="Ingrese Contraseña" required/>
            
           
            <input value="<?php echo $usuario[6] ?>"  type="password" name="clave2" placeholder="Repita Contraseña" required/>
            
          
      
         
            <input value="<?php echo $usuario[11] ?>"  type="number" name="edad" placeholder="Edad" required/ >
           
         
           <select name="sexo"required >
            <option value="x" disabled selected>Seleccione Genero</option>
            <option value="Femenino"<?php if($usuario[12] == "Femenino"){ echo "selected"; } ?> >Femenino</option>
            <option value="Masculino" <?php if($usuario[12] == "Masculino"){ echo "selected"; } ?>>Masculino</option>
            <option value="otro" <?php if($usuario[12] == "otro"){ echo "selected"; } ?>>otro</option>
          </select>
            
        <?php


    
        if(!isset($_SESSION["id_usuario"])){ ?>
        <input name="id_rol" value="<?php echo $usuario[13] ?>"  type="hidden" />
          
        <?php    }else{ 
          if ($_SESSION["id_rol"]==1) {?>
        
                <select    name="id_rol" placeholder="Rol Usuario" required>
                    <option value="x" disabled selected>Seleccione el Rol</option>
                    <option value="1" <?php if($usuario[13] == "1"){ echo "selected"; } ?>>Administrador</option>
                    <option value="2" <?php if($usuario[13] == "2"){ echo "selected"; } ?>>Empleado</option>
                    <option value="3" <?php if($usuario[13] == "3"){ echo "selected"; } ?>>Cliente</option>                    
                </select>
         
        <?php }else{  ?>
           
                <select    name="id_rol" required placeholder="Rol Usuario">
                    <option value="" disabled selected>Seleccione el Rol</option>
                    <option value="2" <?php if($usuario[13] == "2"){ echo "selected"; } ?>>Empleado</option>
                    <option value="3" <?php if($usuario[13] == "3"){ echo "selected"; } ?>>Cliente</option>                    
                </select>
            
      <?php } } ?>
      
      
      
      <input type="hidden" name="estado" value="1">
      <input type="hidden" name="id_usuario" value="<?php echo $usuario[0] ?>" >
      <input type="hidden" name="autor" value="<?php echo ($_SESSION["nombre"])." ".($_SESSION["apellido"]); ?>">



      <button class="guardar"   type="botton" name="acc" value="u">Guardar</button>
            <?php

      if(!isset($_SESSION["id_usuario"])){
                 
      ?>
      <button type="botton" class="cancelar" href="index.php">Cancelar</button>   
      <?php 
       }else {
         if ($_SESSION["id_rol"]==1 ) {  
      ?>
      
      <button   type="botton" class="cancelar" href="index.php?p=<?php echo base64_encode("gestion_usuarios"); ?>">Cancelar</button >
      <?php 
       }}
      ?>
            

     

          
  </form>
  </div>
  </div>
  <div class="col-sm-12 col-md-5 col-lg-3 menurapido">
  <img src="recursos/logos/logo.png" class="img-responsive" alt="Cinque Terre">
</div>
  </div>

	
