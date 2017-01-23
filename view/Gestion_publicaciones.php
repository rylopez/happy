<div class="row contenedor">
<div class="col-sm-12 col-md-5 col-lg-3 menurapido">
 <?php


  require_once("../model/db_conn.php");
  require_once("../model/publicaciones.class.php");

             $publicacion= Gestion_Publicaciones::ReadAll();
		     $titulo= "GESTIONAR PPUBLICACIONES";

		      echo " <h2>".$titulo."</h2>
		      <a class='waves-effect black btn' href='index.php?p=".base64_encode('nueva_publicacion')."' ><i class='fa fa-industry' aria-hidden='true'></i>Nueva Publicacion</a>";
 

?>
  
  
</div>

<div class="col-sm-12 col-md-7 col-lg-9 formulario">
	<div class="">
		<div class="table-responsive" >    
		     

		    <table id="datatable" class="table">
		      <thead>
		        <tr>
		          <th>id</th>
		          <th>Titulo</th>
		          <th>Contenido</th>
		          <th>Autor</th>
		          <th>Acciones</th>
		          

		        </tr>
		      </thead>
		      <tbody>

		      <?php

		      foreach ($publicacion as $row) {

		        

		        

		        echo "<tr>
		                <td>".$row["id_publicacion"]."</td>
		                <td>".$row["titulo"]."</td>
		                <td>".$row["texto"]."</td>
		                <td>".$row["autor"]."</td>
		                
		                

		                <td><a href='index.php?p=".base64_encode('actualizar_publicacion')."&ui=".base64_encode($row['id_publicacion'])."'><i class='fa fa-pencil'style='color:black !important'></i></a>
		                <a href='index.php?p=".base64_encode('actualizar_file_publicacion')."&ui=".base64_encode($row['id_publicacion'])."'><i class='fa fa-pencil-square-o' aria-hidden='true' style='color:gray !important' ></i></a>
		                  <a href='../controller/publicacion.controller.php?ui=".base64_encode($row["id_publicacion"])."&acc=d'><i class='fa fa-ban' style='color:red !important' aria-hidden='true'></i></a></td>
		              </tr>";
		            
		            
		     }

		      ?>
		      </tbody>

		    </table>
		    </div>
		    </div>
</div>
</div>