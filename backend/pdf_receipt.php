<?php
$message = $_GET['message'];
$status = $_GET['status'];
$transaction_id = $_GET['transaction_id'];
// $datetime_2 = date("D d M,y");
$datetime =  date('D d M,y H:i:s A');
require('/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(100,10,'RECEIPT');
 $pdf->Ln(10);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,10,'Mykanta Inc. American House, Accra-Central, Ghana.');
 $pdf->Ln(10);
$pdf->Cell(140,10,'Date : '.$datetime);
$pdf->Cell(10,10,'Transaction ID : #'.$transaction_id);
 $pdf->Ln(10);
 $pdf->SetFont('Arial','B',14);
 $pdf->Cell(60,10,'BILL TO'); 
 $pdf->Ln(5);
  $pdf->SetFont('Arial','B',10);
 $pdf->Cell(100,10,'Edwards Samuel'); 
 $pdf->Ln(10);
 $pdf->SetFont('Arial','B',14);
 $pdf->Cell(100,10,'ITEMS');
  $pdf->Ln(5);
  $pdf->SetFont('Arial','B',10);
 $pdf->Cell(100,10,'Loafer Shoe'); 
  $pdf->Ln(10);
 $pdf->SetFont('Arial','B',14);
 $pdf->Cell(100,10,'AMOUNT');
   $pdf->Ln(5);
  $pdf->SetFont('Arial','B',10);
 $pdf->Cell(100,10,'GHS 20.00'); 
//$pdf->Cell(63,10,'Date : '.$datetime,0,1,'C');
$pdf->Output();
?>