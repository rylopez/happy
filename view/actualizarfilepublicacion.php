<?php
  

  require_once("../model/db_conn.php");
  require_once("../model/publicaciones.class.php");

 
  $publicacion=Gestion_Publicaciones::ReadbyId(base64_decode($_REQUEST["ui"]));

?>
 <div class="row contenedor">
 <div class="col-md-3 col-lg-2 ">
</div>

<div class="col-sm-12 col-md-7 col-lg-9 formulario">
 
<div class="form-style-6">

 
  <form   action="../controller/publicaciones.controller.php" method="POST" enctype="multipart/form-data">
        <h3 >Actualizar Foto Publicacion</h3>

          <label>Seleccione Nueva Foto</label>
          <input   type="file" name="file"  required data-toggle="tooltip"  title="Nueva imagen Publicacion"/>
          
                 
          
             <input type="hidden" name="autor" value="<?php echo ($_SESSION["nombre"])." ".($_SESSION["apellido"]); ?>">
             <input type="hidden" name="id_publicacion" value="<?php echo $publicacion [0] ?>">
             <input type="hidden" name="titulo" value="<?php  echo $publicacion [1] ?>">
             <input type="hidden" name="url_file" value="<?php   echo $publicacion [3] ?>">
             
             <br>
                   



      <button class="guardar"   type="botton" name="acc" value="uf">Guardar</button>
      <a  class=" btn cancelar" href="index.php?p=<?php echo base64_encode("gestion_publicaciones"); ?>">Cancelar</a>
            


          
  </form>
  </div>
  </div>
  <div class="col-md-4 col-lg-1 ">
</div>
</div>