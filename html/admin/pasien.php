<?php
include('sess_check.php');

$titlepage = 'Pasien';
include('layout-top.php');
?>


<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <!-- Layout container -->
    <div class="layout-page">
      <!-- / Navbar -->
      <div class="container">
        <div class="col-12">
          <div class="card mt-3">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Data Pasien</h5>
              <a href="input-pasien.php" class="btn btn-primary">Tambah Data</a>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark text-center">
                  <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>No. RM</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal</th>
                    <th>Durasi</th>
                    <th>Tekanan Darah</th>
                    <th>Berat Badan</th>
                    <th>Diagnosa</th>
                    <th>Obat / Tindakan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $query = "SELECT * FROM tbl_pasien";
                  $tampil = mysqli_query($koneksi, $query);
                  while ($data = mysqli_fetch_array($tampil)) :
                  ?>
                    <tr class="text-center">
                      <td><?= $no++ ?></td>
                      <td class="text-start"><?= $data['nama_pasien'] ?></td>
                      <td><?= $data['no_rm'] ?></td>
                      <td><?= $data['umur'] ?></td>
                      <td><?= $data['jenis_kelamin'] ?></td>
                      <td><?= date("d-m-Y", strtotime($data['tanggal'])) ?></td>
                      <td><?= $data['durasi'] ?></td>
                      <td><?= $data['tensi'] ?></td>
                      <td><?= $data['berat_badan'] ?> kg</td>
                      <td class="text-start"><?= $data['diagnosa'] ?></td>
                      <td class="text-start"><?= $data['obat'] ?></td>
                      <td>
                        <a href="edit-pasien.php?id_pasien=<?= $data['id_pasien'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <form action="../../curd/curd-pasien.php" method="POST" style="display: inline;">
                          <input type="hidden" name="id_pasien" value="<?= $data['id_pasien'] ?>">
                          <button type="submit" name="bhapus" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                        <a href="../../cetak/pdf-pasien.php?id_pasien=<?= $data['id_pasien'] ?>" class="btn btn-sm btn-success" target="_blank">Print</a>
                      </td>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
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