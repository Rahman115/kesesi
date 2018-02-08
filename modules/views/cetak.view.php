<?php

$pdf = $data['pdf'];

$data['pdf']->AddPage('P', 'A4');

$data['pdf']->SetFont('Arial', 'B', 16);

$data['pdf']->Cell(190, 10, 'LAPORAN TRANSAKSI PEMBAYARAN SISWA', 1, 0, 'C');
$data['pdf']->SetFont('Arial', 'B', 13);
$pdf->Ln();

$pdf->Ln();
$pdf->Cell(40, 10, 'NIS', 0, 0, 'L');
$pdf->Cell(50, 10, ': ' . $data['dataSiswa']->nis, 0, 0, 'L');
$pdf->Ln();
$pdf->Cell(40, 10, 'NAMA SISWA', 0, 0, 'L');
$pdf->Cell(50, 10, ': ' . $data['dataSiswa']->name, 0, 0, 'L');
$pdf->Ln();

$pdf->Ln();
$pdf->Cell(90, 10, 'STATUS PEMBAYARAN SISWA', 0, 0, 'L');
$pdf->Ln();
$data['pdf']->SetFont('Arial', 'B', 12);
// header table
$pdf->Cell(10, 10, 'NO', 1, 0, 'C');
$pdf->Cell(55, 10, 'TRANSAKSI', 1, 0, 'C');
$pdf->Cell(55, 10, 'BIAYA', 1, 0, 'C');
$pdf->Cell(70, 10, 'STATUS', 1, 0, 'C');

$pdf->Ln();
$data['pdf']->SetFont('Arial', '', 12);

$pdf->Cell(10, 10, '1', 1, 0, 'C');
$pdf->Cell(55, 10, 'JARIAH', 1, 0, 'C');
if ($data['harga']['jariah']->PRICE == null || empty($data['harga']['jariah']->PRICE) || $data['harga']['jariah']->PRICE == '') {
//    echo "Belum membayar";
    $pdf->Cell(55, 10, '0', 1, 0, 'R');
} else {
    $pdf->Cell(55, 10, 'Rp. ' . number_format($data['harga']['jariah']->PRICE, 0, ",", "."), 1, 0, 'R');
}
if (!empty($data['harga']['jariah']->PRICE) && $data['harga']['jariah']->PRICE == $data['set']->jariah) {
    $pdf->Cell(70, 10, 'LUNAS', 1, 0, 'L');
} else if (empty($data['harga']['jariah']->PRICE)) {
    $pdf->Cell(70, 10, "BELUM LUNAS - (" . number_format($data['set']->jariah, 0, ",", ".") . ")", 1, 0, 'L');
} else {
    $pdf->Cell(70, 10, "BELUM LUNAS - (" . number_format($data['set']->jariah - $data['harga']['jariah']->PRICE, 0, ",", ".") . ")", 1, 0, 'L');
}
$pdf->Ln();
$pdf->Cell(10, 10, '2', 1, 0, 'C');
$pdf->Cell(55, 10, 'PRAKTEK SMT GANJIL', 1, 0, 'C');
if ($data['harga']['sGanjil']->PRICE == null || empty($data['harga']['sGanjil']->PRICE) || $data['harga']['sGanjil']->PRICE == '') {
    $pdf->Cell(55, 10, '0', 1, 0, 'R');
} else {
    $pdf->Cell(55, 10, 'Rp. ' . number_format($data['harga']['sGanjil']->PRICE, 0, ",", "."), 1, 0, 'R');
}
if ($data['harga']['sGanjil']->PRICE == $data['set']->praktek) {
    $pdf->Cell(70, 10, 'LUNAS', 1, 0, 'L');
} else {

    $hasil = $data['set']->praktek - $data['harga']['sGanjil']->PRICE;
    $pdf->Cell(70, 10, "BELUM LUNAS - (" . number_format($hasil, 0, ",", ".") . ")", 1, 0, 'L');
}
$pdf->Ln();
$pdf->Cell(10, 10, '3', 1, 0, 'C');
$pdf->Cell(55, 10, 'PRAKTEK SMT GENAP', 1, 0, 'C');
if ($data['harga']['sGenap']->PRICE == null || empty($data['harga']['sGenap']->PRICE) || $data['harga']['sGenap']->PRICE == '') {
    $pdf->Cell(55, 10, '0', 1, 0, 'R');
} else {
    $pdf->Cell(55, 10, 'Rp. ' . number_format($data['harga']['sGenap']->PRICE, 0, ",", "."), 1, 0, 'R');
}
if ($data['harga']['sGenap']->PRICE == $data['set']->praktek) {
    $pdf->Cell(70, 10, 'LUNAS', 1, 0, 'L');
} else {
    $hasil = $data['set']->praktek - $data['harga']['sGenap']->PRICE;
    $pdf->Cell(70, 10, "BELUM LUNAS - (" . number_format($hasil, 0, ",", ".") . ")", 1, 0, 'L');
}
$pdf->Ln();
$pdf->Cell(10, 10, '4', 1, 0, 'C');
$pdf->Cell(55, 10, 'SPP', 1, 0, 'C');
if ($data['harga']['spp']->PRICE == null || empty($data['harga']['spp']->PRICE) || $data['harga']['spp']->PRICE == '') {
    $pdf->Cell(55, 10, '0', 1, 0, 'R');
} else {
    $pdf->Cell(55, 10, 'Rp. ' . number_format($data['harga']['spp']->PRICE, 0, ",", "."), 1, 0, 'R');
}
if ($data['harga']['spp']->PRICE == $data['set']->spp) {
    $pdf->Cell(70, 10, 'LUNAS', 1, 0, 'L');
} else {
    $hasil = $data['set']->spp - $data['harga']['spp']->PRICE;
    $pdf->Cell(70, 10, "BELUM LUNAS - (" . number_format($hasil, 0, ",", ".") . ")", 1, 0, 'L');
}

$data['pdf']->SetFont('Arial', 'B', 13);
$pdf->Ln();
$pdf->Ln();

$pdf->Cell(90, 10, 'LAPORAN PEMBAYARAN SISWA', 0, 0, 'L');
$pdf->Ln();
$data['pdf']->SetFont('Arial', 'B', 12);

// header table
$pdf->Cell(10, 10, 'NO', 1, 0, 'C');
$pdf->Cell(30, 10, 'TANGGAL', 1, 0, 'C');
$pdf->Cell(55, 10, 'TRANSAKSI', 1, 0, 'C');
$pdf->Cell(50, 10, 'BIAYA', 1, 0, 'C');
$pdf->Cell(45, 10, 'STATUS', 1, 0, 'C');
$pdf->Ln();
$data['pdf']->SetFont('Arial', '', 12);
$no = 1;
foreach ($data['siswa'] AS $key => $value) {
    $pdf->Cell(10, 10, $no, 1, 0, 'C');
    $no++;
    $pdf->Cell(30, 10, $value->date_transaksi, 1, 0, 'C');
    $pdf->Cell(55, 10, $value->status_transaksi, 1, 0, 'C');
    $pdf->Cell(50, 10, 'Rp. ' . number_format($value->price, 0, ",", "."), 1, 0, 'R');

    $v = explode('-', $value->exp);
    if (count($v) > 1 || $value->exp == 'LUNAS' || $value->exp == 'BELUM_LUNAS') {
//                                echo $v[0];    
        
        $pdf->Cell(45, 10, 'Telah Confirmasi', 1, 0, 'C');
    } else {
        
        $pdf->Cell(45, 10, 'Menunggu Confimasi', 1, 0, 'C');
    }
    
    $pdf->Ln();
}
$data['pdf']->Output();
?>