
 <div class="row contenedor">
<div class="col-md-3 col-lg-2 ">
</div>
<div class="col-sm-12 col-md-7 col-lg-9 formulario">
 
<div class="form-style-6">

 
  <form  id action="../controller/productos.controller.php" method="POST" enctype="multipart/form-data">
        <h3 >Nuevo Producto</h3>
        
        

          <input   type="text" placeholder="Referencia" name="referencia"  required  data-toggle="tooltip"  title="Referencia"/>
              
            <input  type="text" placeholder="Nombre" name="nombre"  required data-toggle="tooltip"  title="Nombre" />             
            
            <input   type="number" name="valor_compra" placeholder="Valor Compra" required data-toggle="tooltip"  title="Valor Compra" />

            <input   type="number" name="valor_venta" placeholder="Valor Venta" required  data-toggle="tooltip"  title="Valor Venta"/>

            <input   type="number" name="descuento" placeholder="Descuento" required data-toggle="tooltip"  title="Porcentaje Descuento" />

            <input   type="number" name="iva" placeholder="Iva" required data-toggle="tooltip"  title="Porcentaje Iva" />

            <input   type="number" name="cantidad" placeholder="Cantidad Existentes" required data-toggle="tooltip"  title="Cantidad De existencias"/>
            <br>
            <label>Adjunte imagen 1</label>
            <input   type="file" name="foto1"  required data-toggle="tooltip"  title="Imagen Producto" />
            <label>Adjunte imagen 2</label>
            <input   type="file" name="foto2"  required data-toggle="tooltip"  title="Imagen Producto" />
            <label>Adjunte imagen 3</label>
            <input   type="file" name="foto3"  required data-toggle="tooltip"  title="Imagen Producto" />

            <select    name="sexo"  required  data-toggle="tooltip"  title="publico Objetivo">
                    <option value="" disabled selected>Publico Objectivo</option>
                    <option value="hombre">Hombres</option>
                    <option value="mujer" >Mujeres</option>
                    <option value="indiferente" >Indiferente</option>
                                        
                </select>

             

            <select    name="id_tipoproducto" id="tipoproducto" required data-toggle="tooltip"  title="Tipo de Producto">
                    <option value="" disabled selected>Seleccione tipo producto</option>
                    <option value="1">Salud Sexual</option>
                    <option value="2" >Lenceria</option>
                    <option value="3" >Juguetes</option>
                    <option value="4" >Estimulantes</option>
                    <option value="5" >Otros</option>                    
                </select>
            <div id="talla"></div>
             <input type="hidden" name="autor" value="<?php echo ($_SESSION["nombre"])." ".($_SESSION["apellido"]); ?>">
            <textarea name="descripcion" placeholder="Descripcion Producto" COLS=100 ROWS=30 data-toggle="tooltip"  title="Descripcion detallada del Producto"></textarea>       



      <button class="guardar"   type="botton" name="acc" value="c">Guardar</button>
      <a  class=" btn cancelar" href="index.php?p=<?php echo base64_encode("gestion_productos"); ?>">Cancelar</a>
            
  </form>
  </div>
  </div>
  <div class="col-md-4 col-lg-1 ">
</div>
  </div>

	
