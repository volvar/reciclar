<?php
require('fpdf.php');
require('conexion.php');
$ultimaID = 0;
$sql = "SELECT * FROM noticia ORDER BY ID_NOTICIA DESC";
$sql2 ="SELECT * FROM noticia ORDER BY ID_NOTICIA DESC";
$resultado1 = $conn->query($sql);
$resultado2 = $conn->query($sql);
$resultado3 = $conn->query($sql);
$resultado4 = $conn->query($sql);
$resultado5 = $conn->query($sql);

$resultado6 = $conn->query($sql2);
$resultado7 = $conn->query($sql2);
$resultado8 = $conn->query($sql2);
$resultado9 = $conn->query($sql2);
$resultado10 = $conn->query($sql2);

//datos del select

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('https://lolstatic-a.akamaihd.net/frontpage/apps/prod/LolGameInfo-Harbinger/es_AR/8588e206d560a23f4d6dd0faab1663e13e84e21d/assets/assets/images/gi-landing-top.jpg',60,8,90);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->cell(190,10,'footer',1);
   
}
}
$cont1 = 0;
$cont2 = 0;
$cont3 = 0;
$cont4 = 0;
$cont5 = 0;

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetRightMargin(12);
$pdf->SetFont('Times','',12);
$pdf->Ln(40);
//tabla
// fila 1

$pdf->cell(90,78,'',1);
$pdf->cell(90,78,'',1);
$pdf->Ln(0);
while($fila = $resultado1->fetch_Assoc()){
if ($cont3 < 2) {
    $pdf->cell(90,6,$fila['CATEGORIA'],1);
    $cont3++;
    }
}
$cont3 = 0;

while($fila1 = $resultado2->fetch_Assoc()){
    if ($cont3 < 2) {
        if ($cont1==0) {
           $pdf->Image($fila1['IMAGEN'],67,76,33);
            $cont1++;
        }
        if ($cont1==1) {
           $pdf->Image($fila1['IMAGEN'],157,76,33);
        }
        $cont3++;
    }
}

$cont3 = 0;

$pdf->Ln(6);
$pdf->SetFont('Times','',15);
while($fila2 = $resultado3->fetch_Assoc()){
if ($cont3 < 2) {
    $pdf->cell(90,6,$fila2['TITULO'],10);
    $cont3++;
    }
}
$cont3 = 0;

$pdf->SetFont('Times','',10);
$pdf->Ln(-13);
while($fila3 = $resultado4->fetch_Assoc()){
    if ($cont3 < 2) {
    $pdf->cell(90,70,$fila3['CUERPO'],10);
    $cont3++;
    }
}
$cont3 = 0;

$pdf->Ln(80);
while($fila4 = $resultado5->fetch_Assoc()){
if ($cont3 < 2) {
    $pdf->cell(90,6,$fila4['FECHA'],10);
        if($cont2 ==1){
            $pdf->Image($fila4['QR'],170,127,20);
            $ultimaID = $fila4['ID_NOTICIA'];
        }

        if ($cont2==0) {
        $pdf->Image($fila4['QR'],79,127,20);
        $cont2= 1;
        $ultimaID = $fila4['ID_NOTICIA'];
        }

        

    $cont3++;
    }
}
$cont3 = 0;

$pdf->Ln(6);
//fila 2
$pdf->cell(90,78,'',1);
$pdf->cell(90,78,'',1);
$pdf->Ln(0);
while($fila5 = $resultado6->fetch_Assoc()){
if ($cont3 < 2) {
    if ($fila5['ID_NOTICIA']<$ultimaID) {
        $pdf->cell(90,6,$fila5['CATEGORIA'],1);
        $cont3++;
        }
    }
}
$cont3 = 0;

while($fila6 = $resultado7->fetch_Assoc()){
    if ($cont3 < 2) {
        if ($cont5==1) {
           $pdf->Image($fila6['IMAGEN'],157,155,33);
            
        }
        if ($fila6['ID_NOTICIA']<$ultimaID) {
        if ($cont5==0) {
           $pdf->Image($fila6['IMAGEN'],67,155,33);
            $cont5++;
        }
        
        $cont3++;
    }
  }
}

$cont3 = 0;

$pdf->Ln(6);
$pdf->SetFont('Times','',15);
while($fila7 = $resultado8->fetch_Assoc()){
    if ($fila7['ID_NOTICIA']<$ultimaID) {
if ($cont3 < 2) {
    $pdf->cell(90,6,$fila7['TITULO'],10);
    $cont3++;
    }
}
}


$pdf->SetFont('Times','',10);
$pdf->Ln(-13);
while($fila8 = $resultado9->fetch_Assoc()){
    if ($fila8['ID_NOTICIA']<$ultimaID) {
    if ($cont3 < 2) {
    $pdf->cell(90,70,$fila8['CUERPO'],10);
    $cont3++;
    }
}
}
$cont3 = 0;
$cont2 = 0;
$pdf->Ln(80);
while($fila9 = $resultado10->fetch_Assoc()){
if ($cont3 < 2) {
    if ($fila9['ID_NOTICIA']<$ultimaID) {
    $pdf->cell(90,6,$fila9['FECHA'],10);
        
        if ($cont4==1){
            $pdf->Image($fila9['QR'],169,205,20);
            $ultimaID = $fila9['ID_NOTICIA'];
        }
        if ($cont4==0) {
        $pdf->Image($fila9['QR'],79,206,20);
        $cont4= 1;
        $ultimaID = $fila9['ID_NOTICIA'];
        }

        
        $ultimaID = $fila9['ID_NOTICIA'];
    $cont3++;
    }
}
}
$cont3 = 0;

//fin tabla
$pdf->Output();
?>