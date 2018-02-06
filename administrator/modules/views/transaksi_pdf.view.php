	<?php 
	
	$exp = explode("/", $data['feel']);
$pdf = $data['pdf'];

$data['pdf']->AddPage('L', 'A4'); 

$data['pdf']->SetFont('Arial','B',16);

$data['pdf']->Cell(275,10,'LAPORAN DATA PEMBAYARAN PER BULAN',1,0,'C');
$data['pdf']->SetFont('Arial','B',13);
$pdf->Ln();

$pdf->Ln();
$pdf->Cell(30,10,'KELAS',0,0,'L');
$pdf->Cell(50,10,': ' . $exp[0],0,0,'L');
$pdf->Ln();
$pdf->Cell(30,10,'WALI KELAS',0,0,'L');
$pdf->Cell(50,10,': ' . $exp[1],0,0,'L');
$pdf->Ln();
$pdf->Cell(30,10,'TANGGAL',0,0,'L');
$pdf->Cell(50,10,': ' . date('d / F / Y'),0,0,'L');
$pdf->Ln();



$data['pdf']->SetFont('Arial','B',12);
// header table
$pdf->Cell(10,10,'NO',1,0,'C');
$pdf->Cell(35,10,'NIS',1,0,'C');
$pdf->Cell(70,10,'NAMA SISWA',1,0,'C');
$pdf->Cell(40,10,'SPP',1,0,'C');
$pdf->Cell(40,10,'SMT GANJIL',1,0,'C');
$pdf->Cell(40,10,'SMT GENAP',1,0,'C');
$pdf->Cell(40,10,'JARIAH',1,0,'C');
$pdf->Ln();

$data['pdf']->SetFont('Arial','',12);
// body table
$n = 1;
$t_spp = 0;
$t_smt_gj = 0;
$t_smt_gn = 0;
$t_jrh = 0;
foreach ($data['activ'] AS $val) {
$pdf->Cell(10,10,$n++,1,0,'C');
$pdf->Cell(35,10,$val[0]->nis,1,0,'C');
$pdf->Cell(70,10,$val[0]->name,1,0,'L');

if (empty($val[2])) {
	
                                    
									$pdf->Cell(40,10,'0',1,0,'R');
                                } else {
                                    $nominal = 0;
                                    for ($i = 0; $i < count($val[2]); $i++) {
//                                        echo ;
                                        $exp = explode('-', $val[2][$i]->tgl);
                                        $tm = date('m');
                                        if ($exp[1] == $tm) {
                                            $nominal += $val[2][$i]->nominal;
                                        }
//                                    var_dump();
                                    }
									$pdf->Cell(40,10,"Rp. " . number_format($nominal, "0", ",", "."),1,0,'R');
									
									$t_spp += $nominal;
                                    
//                                var_dump();
                                }


if ($val[3][0]->PRICE == NULL) {
$pdf->Cell(40,10,'0',1,0,'R');                                    
} else {
$pdf->Cell(40,10,"Rp. " . number_format($val[3][0]->PRICE, "0", ",", "."),1,0,'R');
$t_smt_gj += $val[3][0]->PRICE;
}

if ($val[4][0]->PRICE == NULL) {
$pdf->Cell(40,10,'0',1,0,'R');                                    
} else {
$pdf->Cell(40,10,"Rp. " . number_format($val[4][0]->PRICE, "0", ",", "."),1,0,'R');
$t_smt_gn += $val[4][0]->PRICE;
}


if ($val[1][0]->PRICE == NULL) {
    $pdf->Cell(40,10,'0',1,0,'R');
} else {
	$pdf->Cell(40,10,"Rp. " . number_format($val[1][0]->PRICE, "0", ",", "."),1,0,'R');
	$t_jrh += $val[1][0]->PRICE;
}

$pdf->Ln();	
}

$data['pdf']->SetFont('Arial','B',12);
// header table

$pdf->Cell(115,10,'TOTAL',1,0,'R');
$pdf->Cell(40,10,"Rp. " . number_format($t_spp, "0", ",", "."),1,0,'C');
$pdf->Cell(40,10,"Rp. " . number_format($t_smt_gj, "0", ",", "."),1,0,'C');
$pdf->Cell(40,10,"Rp. " . number_format($t_smt_gn, "0", ",", "."),1,0,'C');
$pdf->Cell(40,10,"Rp. " . number_format($t_jrh, "0", ",", "."),1,0,'C');
$pdf->Ln();

$data['pdf']->Output();

 // var_dump();
?>