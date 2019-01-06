<?php 
	
	include "conexion.php";

	$id_img = $_POST['id_img'];

	$sql = "DELETE FROM carrusel WHERE Id_url='$id_img'";
	$resultado = $conn->query($sql);

	if (mysqli_query($conn, $sql)) {
    	header('Location: tabla-imagen.php');
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

 ?>