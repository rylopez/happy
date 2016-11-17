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
   <a  href="#"><img src="recursos/logos/logo.png" style="width: 10%;"></a>
  <a class="iconmenu" data-toggle="dropdown" ><i id ="menu" class="fa fa-bars lead" aria-hidden="true"></i></a>
   
 
   <ul class="dropdown-menu">
      <li class="dropdown-header">Dropdown header 1</li>
      <li><a href="#">HTML</a></li>
      <li><a href="#">CSS</a></li>
      <li><a href="#">JavaScript</a></li>
      <li class="divider"></li>
      <li class="dropdown-header">Dropdown header 2</li>
      <li><a href="#">About Us</a></li>
    </ul>
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