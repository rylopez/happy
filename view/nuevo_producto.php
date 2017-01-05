
 <div class="row contenedor">

<div class="col-sm-12 col-md-7 col-lg-9 formulario">
 
<div class="form-style-6">

 
  <form  id action="../controller/productos.controller.php" method="POST" enctype="multipart/form-data">
        <h3 >Nuevo Producto</h3>
        
        

          <input   type="text" placeholder="Referencia" name="referencia"  required  />
              
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

	
