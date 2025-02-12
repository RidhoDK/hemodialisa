<?php
require('../fpdf186/fpdf.php');
include('../libs/koneksi.php');

// Membuat objek FPDF
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
// Menambahkan logo (Sesuaikan path dan ukuran logo)
$pdf->Image('../assets/img/logo.jpeg', 10, 10, 25);
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
$pdf->SetX(15); // Pastikan tabel mulai dari margin yang sesuai
$pdf->Cell(10, 10, 'No', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Nama Pasien', 1, 0, 'C', true);
$pdf->Cell(15, 10, 'No. RM', 1, 0, 'C', true);
$pdf->Cell(25, 10, 'Total Biaya', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Tanggal Pembayaran', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Metode Pembayaran', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Status Pembayaran', 1, 1, 'C', true); // 1,1 agar pindah baris

// Mengambil data dari database
$pdf->SetFont('Arial', '', 8);
$no = 1;
$id = $_GET["id_tagihan"];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_tagihan WHERE id_tagihan='$id'");

while ($data = mysqli_fetch_assoc($query)) {
    $pdf->SetX(15); // Pastikan setiap baris data juga mulai dari posisi yang sama
    $pdf->Cell(10, 10, $no++, 1, 0, 'C');
    $pdf->Cell(40, 10, $data['nama_pasien'], 1, 0, 'L');
    $pdf->Cell(15, 10, $data['no_rm'], 1, 0, 'C');
    $pdf->Cell(25, 10, $data['total_biaya'], 1, 0, 'C'); // Format angka
    $pdf->Cell(30, 10, $data['tanggal_pembayaran'], 1, 0, 'C');
    $pdf->Cell(30, 10, $data['metode_pembayaran'], 1, 0, 'C');
    $pdf->Cell(30, 10, $data['status_pembayaran'], 1, 1, 'C'); // Harus '1' agar pindah baris
}

// Ruang kosong sebelum tanda tangan
$pdf->Ln(40);

// Posisi tanda tangan
$pdf->Cell(300, 10, 'Yang Bertanggung Jawab', 0, 1, 'C');
$pdf->Ln(20);
$pdf->Cell(300, 10, '________________________', 0, 1, 'C'); // Garis tanda tangan
$pdf->Cell(300, 5, 'Nama Penanggung Jawab', 0, 1, 'C');

// Output PDF (Mode 'I' agar bisa direview di browser)
$pdf->Output('I', 'Laporan_tagihan_pasien.pdf');
