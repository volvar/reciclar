<?php 
	
	include "conexion.php";

	$sql = "SELECT * FROM noticia";
	$resultado = $conn->query($sql);


	echo "<table border = '1'> \n"; 
echo "<tr><td>imagen</td><td>titulo</td><td>resumen</td><td>cuerpo</td><td>fecha</td><td>categoria</td><td>QR</td></tr> \n";
	 while($row = $resultado->fetch_assoc()) {
        echo '<tr><td><img src="'.$row['IMAGEN'].'" height="100"/></td><td>'.$row['TITULO']."</td><td>".$row['RESUMEN'].'</td>
        <td>'
		.$row['CUERPO'].'
        </td>
		<td>'
		.$row['FECHA'].'
        </td>
        <td>'
		.$row['CATEGORIA'].'
        </td>
        <td><img src="'.$row['QR'].'" height="100"/></td>
        </tr>' ;
    }

    echo '
	<form action="index.php" method="POST">
		
		<input type="submit" value="volver al inicio">
	</form>
    ';

 ?>