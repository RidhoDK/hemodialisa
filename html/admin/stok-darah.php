<?php
session_start();
include('../../koneksi.php');

// Proses logout jika tombol logout ditekan
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: ../index.php"); // Redirect ke halaman login
  exit();
}
$titlepage = 'Stok Darah';
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
            <a href="input-stok.php" class="btn btn-primary">Tambah Data</a>
          </div>
          <table class="table">
            <thead>
              <tr>
                <td>NO</td>
                <td>Golongan Darah</td>
                <td>Rhesus</td>
                <td>Jumlah</td>
                <td>Tempat Penyimpanan</td>
                <td>Tanggal Kedaluarsa</td>
                <td>Terakhir Di Update</td>
                <td>Action</td>
              </tr>
            </thead>
            <?php
            // Inisialisasi variabel
            $no = 1;
            $query = "SELECT * FROM tbl_stokdarah"; // 1=1 untuk memudahkan penambahan kondisi



            $tampil = mysqli_query($koneksi, $query);
            while ($data = mysqli_fetch_array($tampil)):
            ?>
              <tbody>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $data['gol_darah'] ?></td>
                  <td><?= $data['rhesus'] ?></td>
                  <td><?= $data['jumlah'] ?></td>
                  <td><?= $data['tempat'] ?></td>
                  <td><?= $data['tgl_exp'] ?></td>
                  <td><?= $data['last_update'] ?></td>
                  <td>
                    <a href="edit-stok.php?id_stokdarah=<?= $data['id_stokdarah'] ?>" class="btn btn-outline-warning">Edit</a>
                    <form action="../../curd/curd-stok.php" method="POST" style="display: inline;">
                      <input type="hidden" name="id_stokdarah" value="<?= $data['id_stokdarah'] ?>">
                      <button type="submit" name="bhapus" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                    <a href="../cetak/pdf-stok.php?id_stokdarah=<?= $data['id_stokdarah'] ?>" class="btn btn-outline-success" target="_blank">Print</a>
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
