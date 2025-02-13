<?php
include('sess_check.php');

$pagetitle = 'Permintaan';
include('layout-top.php');
include('layout-bottom.php');
?>

<div class="layout-page">
  <div class="container">
    <div class="col-12">
      <div class="card mt-10">
        <div class="table-responsive">
          <div style="justify-content: right; text-align: right; padding: 10px;">
            <a href="input-permintaan.php" class="btn btn-primary">Tambah Data</a>
          </div>
          <table class="table">
            <thead>
              <tr>
                <td>NO</td>
                <td>Nama Pasien</td>
                <td>NO. RM</td>
                <td>Golongan Darah</td>
                <td>Rhesus</td>
                <td>Jumlah yang Diminta</td>
                <td>Tanggal Permintaan</td>
                <td>Prioritas</td>
                <td>Status</td>
                <td>Catatan</td>
              </tr>
            </thead>
            <?php
            // Inisialisasi variabel
            $no = 1;
            $query = "SELECT * FROM tbl_permintaan"; // 1=1 untuk memudahkan penambahan kondisi

            $tampil = mysqli_query($koneksi, $query);
            while ($data = mysqli_fetch_array($tampil)):
            ?>
              <tbody>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $data['nama_pasien'] ?></td>
                  <td><?= $data['no_rm'] ?></td>
                  <td><?= $data['gol_dar'] ?></td>
                  <td><?= $data['rhesus'] ?></td>
                  <td><?= $data['jumlah_diminta'] ?></td>
                  <td><?= $data['tgl_permintaan'] ?></td>
                  <td><?= $data['prioritas'] ?></td>
                  <td><?= $data['status'] ?></td>
                  <td><?= $data['catatan'] ?></td>
                  <td>
                    <a href="edit-permintaan.php?id_permintaan=<?= $data['id_permintaan'] ?>" class="btn btn-outline-warning">Edit</a>
                    <form action="../../curd/curd-permintaan.php" method="POST" style="display: inline;">
                      <input type="hidden" name="id_permintaan" value="<?= $data['id_permintaan'] ?>">
                      <button type="submit" name="bhapus" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                    <a href="../../cetak/pdf-permintaan.php?id_permintaan=<?= $data['id_permintaan'] ?>" class="btn btn-outline-success" target="_blank">Print</a>
                  </td>
                </tr>
              </tbody>
            <?php endwhile; ?>
          </table>
        </div>
      </div>
    </div>
  </div>




  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->

  <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../../assets/vendor/libs/popper/popper.js"></script>
  <script src="../../assets/vendor/js/bootstrap.js"></script>
  <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../../assets/vendor/js/menu.js"></script>

  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="../../assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="../../assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="../../assets/js/dashboards-analytics.js"></script>

  <!-- Place this tag before closing body tag for github widget button. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>

  </html>