<?php
session_start();
include('../../koneksi.php');

// Proses logout jika tombol logout ditekan
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: ../index.php"); // Redirect ke halaman login
  exit();
}

$titlepage = 'Tagihan';
include('layout-top.php');
include('layout-bottom.php');
?>


<!-- Layout container -->
<div class="layout-page">
  <!-- Navbar -->

  <!-- / Navbar -->

  <div class="container">
    <div class="col-12">
      <div class="card mt-10">
        <div class="table-responsive">
          <div style="justify-content: right; text-align: right; padding: 10px;">
            <a href="input-tagihan.php" class="btn btn-primary">Tambah Data</a>
          </div>
          <table class="table">
            <thead>
              <tr>
                <td>NO</td>
                <td>Nama Pasien</td>
                <td>NO. RM</td>
                <td>Total Biaya</td>
                <td>Tanggal Pembayaran</td>
                <td>Metode Pembayaran</td>
                <td>Status Pembayaran</td>
                <td>Action</td>
              </tr>
            </thead>
            <?php
            // Inisialisasi variabel
            $no = 1;
            $query = "SELECT * FROM tbl_tagihan WHERE 1=1"; // 1=1 untuk memudahkan penambahan kondisi



            $tampil = mysqli_query($koneksi, $query);
            while ($data = mysqli_fetch_array($tampil)):
            ?>
              <tbody>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $data['nama_pasien'] ?></td>
                  <td><?= $data['no_rm'] ?></td>
                  <td><?= $data['total_biaya'] ?></td>
                  <td><?= $data['tanggal_pembayaran'] ?></td>
                  <td><?= $data['metode_pembayaran'] ?></td>
                  <td><?= $data['status_pembayaran'] ?></td>
                  <td>
                    <a href="edit-tagihan.php?id_tagihan=<?= $data['id_tagihan'] ?>" class="btn btn-outline-warning">Edit</a>
                    <form action="../curd/curd-tagihan.php" method="POST" style="display: inline;">
                      <input type="hidden" name="id_tagihan" value="<?= $data['id_tagihan'] ?>">
                      <button type="submit" name="bhapus" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                    <a href="../cetak/pdf-tagihan.php?id_tagihan=<?= $data['id_tagihan'] ?>" class="btn btn-outline-success" target="_blank">Print</a>
                  </td>
                </tr>
              </tbody>
            <?php endwhile; ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
