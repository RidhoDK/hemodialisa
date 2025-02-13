<?php
ob_start(); // Hindari output sebelum PDF dibuat
require('../fpdf186/fpdf.php');
include('../libs/koneksi.php');

// Periksa koneksi database
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Membuat objek FPDF dalam mode **Potrait (P)**
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
$pdf->Cell(190, 10, 'Resep', 0, 1, 'C');
$pdf->Ln(5);

// Geser tabel lebih ke tengah
$margin_kiri = 10;
$pdf->SetX($margin_kiri);

// Header Tabel
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetFillColor(200, 200, 200);
$pdf->Cell(10, 10, 'No', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Nama Pasien', 1, 0, 'C', true);
$pdf->Cell(15, 10, 'Dokter', 1, 0, 'C', true);
$pdf->Cell(22, 10, 'Tanggal Resep', 1, 0, 'C', true);
$pdf->Cell(15, 10, 'Obat', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Dosis', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Jumlah', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Aturan Pakai', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Status', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Catatan', 1, 1, 'C', true);

// Mengambil data dari database
$pdf->SetFont('Arial', '', 8);
$no = 1;
$id = $_GET["id_resep"];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_resep WHERE id_resep='$id'");
if (!$query) {
    die("Query error: " . mysqli_error($koneksi));
}

while ($data = mysqli_fetch_assoc($query)) {
    $catatan = strlen($data['catatan']) > 20 ? substr($data['catatan'], 0, 18) . "..." : $data['catatan']; // Batasi teks catatan

    $pdf->SetX($margin_kiri);
    $pdf->Cell(10, 10, $no++, 1, 0, 'C');
    $pdf->Cell(30, 10, $data['nama_pasien'], 1, 0, 'L');
    $pdf->Cell(15, 10, $data['dokter'], 1, 0, 'C');
    $pdf->Cell(22, 10, $data['tanggal_resep'], 1, 0, 'C');
    $pdf->Cell(15, 10, $data['nama_obat'], 1, 0, 'C');
    $pdf->Cell(20, 10, $data['dosis'], 1, 0, 'C');
    $pdf->Cell(20, 10, $data['jumlah'], 1, 0, 'C');
    $pdf->Cell(20, 10, $data['aturan_pakai'], 1, 0, 'C');
    $pdf->Cell(20, 10, $data['status'], 1, 0, 'C');
    $pdf->Cell(20, 10, $catatan, 1, 1, 'L');
}

// Ruang kosong sebelum tanda tangan
$pdf->Ln(20);

// Tanda tangan
$pdf->Cell(300, 10, 'Yang Bertanggung Jawab', 0, 1, 'C');
$pdf->Ln(20);
$pdf->Cell(300, 10, '________________________', 0, 1, 'C'); // Garis tanda tangan
$pdf->Cell(300, 5, 'Nama Penanggung Jawab', 0, 1, 'C');

// Pastikan tidak ada output sebelum mengirim PDF
ob_end_clean();
$pdf->Output('I', 'Laporan_Permintaan_Darah.pdf');
