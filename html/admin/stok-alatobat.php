<?php
include('sess_check.php');

$pagetitle = 'Stok Alat dan Obat';
include('layout-top.php');
include('layout-bottom.php');
?>

<!-- Layout container -->
<div class="layout-page">
  <div class="container">
    <div class="col-12">
      <div class="card mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Daftar Stok Alat dan Obat</h5>
          <a href="input-alatobat.php" class="btn btn-primary btn-sm">Tambah Data</a>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead class="table-dark">
              <tr>
                <th width="5%">NO</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Tanggal Kedaluarsa</th>
                <th>Tersedia</th>
                <th width="20%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $query = "SELECT * FROM tbl_alatobat";
              $tampil = mysqli_query($koneksi, $query);
              while ($data = mysqli_fetch_array($tampil)) :
              ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= htmlspecialchars($data['nama_barang']) ?></td>
                  <td><?= htmlspecialchars($data['jumlah_stok']) ?></td>
                  <td><?= htmlspecialchars($data['tgl_exp']) ?></td>
                  <td><?= htmlspecialchars($data['tersedia']) ?></td>
                  <td>
                    <a href="edit-alatobat.php?id_alatobat=<?= $data['id_alatobat'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form action="../../curd/curd-alatobat.php" method="POST" class="d-inline">
                      <input type="hidden" name="id_alatobat" value="<?= $data['id_alatobat'] ?>">
                      <button type="submit" name="bhapus" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                    <a href="../../cetak/pdf-alatobat.php?id_alatobat=<?= $data['id_alatobat'] ?>" class="btn btn-success btn-sm" target="_blank">Print</a>
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