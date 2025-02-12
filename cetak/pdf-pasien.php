<?php
require('../fpdf186/fpdf.php');
include '../koneksi.php';

// Membuat objek FPDF
$pdf = new FPDF('P', 'mm', 'A4');
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
$pdf->Cell(190, 10, 'Rincian Tagihan Pasien', 0, 1, 'C');
$pdf->Ln(5);

// Header Tabel
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetFillColor(200, 200, 200);
$pdf->SetX(8);
$pdf->Cell(7, 10, 'No', 1, 0, 'C', true);
$pdf->Cell(25, 10, 'Nama Pasien', 1, 0, 'C', true);
$pdf->Cell(12, 10, 'No RM', 1, 0, 'C', true);
$pdf->Cell(15, 10, 'Umur', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Jenis Kelamin', 1, 0, 'C', true);
$pdf->Cell(18, 10, 'Tanggal', 1, 0, 'C', true);
$pdf->Cell(15, 10, 'Durasi', 1, 0, 'C', true);
$pdf->Cell(15, 10, 'Tensi', 1, 0, 'C', true);
$pdf->Cell(18, 10, 'Berat Badan', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Diagnosa', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Obat', 1, 1, 'C', true);

// Mengambil data dari database
$pdf->SetFont('Arial', '', 8);
$no = 1;
$id = $_GET["id_pasien"];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_pasien WHERE id_pasien='$id'");

while ($data = mysqli_fetch_assoc($query)) {
  $pdf->SetX(8);
  $pdf->Cell(7, 10, $no++, 1, 0, 'C');
  $pdf->Cell(25, 10, $data['nama_pasien'], 1, 0, 'L');
  $pdf->Cell(12, 10, $data['no_rm'], 1, 0, 'C');
  $pdf->Cell(15, 10, $data['umur'], 1, 0, 'C');
  $pdf->Cell(20, 10, $data['jenis_kelamin'], 1, 0, 'C');
  $pdf->Cell(18, 10, $data['tanggal'], 1, 0, 'C');
  $pdf->Cell(15, 10, $data['durasi'], 1, 0, 'C');
  $pdf->Cell(15, 10, $data['tensi'], 1, 0, 'C');
  $pdf->Cell(18, 10, $data['berat_badan'], 1, 0, 'C');
  $pdf->Cell(30, 10, $data['diagnosa'], 1, 0, 'L');
  $pdf->Cell(20, 10, $data['obat'], 1, 1, 'L');
}

// Ruang kosong sebelum tanda tangan
$pdf->Ln(20);

// Posisi tanda tangan
$pdf->Cell(300, 10, 'Yang Bertanggung Jawab', 0, 1, 'C');
$pdf->Ln(20);
$pdf->Cell(300, 10, '________________________', 0, 1, 'C'); // Garis tanda tangan
$pdf->Cell(300, 5, 'Nama Penanggung Jawab', 0, 1, 'C');

// Output PDF (Mode 'I' agar bisa direview di browser)
$pdf->Output('I', 'Laporan_Pasien.pdf');
