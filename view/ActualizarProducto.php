 <?php
  

  require_once("../model/db_conn.php");
  require_once("../model/productos.class.php");

 
  $producto=Gestion_Productos::ReadbyId(base64_decode($_REQUEST["ui"]));

?>
 <div class="row contenedor">

<div class="col-sm-12 col-md-7 col-lg-9 formulario">
 
<div class="form-style-6">

 
  <form   action="../controller/productos.controller.php" method="POST">
        <h3 >Actualizar Producto</h3>
        
          <input  type="text" placeholder="Referencia" name="referencia"  required data-toggle="tooltip" title="Referencia" value="<?php echo $producto[1] ?>" />
              
            <input  type="text" placeholder="Nombre" name="nombre"  required />             
            
            <input   type="number" name="valor_compra" placeholder="Valor Compra" required />

            <input   type="number" name="valor_venta" placeholder="Valor Venta" required />

            <input   type="number" name="descuento" placeholder="Descuento" required />

            <input   type="number" name="iva" placeholder="Iva" required />

            <input   type="number" name="cantidad" placeholder="Cantidad Existentes" required />

            <input   type="file" name="foto1" placeholder="Foto 1 producto" required />

            <input   type="file" name="foto2" placeholder="Foto 2 producto" required />

            <input   type="file" name="foto3" placeholder="Foto 3 producto" required />

            <select    name="sexo"  required>
                    <option value="" disabled selected>Publico Objectivo</option>
                    <option value="hombre">Hombres</option>
                    <option value="mujer" >Mujeres</option>
                    <option value="indiferente" >Indiferente</option>
                                        
                </select>

             

            <select    name="id_tipoproducto" id="tipoproducto" required>
                    <option value="" disabled selected>Seleccione tipo producto</option>
                    <option value="1">Salud Sexual</option>
                    <option value="2" >Lenceria</option>
                    <option value="3" >Juguetes</option>
                    <option value="4" >Estimulantes</option>
                    <option value="5" >Otros</option>                    
                </select>
            <div id="talla"></div>
             <input type="hidden" name="autor" value="<?php echo ($_SESSION["nombre"])." ".($_SESSION["apellido"]); ?>">
            <textarea name="descripcion" placeholder="Descripcion Producto" COLS=100 ROWS=30 ></textarea>       



      <button class="guardar"   type="botton" name="acc" value="c">Guardar</button>
      <button type="botton" class="cancelar" href="index.php">Cancelar</button> 
            
  </form>
  </div>
  </div>
  <div class="col-sm-12 col-md-5 col-lg-3 menurapido">
  <img src="recursos/logos/logo.png" class="img-responsive" alt="Cinque Terre">
</div>
  </div>

          <select name="tipo_documento"  required >
            <option value="x" disabled selected>Seleccione tipo de documento</option>
            <option value="CC" <?php if($usuario[3] == "CC"){ echo "selected"; } ?> >Cedula de Ciudadanía</option>
            <option value="TI" <?php if($usuario[3] == "TI"){ echo "selected"; } ?>>Tarjeta de Identidad</option>
            <option value="RC" <?php if($usuario[3] == "RC"){ echo "selected"; } ?> >Registro Civil</option>
            <option value="Pasaporte" <?php if($usuario[3] == "Pasaporte"){ echo "selected"; } ?> >Pasaporte</option>
          </select>

          <input value="<?php echo $usuario[4] ?>"  type="number" placeholder="Numero de Documento" name="numero_documento" class="validate" required  />
              
            <input value="<?php echo $usuario[1] ?>"  type="text" placeholder="Nombres" name="nombre"  required />
             
            
            <input value="<?php echo $usuario[2] ?>"  type="text" name="apellido" placeholder="Apellido" required />
              
            
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
