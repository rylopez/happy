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
  <link rel="stylesheet" href="recursos/plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="recursos/plugins/bootstrap/css/bootstrap.min.css">
  <script src="recursos/plugins/bootstrap/js/jquery.min.js"></script>
  <script src="recursos/plugins/bootstrap/js/bootstrap.min.js"></script>
  
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
          <li><a href="#" <i class="fa fa-sign-out" aria-hidden="true"></i><i class="fa fa-sign-in" aria-hidden="true"></i> Cerrar Sesión</a></li>
      <?php  } ?>
        
      </ul>
    </div>
  </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="https://placehold.it/1200x400?text=IMAGE" alt="Image">
        <div class="carousel-caption">
          <h3>Sell $</h3>
          <p>Money Money.</p>
        </div>
      </div>

      <div class="item">
        <img src="https://placehold.it/1200x400?text=Another Image Maybe" alt="Image">
        <div class="carousel-caption">
          <h3>More Sell $</h3>
          <p>Lorem ipsum...</p>
        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
  
<div class="container text-center">
  <h3>What We Do</h3><br>
  <div class="row">
    <div class="col-sm-4">
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      <p>Current Project</p>
    </div>
    <div class="col-sm-4">
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      <p>Project 2</p>
    </div>
    <div class="col-sm-4">
      <div class="well">
       <p>Some text..</p>
      </div>
      <div class="well">
       <p>Some text..</p>
      </div>
    </div>
  </div>
</div><br>
 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" >
    <div id="mimodal" class="modal-dialog modal-md" width="410" >     
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <img  id="imgmodal" src="recursos/logos/logo.png" class="img-rounded" alt="Cinque Terre" width="504" >
      <form>
      <div id="loguear"class="row">
      <div class="col-sm-8">
      <label for="focusedInput">Usuario</label>
      <input class="form-control" id="focusedInput" type="email" required>
      <label for="focusedInput">Clave</label>
      <input class="form-control" id="focusedInput" type="password" required>
      </div>
      </div>
      </form>
          
          
         
       
    </div>
  </div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>