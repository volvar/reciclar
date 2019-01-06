<?php    
/*
 * PHP QR Code encoder
 *
 * Exemplatory usage
 *
 * PHP QR Code is distributed under LGPL 3
 * Copyright (C) 2010 Dominik Dzienia <deltalab at poczta dot fm>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 */
    
    
    
    include "qrlib.php";  
    require('conexion.php');
    
  
    $CONT=0;
    $ruta="files/";//ruta carpeta donde queremos copiar las imágenes
    $tiempo = time();
$extension = ".png";
    $select = $sql = "SELECT * FROM noticia";
    $resultado1 = $conn->query($select);

    while($fila = $resultado1->fetch_Assoc()){
if ($fila['QR'] == "") {

    $errorCorrectionLevel = 'L';   
    $matrixPointSize = 4;
    
        
        $ID = $fila['ID_NOTICIA'];

        $filename = $ruta.$CONT.$tiempo.$extension;
        //$insert = "INSERT INTO noticia (QR)
            //VALUES ('$filename') WHERE ID_NOTICIA = '$ID'";
        $sql = "UPDATE noticia SET QR='$filename' WHERE ID_NOTICIA='$ID'";
        
        QRcode::png($fila['CUERPO'], $filename, $errorCorrectionLevel, $matrixPointSize, 2); 
        if ($conn->query($sql) === TRUE) {
    echo "dato insertado <br>";
    } 

        $CONT++;
    }
}
header('Location: tabla-noticia.php');

        
    //display generated file
        
   

    