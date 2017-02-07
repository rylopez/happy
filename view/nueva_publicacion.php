<?php
  

  require_once("../model/db_conn.php");
  require_once("../model/productos.class.php");

 
  $producto=Gestion_Productos::ReadAll();

?>
<div class="row contenedor">
<div class="col-md-3 col-lg-2 ">
</div>
<div class="col-sm-12 col-md-7 col-lg-9 formulario">
 
<div class="form-style-6">

 
  <form  id action="../controller/publicaciones.controller.php" method="POST" enctype="multipart/form-data">
        <h3 >Nueva Publicación</h3>
        
        

          <input   type="text" placeholder="Titulo " name="Titulo"  required data-toggle="tooltip"  title="Titulo" />
           <textarea name="texto" placeholder="Escribe aqui el Articulo" COLS=100 ROWS=30  data-toggle="tooltip" title="Texto"></textarea>
              
           <label>Adjunte imagen</label>
           <input   type="file" name="file"  required data-toggle="tooltip"  title="Imagen publicación" />

            <select    name="id_producto"  required data-toggle="tooltip"  title="producto a Promocionar">
                    <option value="" disabled selected>Producto a Promocionar</option>
                    <?php
                     foreach ($producto as $row) {
                      echo "<option value=".$row['id_producto'].">".$row['referencia']." ".$row['nombre']."</option>"; }


                    ?>

                                        
                </select>
             

             <input type="hidden" name="autor" value="<?php echo ($_SESSION["nombre"])." ".($_SESSION["apellido"]); ?>">
            


      <br>
      <button class="guardar"   type="botton" name="acc" value="c">Guardar</button>
       <a  class=" btn cancelar" href="index.php?p=<?php echo base64_encode("gestion_publicaciones"); ?>">Cancelar</a>
            
  </form>
  </div>
  </div>
   <div class="col-md-4 col-lg-1 ">
</div>
  </div>
