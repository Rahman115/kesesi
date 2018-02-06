<?php 
$pdf = $data['pdf'];

$data['pdf']->AddPage('P', 'A4'); 

$data['pdf']->SetFont('Arial','B',16);

$data['pdf']->Cell(185,10,'LAPORAN DATA PEMBAYARAN PER BULAN',1,0,'C');
$data['pdf']->SetFont('Arial','B',13);
$pdf->Ln();

$pdf->Ln();
$data['pdf']->SetFont('Arial','B',12);
// header table
$pdf->Cell(10,10,'NO',1,0,'C');
$pdf->Cell(35,10,'NIS',1,0,'C');
$pdf->Cell(80,10,'NAMA SISWA',1,0,'C');
$pdf->Cell(60,10,'TOTAL PEMBAYARAN',1,0,'C');
$pdf->Ln();

$data['pdf']->SetFont('Arial','',12);
// body table
$n = 1;
foreach ($data['activ'] AS $val) {
$pdf->Cell(10,10,$n++,1,0,'C');
$pdf->Cell(35,10,$val[0]->nis,1,0,'C');
$pdf->Cell(80,10,$val[0]->name,1,0,'C');
$pdf->Cell(60,10,'',1,0,'C');
$pdf->Ln();	
}



$data['pdf']->Output();

// var_dump($data['pdf']);
?>