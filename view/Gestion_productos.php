<div class="row contenedor">
<div class="col-md-3 col-lg-2">
  
  
</div>



<div class="col-sm-12 col-md-7 col-lg-9 ">
 <?php


  require_once("../model/db_conn.php");
  require_once("../model/productos.class.php");

             $productos= Gestion_Productos::ReadAll();
		      $titulo= "GESTIONAR PRODUCTOS";

		      echo " <h2 class='gestionar'>".$titulo."</h2>
		      <a class=' btn new' href='index.php?p=".base64_encode('nuevo_producto')."' ><i class='fa fa-industry' aria-hidden='true'></i>Nuevo Producto</a>";
 

?>

	<div class="">
		<div class="table-responsive" >    
		     

		    <table id="datatable" class="table">
		      <thead>
		        <tr>
		          <th>id</th>
		          <th>Referencia</th>
		          <th>Nombre</th>
		          <th>Valor Compra</th>
		          <th>valor Venta</th>
		          <th>Descuento</th>
		          <th>Iva</th>
		          <th>Tipo Producto</th>
		          <th>Acciones</th>
		        </tr>
		      </thead>
		      <tbody>

		      <?php

		      foreach ($productos as $row) {

		        if($row["id_tipoproducto"] == 1){

		          $tipoproducto = "Salud Sexual";        

		        }elseif($row["id_tipoproducto"] == 2){
		          $tipoproducto = "Lenceria";
		        }elseif($row["id_tipoproducto"] == 3){
		          $tipoproducto = "Juguetes";
		        }elseif($row["id_tipoproducto"] == 4){
		          $tipoproducto = "Estimulantes";
		        }elseif($row["id_tipoproducto"] == 5){
		          $tipoproducto = "Otros";
		        }

		        

		        echo "<tr>
		                <td>".$row["id_producto"]."</td>
		                <td>".$row["referencia"]."</td>
		                <td>".$row["nombre"]."</td>
		                <td>".$row["valor_compra"]."</td>
		                <td>".$row["valor_venta"]."</td>
		                <td>".$row["descuento"]."</td>
		                <td>".$row["iva"]."</td>
		                <td>".$tipoproducto."</td>
		                

		                <td><a href='index.php?p=".base64_encode('actualizar_producto')."&ui=".base64_encode($row['id_producto'])."'><i class='fa fa-pencil'style='color:black !important'></i></a>
		                <a href='index.php?p=".base64_encode('actualizar_foto_producto')."&ui=".base64_encode($row['id_producto'])."'><i class='fa fa-pencil-square-o' aria-hidden='true' style='color:gray !important' ></i></a>
		                  <a href='../controller/productos.controller.php?ui=".base64_encode($row["id_producto"])."&acc=d'><i class='fa fa-ban' style='color:red !important' aria-hidden='true'></i></a></td>
		              </tr>";
		            
		            
		     }

		      ?>
		      </tbody>

		    </table>
		    </div>
		    </div>
</div>
<div class="col-md-4 col-lg-1 ">
</div>
</div>

 

