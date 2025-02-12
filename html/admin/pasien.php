<?php
session_start();
include('../../koneksi.php');

// Proses logout jika tombol logout ditekan
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: ../index.php"); // Redirect ke halaman login
  exit();
}

$titlepage = 'Pasien';
include('layout-top.php');

?>


<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">

  <div class="layout-container">
    <!-- Menu -->

    <!-- / Menu -->

    <!-- Layout container -->
    <div class="layout-page">
      <!-- / Navbar -->

      <div class="container">
        <div class="col-12">
          <div class="card mt-10">
            <div class="table-responsive">
              <div style="justify-content: right; text-align: right; padding: 10px;">
                <a href="input-pasien.php" class="btn btn-primary">Tambah Data</a>
              </div>
              <table class="table">
                <thead>
                  <tr>
                    <td>NO</td>
                    <td>Nama Pasien</td>
                    <td>NO. RM</td>
                    <td>Umur</td>
                    <td>Jenis Kelamin</td>
                    <td>Tanggal</td>
                    <td>Durasi</td>
                    <td>Tekanan Darah</td>
                    <td>Berat Badan</td>
                    <td>Diagnosa</td>
                    <td>Obat atau Tindakan Lain</td>
                    <td>Action</td>
                  </tr>
                </thead>
                <?php
                // Inisialisasi variabel
                $no = 1;
                $query = "SELECT * FROM tbl_pasien WHERE 1=1"; // 1=1 untuk memudahkan penambahan kondisi



                $tampil = mysqli_query($koneksi, $query);
                while ($data = mysqli_fetch_array($tampil)):
                ?>
                  <tbody>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $data['nama_pasien'] ?></td>
                      <td><?= $data['no_rm'] ?></td>
                      <td><?= $data['umur'] ?></td>
                      <td><?= $data['jenis_kelamin'] ?></td>
                      <td><?= $data['tanggal'] ?></td>
                      <td><?= $data['durasi'] ?></td>
                      <td><?= $data['tensi'] ?></td>
                      <td><?= $data['berat_badan'] ?></td>
                      <td><?= $data['diagnosa'] ?></td>
                      <td><?= $data['obat'] ?></td>
                      <td>
                        <a href="edit-pasien.php?id_pasien=<?= $data['id_pasien'] ?>" class="btn btn-outline-warning">Edit</a>
                        <form action="../../curd/curd-pasien.php" method="POST" style="display: inline;">
                          <input type="hidden" name="id_pasien" value="<?= $data['id_pasien'] ?>">
                          <button type="submit" name="bhapus" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                        <a href="../../cetak/pdf-pasien.php?id_pasien=<?= $data['id_pasien'] ?>" class="btn btn-outline-success" target="_blank">Print</a>
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
  </div>
</div>
<!-- / Layout wrapper -->

<?php include('layout-bottom.php'); ?>
