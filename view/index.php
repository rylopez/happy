<?php 
//El codigo comentado se debe  actualizar cuando este  la dasboard lista

//cambio casa 

  session_start();
 
 ?>
<!DOCTYPE html>
<html lang="Es">
<head>
  <title>Happy Sex and Live</title>
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
 <?php

                    if(isset($_GET["m"],$_GET["tm"])){
                  echo "swal({ title: '',   text: '".base64_decode($_GET["m"])."',   type: '".base64_decode($_GET["tm"])."',  imageUrl: 'recursos/logos/logo.png',imageSize: '200x120'});";

                  }
      ?>
   });
 </script>
  
</head>
<body>

<nav class="navbar navbar-inverse" >
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><a class="navbar-brand" href="#"><img src="recursos/logos/logo.png" style="width: 18%; margin-top:-15px"></a></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-venus" aria-hidden="true"></i> Para Ellas</a></li>
        <li><a href="#"><i class="fa fa-mars" aria-hidden="true"></i> Para Ellos</a></li>
        <li><a href="#"><i class="fa fa-transgender-alt" aria-hidden="true"></i> Sexo Inteligente</a></li>
        <?php 

           
        if(!isset($_SESSION["id_usuario"])){  
            }else{
         include_once("components/menu.php");
         } ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php 

           
            if(!isset($_SESSION["id_usuario"])){  ?>
            <li><a href="#"  data-toggle="modal" data-target="#myModal"><i class="fa fa-sign-in" aria-hidden="true"></i> Iniciar Sesión</a></li>
       <?php }else{
          ?>
          <li><a href="cerrarsesion.php"> <i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar Sesión</a></li>
      <?php  } ?>
        
      </ul>
    </div>
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