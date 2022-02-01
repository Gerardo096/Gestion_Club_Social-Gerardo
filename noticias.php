<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Noticias</title>
</head>

<body>
    

<?php 
  $servidor = "localhost";
  $baseDatos = "clubsocial";
  $usuario = "root";
  $pass = "root";

  
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['pass']);
       

     $query = $con->prepare("SELECT * FROM noticias WHERE privado =1;");
     $query->execute();
     $data = $query->fetchAll();
        
        
        foreach ($data as $valores):
            
            echo '<div class= "divnoticia"><h3> '.$valores["titular"].'</h3><br><p>'.$valores["content"].'</p><br><p>'.$valores["fecha"].'</p></div>';
            endforeach;
    

?>





 

</body>

</html>