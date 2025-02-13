<?php
include('sess_check.php');
$pagetitle = 'Resep';

include('layout-top.php');
include('layout-bottom.php');
?>


<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <div class="layout-page">
      <div class="container">
        <div class="col-12">
          <div class="card mt-10">
            <div class="table-responsive">
              <div style="justify-content: right; text-align: right; padding: 10px;">
                <a href="input-resep.php" class="btn btn-primary">Tambah Data</a>
              </div>
              <table class="table">
                <thead>
                  <tr>
                    <td>NO</td>
                    <td>Nama Pasien</td>
                    <td>Dokter</td>
                    <td>Tanggal Resep</td>
                    <td>Obat</td>
                    <td>Dosis</td>
                    <td>Jumlah</td>
                    <td>Aturan Pakai</td>
                    <td>Status</td>
                    <td>Action</td>
                  </tr>
                </thead>
                <?php
                $no = 1;
                $query = "SELECT * FROM tbl_resep";
                $tampil = mysqli_query($koneksi, $query);
                while ($data = mysqli_fetch_array($tampil)):
                ?>
                  <tbody>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $data['nama_pasien'] ?></td>
                      <td><?= $data['dokter'] ?></td>
                      <td><?= $data['tanggal_resep'] ?></td>
                      <td><?= $data['nama_obat'] ?></td>
                      <td><?= $data['dosis'] ?></td>
                      <td><?= $data['jumlah'] ?></td>
                      <td><?= $data['aturan_pakai'] ?></td>
                      <td><?= $data['status'] ?></td>
                      <td>
                        <a href="edit-resep.php?id_resep=<?= $data['id_resep'] ?>" class="btn btn-outline-warning">Edit</a>
                        <form action="../../curd/curd-resep.php" method="POST" style="display: inline;">
                          <input type="hidden" name="id_resep" value="<?= $data['id_resep'] ?>">
                          <button type="submit" name="bhapus" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                        <a href="../../cetak/pdf-resep.php?id_resep=<?= $data['id_resep'] ?>" class="btn btn-outline-success" target="_blank">Print</a>
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