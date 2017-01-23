<?php
class Gestion_Publicaciones{

 
    function Create($titulo,$texto,$url_archivo,$id_producto,$autor){
        //instacioamos y nos conectamos a la  base de  datos
        $conexion=happy_BD::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //CAPTURAMOS LA  FECHA DEL SISTEMA
        $fecha_creacion=date("Y-m-d");
        
        
        //crear  el  quiery  que vamos a realizar.
        $consulta= "INSERT INTO publicacion (titulo,texto,url_archivo,id_producto,autor,fecha_creacion) values(?,?,?,?,?,?)";
        $query=$conexion->prepare($consulta);
        $query->execute(array($titulo,$texto,$url_archivo,$id_producto,$autor,$fecha_creacion));


	
        happy_BD::Disconnect();
    }



	
    function Readbyid($id_publicacion)
    {
        //instacioamos y nos conectamos a la  base de  datos
        $conexion=happy_BD::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        //crear  el  query  que vamos a realizar.
        $consulta= "SELECT * FROM publicacion WHERE id_publicacion=? ";
        $query=$conexion->prepare($consulta);
        $query->execute(array($id_publicacion));
        
        $resultado=$query->fetch(PDO::FETCH_BOTH);
        return $resultado;

        happy_BD::Disconnect();
    }



 	


    function Update($titulo,$texto,$id_producto,$autor,$id_publicacion){
    	$conexion=happy_BD::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $fecha_creacion=date("Y-m-d");

        $consulta= "UPDATE publicacion SET titulo=?,texto=?,id_producto=?,fecha_creacion=?,autor=? WHERE id_publicacion=?";
        $query=$conexion->prepare($consulta);
        $query->execute(array($titulo,$texto,$id_producto,$fecha_creacion,$autor,$id_publicacion));

        happy_BD::Disconnect();
    }
  function updatefile($url_archivo,$autor,$id_publicacion){
        $conexion=happy_BD::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $fecha_creacion=date("Y-m-d");

        $consulta= "UPDATE publicacion SET url_archivo=?, fecha_creacion=?,autor=? WHERE id_publicacion=?";
        $query=$conexion->prepare($consulta);
        $query->execute(array($url_archivo,$fecha_creacion,$autor,$id_publicacion));

        happy_BD::Disconnect();
    }


    function delete($id_publicacion){
    	$conexion = happy_BD:: connect();
    	$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    	$consulta= "DELETE FROM publicacion WHERE id_publicacion= ?";

    	$query =$conexion-> prepare($consulta);
        $query->$execute(array($id_publicacion));
       
        happy_BD::Disconnect();

    }
    function ReadAll()
    {
        //instacioamos y nos conectamos a la  base de  datos
        $conexion=happy_BD::Connect();
        $conexion->SetAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        //crear  el  query  que vamos a realizar.
        $consulta= "SELECT * FROM publicacion ORDER BY titulo";
        $query=$conexion->prepare($consulta);
        $query->execute();
        // devolmemos el resultado en un arreglo
        //Fetch:Es  el  resultado que arroja la   consultta   en forma   de vector   o matris  segun sea el caso
        //para  consultas donde arroja mas de un dato    el  fetch  debe  ir  acompañado   con la  palabra ALL
        $resultado=$query->fetchALL(PDO::FETCH_BOTH);
        return $resultado;

        happy_BD::Disconnect();
    }



    


	}



?>
