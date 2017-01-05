<?php
$options="";
if ($_POST["elegido"]==2) {
    $options= '
     <input  type="text" placeholder="Talla Lenceria" name="talla"  required /> 
    ';    
}

echo $options;    
?>