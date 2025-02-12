<?php
require('../fpdf186/fpdf.php'); // Pastikan file fpdf.php ada dalam folder yang sesuai
include '../koneksi.php'; // File koneksi database

// Membuat objek FPDF
$pdf = new FPDF('P', 'mm', 'A4'); // 'P' = Portrait, 'mm' = milimeter, 'A4' = ukuran kertas
$pdf->AddPage();
// Menambahkan logo (Sesuaikan path dan ukuran logo)
$pdf->Image('http://localhost:8080/dashboardpkl1/assets/img/logo.png', 10, 10, 25);
// (path, posisi X, posisi Y, lebar)

// Menambahkan alamat instansi di tengah
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 5, 'RUMAH SAKIT DR. R. SOEHARSONO', 0, 1, 'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(190, 5, 'Jl. Mayjen Sutoyo S No.408, Pelambuan, Kec. Banjarmasin Barat', 0, 1, 'C');
$pdf->Cell(190, 5, 'Kota Banjarmasin, Kalimantan Selatan 70129', 0, 1, 'C');
$pdf->Cell(190, 5, 'Telp: 0813-4652-0347', 0, 1, 'C');
$pdf->Ln(10); // Spasi setelah header

// Garis pemisah
$pdf->SetLineWidth(0.5);
$pdf->Line(10, 40, 200, 40);
$pdf->Ln(10);

// Set font untuk judul
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(200, 10, 'Hasil Laboratorium', 0, 1, 'C');
$pdf->Ln(5);

// Header Tabel
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetFillColor(200, 200, 200);
$pdf->Cell(10, 10, 'No', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Nama Pasien', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'No. RM', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Urea', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Kreatinin', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Hemoglobin', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Sebelum Hemodialisa', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Sesudah Hemodialisa', 1, 1, 'C', true); // 1,1 agar pindah ke baris berikutnya

// Mengambil data dari database
$pdf->SetFont('Arial', '', 8);
$no = 1;
$id= $_GET["id_hasillab"];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_hasillab WHERE id_hasillab='$id'");

while ($data = mysqli_fetch_assoc($query)) {
    $pdf->Cell(10, 10, $no++, 1, 0, 'C');
    $pdf->Cell(40, 10, $data['nama_pasien'], 1, 0, 'L');
    $pdf->Cell(20, 10, $data['no_rm'], 1, 0, 'C');
    $pdf->Cell(20, 10, $data['urea'], 1, 0, 'C');
    $pdf->Cell(20, 10, $data['Kreatinin'], 1, 0, 'C');
    $pdf->Cell(20, 10, $data['hemoglobin'], 1, 0, 'C');
    $pdf->Cell(30, 10, $data['sebelum_hd'], 1, 0, 'C');
    $pdf->Cell(30, 10, $data['sesudah_hd'], 1, 1, 'C'); // 1,1 agar ke baris berikutnya
}

// Ruang kosong sebelum tanda tangan
$pdf->Ln(45);

// Posisi tanda tangan
$pdf->Cell(300, 10, 'Yang Bertanggung Jawab', 0, 1, 'C');
$pdf->Ln(20);
$pdf->Cell(300, 10, '________________________', 0, 1, 'C'); // Garis tanda tangan
$pdf->Cell(300, 5, 'Nama Penanggung Jawab', 0, 1, 'C');

// Output PDF
$pdf->Output('I', 'Laporan_Hasil_Lab.pdf');
?>
