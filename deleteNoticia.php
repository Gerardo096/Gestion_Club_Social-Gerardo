<?php 

borrar();
function borrar(){
    
  
    try{
          $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['pass']);
         
  
          $sql = $con->prepare("DELETE from noticias where id=:id");
          $sql->bindParam(":id", $id);
          $sql->execute();
        if ($sql->rowCount() > 0) {
           echo"Noticia borrada Correctamente" ;
        }
    }catch (PDOException $e) {
        echo $e;
    }
}




?>