<?php
include '../../koneksi.php';
session_start();

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
          <table class="table">
            <thead>
              <tr>
                <td>NO</td>
                <td>Nama Pasien</td>
                <td>Tanggal Hemodialisa</td>
                <td>Jam</td>
                <td>Ruangan</td>
                <td>Mesin</td>
                <td>Status</td>
                <td>Action</td>
              </tr>
            </thead>
            <?php
            // Inisialisasi variabel
            $no = 1;
            $query = "SELECT * FROM tbl_jadwal WHERE 1=1"; // 1=1 untuk memudahkan penambahan kondisi

            $tampil = mysqli_query($koneksi, $query);
            while ($data = mysqli_fetch_array($tampil)):
            ?>
              <tbody>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $data['nama_pasien'] ?></td>
                  <td><?= $data['tanggal'] ?></td>
                  <td><?= $data['jam'] ?></td>
                  <td><?= $data['ruangan'] ?></td>
                  <td><?= $data['mesin'] ?></td>
                  <td><?= $data['status'] ?></td>
                  <td>
                    <a href="edit-jadwal.php?id_jadwal=<?= $data['id_jadwal'] ?>" class="btn btn-outline-warning">Edit</a>
                    <form action="../../curd/curd-jadwal.php" method="POST" style="display: inline;">
                      <input type="hidden" name="id_jadwal" value="<?= $data['id_jadwal'] ?>">
                      <button type="submit" name="bhapus" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                    </form>
                    <a href="../../cetak/pdf-jadwal.php?id_jadwal=<?= $data['id_jadwal'] ?>" class="btn btn-outline-success" target="_blank">Print</a>
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
