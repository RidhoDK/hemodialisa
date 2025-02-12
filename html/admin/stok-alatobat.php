<?php
session_start();
include('../../koneksi.php');

// Proses logout jika tombol logout ditekan
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: ../index.php"); // Redirect ke halaman login
  exit();
}
$pagetitle = 'Stok Alat dan Obat';
include('layout-top.php');
include('layout-bottom.php');
?>


<!-- Layout container -->
<div class="layout-page">
  <div class="container">
    <div class="col-12">
      <div class="card mt-10">
        <div class="table-responsive">
          <div style="justify-content: right; text-align: right; padding: 10px;">
            <a href="input-alatobat.php" class="btn btn-primary">Tambah Data</a>
          </div>
          <table class="table">
            <thead>
              <tr>
                <td>NO</td>
                <td>Nama Barang</td>
                <td>Jumlah</td>
                <td>Tanggal Kedaluarsa</td>
                <td>Tersedia</td>
                <td>Action</td>
              </tr>
            </thead>
            <?php
            // Inisialisasi variabel
            $no = 1;
            $query = "SELECT * FROM tbl_alatobat WHERE 1=1"; // 1=1 untuk memudahkan penambahan kondisi



            $tampil = mysqli_query($koneksi, $query);
            while ($data = mysqli_fetch_array($tampil)):
            ?>
              <tbody>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $data['nama_barang'] ?></td>
                  <td><?= $data['jumlah_stok'] ?></td>
                  <td><?= $data['tgl_exp'] ?></td>
                  <td><?= $data['tersedia'] ?></td>
                  <td>
                    <a href="edit-alatobat.php?id_alatobat=<?= $data['id_alatobat'] ?>" class="btn btn-outline-warning">Edit</a>
                    <form action="../curd/curd-alatobat.php" method="POST" style="display: inline;">
                      <input type="hidden" name="id_alatobat" value="<?= $data['id_alatobat'] ?>">
                      <button type="submit" name="bhapus" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                    <a href="../cetak/pdf-alatobat.php?id_alatobat=<?= $data['id_alatobat'] ?>" class="btn btn-outline-success" target="_blank">Print</a>
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
