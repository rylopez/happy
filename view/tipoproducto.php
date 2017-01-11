<?php
$options="";
if ($_POST["elegido"]==2) {
    $options= '
     <input  type="text" placeholder="Talla Lenceria" name="talla"  required data-toggle="tooltip" title="Talla Lenceria" /> 
    ';    
}

echo $options;    
?>