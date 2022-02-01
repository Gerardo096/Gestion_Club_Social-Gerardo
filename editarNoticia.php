<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    
    <title>Editar Noticia</title>
</head>

<body>
<form method="post" action="editarNoticias.php">
        <fieldset>
            <p>
                <label> Nuevo Titular de la Noticia
                <input type="text" id= "titular"name="titular" required />
            </label>
            </p>
            <p>
                <label> Nuevo Contenido de la Noticia:
                    <textarea id="contenido" name="contenido" rows="10" cols="70"></textarea>
            </label>
            </p>
            <p><input type="submit" value="Crear"></p>

        </fieldset>

    </form>

<?php 
editarNoticia();
function editarNoticia(){
    $ntitular= $_POST["titular"];
    $ncontenido=$_POST["contenido"];
  
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['pass']);
       

     $query = $con->prepare("UPDATE noticias  set titular=$ntitular , content=$ncontenido, where id=id;");
     $query->execute();
     
        
    
} 

?>





 

</body>

</html>