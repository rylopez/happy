<?php
  

  require_once("../model/db_conn.php");
  require_once("../model/productos.class.php");

 
  $producto=Gestion_Productos::ReadAll();

?>
<div class="row contenedor">

<div class="col-sm-12 col-md-7 col-lg-9 formulario">
 
<div class="form-style-6">

 
  <form  id action="../controller/publicaciones.controller.php" method="POST" enctype="multipart/form-data">
        <h3 >Nueva Publicación</h3>
        
        

          <input   type="text" placeholder="Titulo " name="Titulo"  required data-toggle="tooltip"  title="Titulo" />
           <textarea name="texto" placeholder="Escribe aqui el Articulo" COLS=100 ROWS=30  data-toggle="tooltip" title="Texto"></textarea>
              
           <label>Adjunte un Archivo multimedia</label>
           <input   type="file" name="file"  required data-toggle="tooltip"  title="Titulo" />

            <select    name="id_producto"  required>
                    <option value="" disabled selected>Producto a Promocionar</option>
                    <?php
                     foreach ($producto as $row) {
                      echo "<option value=".$row['id_producto'].">".$row['referencia']." ".$row['nombre']."</option>"; }


                    ?>

                                        
                </select>
             

             <input type="hidden" name="autor" value="<?php echo ($_SESSION["nombre"])." ".($_SESSION["apellido"]); ?>">
            



      <button class="guardar"   type="botton" name="acc" value="c">Guardar</button>
      <button type="botton" class="cancelar" ><?php echo " <a href=index.php?p=".base64_encode('gestion_publicaciones')."'>cancelar</a>"; ?></button> 
            
  </form>
  </div>
  </div>
  <div class="col-sm-12 col-md-5 col-lg-3 menurapido">
  <img src="recursos/logos/logo.png" class="img-responsive" alt="Cinque Terre">
</div>
  </div>
