<?php include "conexion.php"; 
  
  $sql = "SELECT imagen, enlace FROM carrusel WHERE estado = 1";
  $resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

    <head>
      <meta charset="utf-8">
      
      
      <link rel="stylesheet" href="css/craftyslide.css" />
    </head>

    <body>
      <div id="slideshow">
        <ul>

          <?php while($row = $resultado->fetch_assoc()) {
          echo ' 
          <li><a href="'.$row['enlace'].'">
            <img src="'.$row['imagen'].'" />
          </a>
          </li>';
        }
          ?>

          </ul>
      </div>   
      
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
      <script src="js/craftyslide.min.js"></script>
      
      <script>
        $("#slideshow").craftyslide();
      </script> 
    </body>
</html>