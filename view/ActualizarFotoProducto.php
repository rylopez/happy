 <?php
  

  require_once("../model/db_conn.php");
  require_once("../model/productos.class.php");

 
  $producto=Gestion_Productos::ReadbyId(base64_decode($_REQUEST["ui"]));

?>
 <div class="row contenedor">

<div class="col-sm-12 col-md-7 col-lg-9 formulario">
 
<div class="form-style-6">

 
  <form   action="../controller/productos.controller.php" method="POST" enctype="multipart/form-data">
        <h3 >Actualizar Foto Producto</h3>

          <label>Seleccione Foto de producto</label>
          <input   type="file" name="foto1" placeholder="Foto 1 producto" required />
          <label>Seleccione Foto de producto</label> 
          <input   type="file" name="foto2" placeholder="Foto 2 producto" required />
          <label>Seleccione Foto de producto</label>
          <input   type="file" name="foto3" placeholder="Foto 3 producto" required />       
          
             <input type="hidden" name="autor" value="<?php echo ($_SESSION["nombre"])." ".($_SESSION["apellido"]); ?>">
             <input type="hidden" name="id_producto" value="<?php echo $producto [0] ?>">
             <input type="hidden" name="referencia" value="<?php  echo $producto [1] ?>">
             <input type="hidden" name="url_foto1" value="<?php   echo $producto [8] ?>">
             <input type="hidden" name="url_foto2" value="<?php   echo $producto [9] ?>">
             <input type="hidden" name="url_foto3" value="<?php   echo $producto [10] ?>">
             
                   



      <button class="guardar"   type="botton" name="acc" value="uf">Guardar</button>
      <button type="botton" class="cancelar" <?php echo " href='index.php?p=".base64_encode('gestion_productos')."'"; ?>>Cancelar</button> 
            


          
  </form>
  </div>
  </div>
  <div class="col-sm-12 col-md-5 col-lg-3 menurapido">
  <img src="recursos/logos/logo.png" class="img-responsive" alt="Cinque Terre">
</div>
</div>