<?php 
//El codigo comentado se debe  actualizar cuando este  la dasboard lista

//cambio casa 

  session_start();
 
 ?>
<!DOCTYPE html>
<html lang="Es">
<head>
  <title>Happy Sex and Life</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="recursos/css/estilo.css">
  <link rel="stylesheet" type="text/css" href="recursos/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="recursos/plugins/sweetalert/dist/sweetalert.css">
  <link rel="stylesheet" href="recursos/plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="recursos/plugins/bootstrap/css/bootstrap.min.css">
  <script src="recursos/plugins/bootstrap/js/jquery.min.js"></script>
  <script src="recursos/plugins/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" charset="utf8" src="recursos/plugins/datatable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="recursos/plugins/sweetalert/dist/sweetalert.min.js"></script>
 <script type="text/javascript">
    $(document).ready( function () {
              $('#datatable').DataTable({  
               "language": {               
               "url": "https://cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"       
                }
                });

       $('.menu a').hover(function() {
                $(this).stop().animate({
                   opacity: 1
                 }, 200);
                    }, function() {
               $(this).stop().animate({
                opacity: 0.3
                 }, 200);
              });
  $("#btnnuevouser").click(function(){
 var url = "../controller/usuarios.controller.php"; // El script a dónde se realizará la petición.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#nuevousuario").serialize(), // Adjuntar los campos del formulario enviado.
           success: function(data)
           {
               $("#e_nombre").html('');
               $("#e_apellido").html('');
               $("#e_ciudad").html('');
               $("#e_correo").html('');
               $("#e_clave1").html('');
               $("#e_clave2").html('');
               $("#e_edad").html('');
               $("#mensaje").html(data); // Mostrar la respuestas del script PHP.
           }
         });

    return false; // Evitar ejecutar el submit del formulario.
 });
  $("#tipoproducto").change(function () {
           $("#tipoproducto option:selected").each(function () {
            elegido=$(this).val();
            $.post("tipoproducto.php", { elegido: elegido }, function(data){
            $("#talla").html(data);
            });            
        });
   })
   <?php

                    if(isset($_GET["m"],$_GET["tm"])){
                  echo "swal({ title: '',   text: '".base64_decode($_GET["m"])."',   type: '".base64_decode($_GET["tm"])."',  imageUrl: 'recursos/logos/logo.png',imageSize: '200x120'});";

                  }
      ?>
     $('[data-toggle="tooltip"]').tooltip(); 
   });
 </script>
  
</head>
<body>
<nav class="navbar navbar-inverse" >
  
  
  
<div id="nav" class="container">
                   
  <ul class="nav nav-tabs " role="tablist">
    <li><a class="iconmenu" data-toggle="dropdown" ><i id ="menu" class="fa fa-bars lead" aria-hidden="true"></i></a>

   <ul id="mimenu" class="dropdown-menu">
      <div class="menu">
            <a class="yellow" href="#"><i  class="fa fa-home iconos" aria-hidden="true"></i><h4 class="letramenu"> Inicio</h4></a>
            <a class="pink" href="#"><i  class="fa fa-venus iconos" aria-hidden="true"></i> <h4 class="letramenu"> Para Ellas </h4></a>
            <a class="green" href="#"><i  class="fa fa-mars iconos" aria-hidden="true"></i> <h4 class="letramenu"> Para Ellos</h4></a>
            <a class="purple" href="#"><i  class="fa fa-transgender-alt iconos" aria-hidden="true"></i><h4 class="letramenu"> Sexo Inteligente</h4></a>
             <?php 
           
        if(!isset($_SESSION["id_usuario"])){  
            }else{
         include_once("components/menu.php");
         } 
            if(!isset($_SESSION["id_usuario"])){  ?>
            <a href="#" class="azulrey" data-toggle="modal" data-target="#myModal"><i  class="fa fa-sign-in iconos" aria-hidden="true"></i><h4 class="letramenu"> Iniciar Sesión</h4></a>
       <?php }else{
          ?>

    
          <a href="cerrarsesion.php" class="azulrey"> <i  id="iconos" class="fa fa-sign-out" aria-hidden="true"></i> <h4 class="letramenu"> Cerrar Sesión</h4></a>
      <?php  } ?>
           
            
        </div>
    </ul>
     </li> 
    <li><a href="#"><img src="recursos/logos/logo.png" style="width:60px;"></a></li>
    <li class="dropdown">
      <?php
      if(!isset($_SESSION["id_usuario"])){  
            }else{ ?>
    
    <a   data-toggle="dropdown" id="nomusu" > <?php echo "".($_SESSION["nombre"])." ".($_SESSION["apellido"]);?><i class="fa fa-angle-down" aria-hidden="true"></i></a>
    <ul class="dropdown-menu dropdown-menu-right">
      <li><a href="#">Actualizar mi perfil</a></li>
      <li class="divider"></li>
      <li><a href="cerrarsesion.php">Cerrar Sesión</a></li>      
    </ul>
      <?php } ?>
     </li>

 
          
  </ul>
  
 
</div>
     
    
    
  

     
</nav>

<div>
  <?php include_once("components/comp.pages.php") ?>
</div>
 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" >         
          
   <?php include_once("logueo.php") ?>      
       
    </div>
  </div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>