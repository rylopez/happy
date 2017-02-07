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
  
  <script src="//code.jquery.com/jquery-3.1.1.min.js"></script>

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
      $('#nav-icon').click(function(){
    $(this).toggleClass('animate-icon');
    $('#overlay').fadeToggle();
     });
       $('#overlay').click(function(){
       $('#nav-icon').removeClass('animate-icon');
        $('#overlay').toggle();
       });
   });
 </script>
  
</head>
<body>
<nav class="navbar navbar-inverse" >
  
  
  
<div id="nav" class="container">
                   
  <ul class="nav nav-tabs " role="tablist">
    <li><div id="nav-icon">

  <span></span>
  <span></span>
  <span></span>

</div>
</li>
    <li><a class="cd-nav-trigger cd-text-replace" href="#primary-nav" id="toggle">
          <span aria-hidden="true" class="cd-icon"></span></a></li>
    <li><a href="#"><img src="recursos/logos/logo.png" style="width:60px;"></a></li>
    <li class="dropdown">
      <?php
      if(!isset($_SESSION["id_usuario"])){  
            }else{ ?>
    
    <a   data-toggle="dropdown" id="nomusu" > <?php echo "".($_SESSION["nombre"])." ".($_SESSION["apellido"]);?><i class="fa fa-angle-down" aria-hidden="true"></i></a>
    <ul class="dropdown-menu dropdown-menu-right">
      <li><a href="index.php?p=<?php echo base64_encode("actualizar_usuario");?>&ui=<?php echo base64_encode($_SESSION["id_usuario"]); ?>">Actualizar mi perfil</a></li>
      <li class="divider"></li>
      <li><a href="cerrarsesion.php">Cerrar Sesión</a></li>      
    </ul>
      <?php } ?>
     </li>
          
  </ul> 
 
</div>
</nav>

<div id="overlay">

  <div>

    <ul>
      <li><a href="index.php?p=<?php echo base64_encode('')?>"><h2>Inicio</h2></a></li>
      4<li><a href="#"><h2>Para Ellas</h2></a></li>
      <li><a href="#"><h2>Para Ellos</h2></a></li>
      <li><a href="#"><h2>Sexo Inteligente</h2></a></li>
      <li><a href="#"><h2>Para Ellos</h2></a></li>
          <?php 
           
        if(!isset($_SESSION["id_usuario"])){  
            }else{
         include_once("components/menu.php");
         } 
            if(!isset($_SESSION["id_usuario"])){  ?>
            <li><a href="#" class="azulrey" data-toggle="modal" data-target="#myModal"><h2> Iniciar Sesión</h2></a></li>
       <?php }else{
          ?>
          <li><a href="cerrarsesion.php"><h2> Cerrar Sesión</h2></a></li>
      <?php  } ?>
    </ul>
 
  </div>

</div>


<div>
  <?php include_once("components/comp.pages.php") ?>
</div>
 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" >         
          
   <?php include_once("logueo.php") ?>      
       
    </div>
  </div>

<footer class="container-fluid text-center navbar-inverse">
  <img src="recursos/logos/logo.png" style="width:160px;">
</footer>

</body>
</html>