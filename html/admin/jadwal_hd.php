<?php
include('sess_check.php');

$pagetitle = 'Jadwal HD';

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
            <a href="input-jadwal.php" class="btn btn-primary">Tambah Data</a>
          </div>
          <table class="table table-bordered">
            <thead class="thead-dark">
              <tr>
                <th>NO</th>
                <th>Nama Pasien</th>
                <th>Tanggal Hemodialisa</th>
                <th>Jam</th>
                <th>Ruangan</th>
                <th>Mesin</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $query = "SELECT * FROM tbl_jadwal";
              $tampil = mysqli_query($koneksi, $query);

              while ($data = mysqli_fetch_array($tampil)): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= htmlspecialchars($data['nama_pasien']) ?></td>
                  <td><?= htmlspecialchars($data['tanggal']) ?></td>
                  <td><?= htmlspecialchars($data['jam']) ?></td>
                  <td><?= htmlspecialchars($data['ruangan']) ?></td>
                  <td><?= htmlspecialchars($data['mesin']) ?></td>
                  <td><?= htmlspecialchars($data['status']) ?></td>
                  <td>
                    <a href="edit-jadwal.php?id_jadwal=<?= $data['id_jadwal'] ?>" class="btn btn-warning">Edit</a>
                    <form action="../../curd/curd-jadwal.php" method="POST" style="display: inline;">
                      <input type="hidden" name="id_jadwal" value="<?= $data['id_jadwal'] ?>">
                      <button type="submit" name="bhapus" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                    <a href="../../cetak/pdf-jadwal.php?id_jadwal=<?= $data['id_jadwal'] ?>" class="btn btn-success" target="_blank">Print</a>
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