<?php
ob_start(); // Hindari output sebelum PDF dibuat
require('../fpdf186/fpdf.php');
include '../koneksi.php';

// Periksa koneksi database
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Membuat objek FPDF dalam mode **Potrait (P)**
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
$pdf->Cell(190, 10, 'Stok Darah Yang Tersedia', 0, 1, 'C');
$pdf->Ln(5);

// Geser tabel lebih ke tengah
$margin_kiri = 10; // Atur margin kiri
$pdf->SetX($margin_kiri);

// Header Tabel
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(200, 200, 200);
$pdf->Cell(10, 10, 'No', 1, 0, 'C', true);
$pdf->Cell(35, 10, 'Golongan Darah', 1, 0, 'C', true);
$pdf->Cell(17, 10, 'Rhesus', 1, 0, 'C', true);
$pdf->Cell(20, 10, 'Jumlah', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Tempat Penyimpanan', 1, 0, 'C', true);
$pdf->Cell(35, 10, 'Tanggal Kedaluarsa', 1, 0, 'C', true);
$pdf->Cell(35, 10, 'Terakhir Diupdate', 1, 1, 'C', true);

// Mengambil data dari database
$pdf->SetFont('Arial', '', 10);
$no = 1;
$id= $_GET["id_stokdarah"];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_stokdarah WHERE id_stokdarah='$id'");

if (!$query) {
    die("Query error: " . mysqli_error($koneksi)); // Debug jika query gagal
}

while ($data = mysqli_fetch_assoc($query)) {
    // Periksa apakah semua indeks tersedia
    $gol_dar  = isset($data['gol_dar']) ? $data['gol_dar'] : 'Tidak Ada';
    $rhesus   = isset($data['rhesus']) ? $data['rhesus'] : '-';
    $jumlah   = isset($data['jumlah']) ? $data['jumlah'] : '0';
    $tempat   = isset($data['tempat']) ? $data['tempat'] : '-';
    $tgl_exp  = isset($data['tgl_exp']) ? $data['tgl_exp'] : '-';
    $last_update = isset($data['last_update']) ? $data['last_update'] : '-';

    $pdf->SetX($margin_kiri); // Pastikan posisi sel sejajar dengan header
    $pdf->Cell(10, 10, $no++, 1, 0, 'C');
    $pdf->Cell(35, 10, $gol_dar, 1, 0, 'L');
    $pdf->Cell(17, 10, $rhesus, 1, 0, 'C');
    $pdf->Cell(20, 10, $jumlah, 1, 0, 'C');
    $pdf->Cell(40, 10, $tempat, 1, 0, 'C');
    $pdf->Cell(35, 10, $tgl_exp, 1, 0, 'C');
    $pdf->Cell(35, 10, $last_update, 1, 1, 'C');
}

// Ruang kosong sebelum tanda tangan
$pdf->Ln(40);

// Tanda tangan
$pdf->Cell(300, 10, 'Yang Bertanggung Jawab', 0, 1, 'C');
$pdf->Ln(20);
$pdf->Cell(300, 10, '________________________', 0, 1, 'C'); // Garis tanda tangan
$pdf->Cell(300, 5, 'Nama Penanggung Jawab', 0, 1, 'C');
// Pastikan tidak ada output sebelum mengirim PDF
ob_end_clean();
$pdf->Output('I', 'Laporan_Stok_Darah.pdf');
?>
