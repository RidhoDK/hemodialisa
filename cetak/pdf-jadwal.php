<?php
require('../fpdf186/fpdf.php');
include('../libs/koneksi.php');

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

$pdf->SetFont('Arial', 'B', 14);

$pdf->Cell(197, 10, 'Jadwal Pasien Hemodialisa', 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(200, 200, 200);

$colWidths = [12, 30, 25, 20, 30, 23, 25]; // Lebar kolom
$totalWidth = array_sum($colWidths); // Total lebar kolom

// Mengatur posisi X agar tabel berada di tengah
$pdf->SetX((210 - $totalWidth) / 2); // 210 adalah lebar halaman A4 dalam mm

// Membuat header tabel
$pdf->Cell($colWidths[0], 10, 'No', 1, 0, 'C', true);
$pdf->Cell($colWidths[1], 10, 'Nama Pasien', 1, 0, 'C', true);
$pdf->Cell($colWidths[2], 10, 'Tanggal', 1, 0, 'C', true);
$pdf->Cell($colWidths[3], 10, 'Jam', 1, 0, 'C', true);
$pdf->Cell($colWidths[4], 10, 'Ruangan', 1, 0, 'C', true);
$pdf->Cell($colWidths[5], 10, 'Mesin', 1, 0, 'C', true);
$pdf->Cell($colWidths[6], 10, 'Status', 1, 1, 'C', true); // Pastikan menggunakan 1 untuk baris baru

// Mengambil data dari database
$pdf->SetFont('Arial', '', 10);
$no = 1;
$id = $_GET["id_jadwal"];
$query = mysqli_query($koneksi, "SELECT * FROM tbl_jadwal WHERE id_jadwal='$id'");

while ($data = mysqli_fetch_assoc($query)) {
    // Menyesuaikan posisi X untuk setiap baris data agar tetap terpusat
    $pdf->SetX((210 - $totalWidth) / 2);

    // Tampilkan data dalam tabel
    $pdf->Cell($colWidths[0], 10, $no++, 1, 0, 'C');
    $pdf->Cell($colWidths[1], 10, $data['nama_pasien'], 1, 0, 'C');
    $pdf->Cell($colWidths[2], 10, $data['tanggal'], 1, 0, 'C');
    $pdf->Cell($colWidths[3], 10, $data['jam'], 1, 0, 'C');
    $pdf->Cell($colWidths[4], 10, $data['ruangan'], 1, 0, 'C');
    $pdf->Cell($colWidths[5], 10, $data['mesin'], 1, 0, 'C');
    $pdf->Cell($colWidths[6], 10, $data['status'], 1, 1, 'C'); // Pindah ke baris berikutnya
}

$pdf->Ln(40);
// Menambahkan tanda tangan
$pdf->Cell(300, 10, 'Yang Bertanggung Jawab', 0, 1, 'C');
$pdf->Ln(20);
$pdf->Cell(300, 10, '________________________', 0, 1, 'C'); // Garis tanda tangan
$pdf->Cell(300, 5, 'Nama Penanggung Jawab', 0, 1, 'C');

// Output PDF
$pdf->Output('I', 'Laporan_Jadwal.pdf'); // D untuk download langsung
