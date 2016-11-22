<?php 
  require_once("../model/db_conn.php");
  require_once("../model/productos.class.php");
  
  require_once("../model/proveedores.class.php");


?>


    <div class="container l5 m10 s12 " id="tabla">
		    <h4>GESTIONAR PRODUCTOS</h4>

		  
		    <a class="waves-effect black btn" href='dashboard.php?p=<?php echo base64_encode('nuevo_producto')?>'><i class='fa fa-shopping-basket'></i>    Nuevo Producto</a>
		


		    <table id="datatable" class="display">
		      <thead>
		        <tr>
		          <th>Referencia</th>
		          <th>Nombre</th>
		          <th>Valor Compra</th>
		          <th>Valor Venta</th>
		          <th>iva</th>
		          <th>Descuento</th>
		          <th>Cantidad Existente</th>
		          <th>Tipo Producto</th>
		          <th>Proveedor</th>
		          <th>Acciones </th>		          
		        </tr>
		      </thead>
		      <tbody>

		      <?php
		      $id_empresa= $_SESSION["id_empresa"];
		      $prod=Gestion_Productos::Readbyempresa($id_empresa);
		     

		      foreach ($prod as $row) {

		      	if($row["id_tipoproducto"]==1){
		          $tipopro = "Insumos";		          
		        }elseif($row["id_tipoproducto"]==2){
		        	$tipopro="Cosmeticos";
		        }elseif($row["id_tipoproducto"]==3){
		            $tipopro="Quimicos";
		        
		        }
		       
		        	$id_proveedor=$row['id_proveedor'];
		        	$consu=Gestion_Proveedores::ReadbyId($id_proveedor);
		        	$proveedor=$consu['razon_social'];


		        
		       echo "<tr>
		                <td>".$row["referencia"]."</td>
		                <td>".$row["nombre"]."</td>
		                <td>".$row["valor_compra"]."</td>
		                <td>".$row["valor_venta"]."</td>
		                <td>".$row["iva"]."</td>
		                <td>".$row["descuento"]."</td>
		                <td>".$row["cant_existente"]."</td>
		                <td>".$tipopro."</td>
		                <td>".$proveedor."</td>
		                <td>

		                  <a href='ActualizarProducto.php?ui=".base64_encode($row["id_productos"])."'><i class='fa fa-pencil'></i></a>
		                  


		                </td>
		              </tr>";
		      }

		      ?>
		      </tbody>
		
		    </table>
	</div>
	
 

