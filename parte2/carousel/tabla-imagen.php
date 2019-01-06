<?php 
	
	include "conexion.php";

	$sql = "SELECT * FROM carrusel";
	$resultado = $conn->query($sql);


	echo "<table border = '1'> \n"; 
echo "<tr><td>imagen</td><td>enlace</td><td>estado</td><td>botones</td><td>cambio estado</td></tr> \n";
	 while($row = $resultado->fetch_assoc()) {
        echo '<tr><td><img src="'.$row['imagen'].'" height="100"/></td><td>'.$row['enlace']."</td><td>".$row['estado'].'</td>
        <td>
		<form action="update.php" method="POST">
		Enlace: <input type="text" name="url">
		<br>
		<input type="hidden" id="id_img" name="id_img" value="'.$row['Id_url'].'">
		<input type="submit" value="modificar">
		</form>

		<form action="delete.php" method="POST">
		<input type="hidden" id="id_img" name="id_img" value="'.$row['Id_url'].'">
		<input type="submit" value="eliminar">
		</form>

        </td><td>
		<form action="activar.php" method="POST">
		<input type="hidden" id="id_img" name="id_img" value="'.$row['Id_url'].'">
		<input type="submit" value="activar">
		</form>

		<form action="desactivar.php" method="POST">
		<input type="hidden" id="id_img" name="id_img" value="'.$row['Id_url'].'">
		<input type="submit" value="desactivar">
		</form></td></tr>' ;
    }

 ?>