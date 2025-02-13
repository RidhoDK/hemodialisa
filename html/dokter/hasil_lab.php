<?php
include('sess_check.php');

$titlepage = 'Hasil Lab';
include('layout-top.php');
?>

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <div class="layout-page">
      <div class="container">
        <div class="col-12">
          <div class="card mt-10">
            <div class="table-responsive">
              <div class="d-flex justify-content-end p-3">
                <a href="input-hasillab.php" class="btn btn-primary">Tambah Data</a>
              </div>
              <table class="table table-striped table-bordered">
                <thead class="table-dark">
                  <tr>
                    <th>NO</th>
                    <th>Nama Pasien</th>
                    <th>NO. RM</th>
                    <th>Urea</th>
                    <th>Kreatinin</th>
                    <th>Hemoglobin</th>
                    <th>Sebelum Hemodialisa</th>
                    <th>Sesudah Hemodialisa</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $query = "SELECT * FROM tbl_hasillab";
                  $tampil = mysqli_query($koneksi, $query);
                  while ($data = mysqli_fetch_array($tampil)) :
                  ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= htmlspecialchars($data['nama_pasien']) ?></td>
                      <td><?= htmlspecialchars($data['no_rm']) ?></td>
                      <td><?= htmlspecialchars($data['urea']) ?></td>
                      <td><?= htmlspecialchars($data['kreatinin']) ?></td>
                      <td><?= htmlspecialchars($data['hemoglobin']) ?></td>
                      <td><?= htmlspecialchars($data['sebelum_hd']) ?></td>
                      <td><?= htmlspecialchars($data['sesudah_hd']) ?></td>
                      <td>
                        <a href="edit-hasillab.php?id_hasillab=<?= $data['id_hasillab'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form action="../../curd/curd-hasillab.php" method="POST" class="d-inline">
                          <input type="hidden" name="id_hasillab" value="<?= $data['id_hasillab'] ?>">
                          <button type="submit" name="bhapus" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                        <a href="../../cetak/pdf-hasillab.php?id_hasillab=<?= $data['id_hasillab'] ?>" class="btn btn-success btn-sm" target="_blank">Print</a>
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

<?php include('layout-bottom.php') ?>