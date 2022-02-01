<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Noticias</title>
</head>
<body>

<form method="post" action="insertarNoticias.php">
        <fieldset>
            <p>
                <label> Titular de la Noticia
                <input type="text" id= "titular"name="titular" required />
            </label>
            </p>
            <p>
                <label> Contenido de la Noticia:
                    <textarea id="contenido" name="contenido" rows="10" cols="70"></textarea>
            </label>
            </p>
            <p>
                <label> Noticia privada:
                <input type="checkbox" id= "privacidad"name="privacidad"/>
            </label>
            </p>
            <p><input type="submit" value="Crear"></p>

        </fieldset>

    </form>

<?php
$servidor = "localhost";
$baseDatos = "clubsocial";
$usuario = "root";
$pass = "root";


if(isset($_POST['titular']) && isset($_POST['contenido'])){
    insertarNoticia();
}
$titular="";
$contenido="";


function insertarNoticia()
{
$titular= $_POST["titular"];
$contenido=$_POST["contenido"];
$fecha=date("d-m-Y H:i");
if (isset($_POST['privacidad'])){
    $privacidad="0";
    }else{
        $privacidad="1";
    }

    
    try {
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['pass']);
        $sql = $con->prepare("INSERT into noticias values(null,:titular,:content,:fecha,:privacidad)");
        $sql->bindParam(":titular", $titular);
        $sql->bindParam(":content", $contenido);
        $sql->bindParam(":fecha", $fecha);
        $sql->bindParam(":privacidad", $privacidad);
        $sql->execute();
        
        
        
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    
    
}




?>
<?php 
  $servidor = "localhost";
  $baseDatos = "clubsocial";
  $usuario = "root";
  $pass = "root";

  
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['pass']);
       

     $query = $con->prepare("SELECT * FROM noticias");
     $query->execute();
     $data = $query->fetchAll();
        
        
        foreach ($data as $valores):
            
            echo '<div class= "divnoticia"><h3> '.$valores["titular"].'</h3><br><p>'.$valores["content"].'</p><br><p>'.$valores["fecha"].'</p></div>';
            echo ' <button><a style="text-decoration: none; color: black;" href="editarNoticia.php/?id='.$valores["id_noticia"].'">Editar</a></button>';
            echo ' <button><a style="text-decoration: none; color: black;" href="deleteNoticia.php/?id='.$valores["id_noticia"].'">Borrar</a></button>';
            endforeach;
    

?>
</body>

</html>
 