<?php
include('sess_check.php');
$pagetitle = 'Input Resep';

include('layout-top.php');
include('layout-bottom.php');
?>

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
  <div class="layout-container">
    <div class="layout-page">
      <div class="container">
        <div class="col-12">
          <div class="card mt-10 p-4">
            <div class="row">
              <form action="../../curd/curd-resep.php" method="POST">
                <div class="mb-3">
                  <label class="form-label"><b>Nama Pasien</b></label>
                  <select class="form-control" name="tpasien">
                    <option value="">-- Pilih Pasien --</option>
                    <?php
                    $query = mysqli_query($koneksi, "SELECT id_pasien, nama_pasien FROM tbl_pasien");
                    while ($row = mysqli_fetch_assoc($query)) {
                      echo "<option value='" . $row['nama_pasien'] . "'>" . $row['nama_pasien'] . "</option>";
                    }
                    ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label class="form-label"><b>Dokter</b></label>
                  <input class="form-control" type="text" name="tid_dokter" placeholder="Masukkan Nama Dokter">
                </div>

                <div class="mb-3">
                  <label class="form-label"><b>Tanggal Resep</b></label>
                  <input class="form-control" type="date" name="ttanggal_resep">
                </div>

                <div class="mb-3">
                  <label class="form-label"><b>Obat</b></label>
                  <input class="form-control" type="text" name="tnama_obat" placeholder="Masukkan Nama Obat">
                </div>

                <div class="mb-3">
                  <label class="form-label"><b>Dosis</b></label>
                  <input class="form-control" type="text" name="tdosis" placeholder="Masukkan Keterangan Dosis">
                </div>

                <div class="mb-3">
                  <label class="form-label"><b>Jumlah</b></label>
                  <input class="form-control" type="text" name="tjumlah" placeholder="Masukkan Jumlah">
                </div>

                <div class="mb-3">
                  <label class="form-label"><b>Aturan Pakai</b></label>
                  <input class="form-control" type="text" name="taturan_pakai" placeholder="Masukkan Aturan Pakai">
                </div>

                <div class="mb-3">
                  <label class="form-label"><b>Status</b></label>
                  <select class="form-select" name="tstatus">
                    <option value="" disabled selected>Pilih Status</option>
                    <option value="Diproses">Diproses</option>
                    <option value="Menunggu">Menunggu</option>
                    <option value="Selesai">Selesai</option>
                  </select>
                </div>

                <div class="mb-3">
                  <a href="pasien.php" class="btn btn-danger">Batal</a>
                  <button name="bsimpan" type="submit" class="btn btn-success">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>