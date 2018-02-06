<?php

$pdf = $data['pdf'];

$data['pdf']->AddPage('P', 'A4');

$data['pdf']->SetFont('Arial', 'B', 16);

$data['pdf']->Cell(185, 10, 'LAPORAN DATA PEMBAYARAN', 1, 0, 'C');
$pdf->Ln();

$pdf->Ln();
$data['pdf']->SetFont('Arial', 'B', 12);
// Deskrip identitas sisea
$pdf->Cell(40, 10, 'NIS', 0, 0, 'L');
$pdf->Cell(40, 10, ':' . $data['siswa']->nis, 0, 0, 'L');
$pdf->Ln();
$pdf->Cell(40, 10, 'NAMA SISWA', 0, 0, 'L');
$pdf->Cell(40, 10, ':' . $data['siswa']->name, 0, 0, 'L');
$pdf->Ln();

$pdf->Ln();
$data['pdf']->SetFont('Arial', 'B', 12);
$pdf->Cell(80, 10, 'Data Pembayaran SPP', 0, 0, 'L');
$pdf->Ln();

$data['pdf']->SetFont('Arial', 'B', 12);
// header table
$pdf->Cell(10, 10, 'NO', 1, 0, 'C');
$pdf->Cell(45, 10, 'TANGGAL', 1, 0, 'C');
$pdf->Cell(60, 10, 'TOTAL PEMBAYARAN', 1, 0, 'C');
$pdf->Cell(50, 10, 'STATUS', 1, 0, 'C');
$pdf->Ln();

$no = 1;
$data['pdf']->SetFont('Arial', '', 12);
foreach ($data["tr"] as $transaksi) {
    if ($transaksi->status_transaksi == 'SPP') {

        // header table
        $pdf->Cell(10, 10, $no, 1, 0, 'C');
        $pdf->Cell(45, 10, $transaksi->date_transaksi, 1, 0, 'C');
        $pdf->Cell(60, 10, 'Rp.' . number_format($transaksi->price, 2, ",", "."), 1, 0, 'C');
        $x = explode('-', $transaksi->exp);
        $pdf->Cell(50, 10, $x[0], 1, 0, 'C');
        $pdf->Ln();
        $no++;
    }
}

$pdf->Ln();
$data['pdf']->SetFont('Arial', 'B', 12);
$pdf->Cell(80, 10, 'Data Pembayaran Jariah', 0, 0, 'L');
$pdf->Ln();
$data['pdf']->SetFont('Arial', 'B', 12);
// header table
$pdf->Cell(10, 10, 'NO', 1, 0, 'C');
$pdf->Cell(45, 10, 'TANGGAL', 1, 0, 'C');
$pdf->Cell(60, 10, 'TOTAL PEMBAYARAN', 1, 0, 'C');
$pdf->Cell(50, 10, 'STATUS', 1, 0, 'C');
$pdf->Ln();
$no = 1;
$data['pdf']->SetFont('Arial', '', 12);
foreach ($data["tr"] as $transaksi) {
    if ($transaksi->status_transaksi == 'JARIAH') {

        // header table
        $pdf->Cell(10, 10, $no++, 1, 0, 'C');
        $pdf->Cell(45, 10, $transaksi->date_transaksi, 1, 0, 'C');
        $pdf->Cell(60, 10, 'Rp.' . number_format($transaksi->price, 2, ",", "."), 1, 0, 'C');
        $x = explode('-', $transaksi->exp);
        $pdf->Cell(50, 10, $x[0], 1, 0, 'C');
        $pdf->Ln();
    }
}

$pdf->Ln();
$data['pdf']->SetFont('Arial', 'B', 12);
$pdf->Cell(80, 10, 'Data Pembayaran Praktek', 0, 0, 'L');
$pdf->Ln();

$data['pdf']->SetFont('Arial', 'B', 12);
// header table
$pdf->Cell(10, 10, 'NO', 1, 0, 'C');
$pdf->Cell(40, 10, 'TANGGAL', 1, 0, 'C');
$pdf->Cell(55, 10, 'TOTAL PEMBAYARAN', 1, 0, 'C');
$pdf->Cell(45, 10, 'SEMESTER', 1, 0, 'C');
$pdf->Cell(45, 10, 'STATUS', 1, 0, 'C');
$pdf->Ln();
$no = 1;
$data['pdf']->SetFont('Arial', '', 12);
foreach ($data["tr"] as $transaksi) {
    if ($transaksi->status_transaksi == 'PRAKTEK') {

        // header table
        $pdf->Cell(10, 10, $no++, 1, 0, 'C');
        $pdf->Cell(40, 10, $transaksi->date_transaksi, 1, 0, 'C');
        $pdf->Cell(55, 10, 'Rp.' . number_format($transaksi->price, 2, ",", "."), 1, 0, 'C');
        if ($transaksi->jenis_transaksi == 'PRAKTEK_GENAP') {
            $smt = "GENAP";
        } else {
            $smt = "GANJIL";
        }
        $pdf->Cell(45, 10, $smt, 1, 0, 'C');
        $x = explode('-', $transaksi->exp);

        $pdf->Cell(45, 10, $x[0], 1, 0, 'C');
        $pdf->Ln();
    }
}


$data['pdf']->Output();
?>