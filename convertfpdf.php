<?php
require('html2fpdf/html2pdf.php');
include 'dbh.php';
$reportid=$_GET['ID'];
$sql = "SELECT * FROM `Sql1062326_3`.`laboratorio` WHERE `ID`='".$reportid."'";
$result = mysql_query($sql);
$dataarray = array();
while ($row = mysql_fetch_assoc($result)){
	array_push($dataarray, $row);
}
$dest="http://www.cscenterprise.it/enterprise_commands_api/uploadedgif/";
$pdf=new PDF_HTML();
 
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);
 
$pdf->AddPage();
//$pdf->Image('images/background.png', 0, 0, $pdf->w, $pdf->h);
$pdf->SetFont('Arial','',12);
//$pdf->WriteHTML('<para><h1>PHPGang Programming Blog, Tutorials, jQuery, Ajax, PHP, MySQL and Demos</h1><br>
//Website: <u>www.phpgang.com</u></para><br><br>How to Convert HTML to PDF with fpdf example');
 
//$pdf->SetFont('Arial','',7); 
$pdf->SetXY(9,35);
$pdf->Cell(7,7,"Scheda Tecnica Attrezzatura Modello: ".$dataarray[0]['MODELLO']." -  Matricola: ".$dataarray[0]['MATRICOLA']."");
$immagine="images/".$dataarray[0]['MODELLO'].".jpg";
if(file_exists($immagine)){$pdf->Image($immagine,29,95,200,100);}else {$pdf->Image("images/noimg.jpg",29,95,200,100); }
//$pdf->Image($immagine,9,45,200,100);
$pdf->SetXY(9,45);
$pdf->Cell(10,7,"Tipologia: ".$dataarray[0]['TIPOLOGIA']);
$pdf->SetXY(9,55);
$pdf->Cell(10,7,"Colore di stampa: ".$dataarray[0]['COLORE']); 
$pdf->SetXY(9,65);
$pdf->Cell(10,7,"Formato A4: ".$dataarray[0]['A4']); 
$pdf->SetXY(9,70);
$pdf->Cell(10,7,"Formato A3: ".$dataarray[0]['A3']); 
$pdf->SetXY(9,75);
$pdf->Cell(10,7,"Configurazione: ".$dataarray[0]['CONFIGURAZIONE']);
$pdf->SetXY(9,80);
$pdf->Cell(10,7,"Provenienza: ".$dataarray[0]['PROVENIENZA']);
$pdf->SetXY(9,85);
$pdf->Cell(10,7,"Destinazione: ".$dataarray[0]['DESTINAZIONE']);
$pdf->SetXY(9,95);
$pdf->Cell(10,7,"Contatore Bianco e nero: ".$dataarray[0]['CONTATOREBK']);
if($dataarray[0]['COLORE']=="CYMK"){$pdf->SetXY(9,95);$pdf->Cell(10,6,"Contatore Quadricomia: ".$dataarray[0]['CONTATORECYMK']);}
$pdf->SetXY(9,110);
$pdf->Cell(10,5,"Condizione: ".$dataarray[0]['CONDIZIONE']);
$pdf->SetXY(9,125);
$note=rawurldecode($dataarray[0]['NOTE']);
$pdf->MultiCell(80,5,"Note aggiuntive: ".$note);
$pdf->SetXY(9,130);
$pdf->SetFont('Arial','B',6);
$pdf->Output(); 
?>