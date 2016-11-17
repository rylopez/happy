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