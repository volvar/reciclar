<?php 

	include "conexion.php";

	$enlace = $_POST['url'];
	$ruta="files/";//ruta carpeta donde queremos copiar las imágenes
	$tiempo = time();
	$uploadfile_temporal=$_FILES['imagen']['tmp_name'];
	$extension = ".jpeg";
	$namefinal = $ruta.$tiempo.$extension;

	if (is_uploaded_file($uploadfile_temporal))
	{
	    move_uploaded_file($uploadfile_temporal,$namefinal);
	}
	else
	{
	echo "error";
	}

	$sql = "INSERT INTO carrusel (enlace , imagen)
			VALUES ('$enlace' , '$namefinal')";

	if ($conn->query($sql) === TRUE) {
    header('Location: form-insert.html');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

 ?>