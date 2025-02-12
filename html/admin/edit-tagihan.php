<?php
include('sess_check.php');

$pagetitle = 'Edit Tagihan';
include('layout-top.php');
?>

<div class="layout-page">
  <div class="container">
    <div class="col-12">
      <div class="card mt-10 p-4">
        <div class="row">
          <?php
          if (isset($_GET['id_tagihan'])) {
            $id_tagihan = $_GET['id_tagihan'];
            $query = "SELECT * FROM tbl_tagihan WHERE id_tagihan = '$id_tagihan'";
            $result = mysqli_query($koneksi, $query);
            if ($result && mysqli_num_rows($result) > 0) {
              $data = mysqli_fetch_assoc($result);
            } else {
              echo "Data tagihan tidak ditemukan.";
              exit;
            }
          } else {
            echo "ID tagihan tidak ditemukan.";
            exit;
          }
          ?>

          <form action="../../curd/curd-tagihan.php" method="POST">
            <input type="hidden" name="id_tagihan" value="<?= $data['id_tagihan'] ?>">
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Nama Pasien</b>
              </label>
              <select class="form-control" name="tnama_pasien">
                <option value="">-- Pilih Pasien --</option>
                <?php
                $query = mysqli_query($koneksi, "SELECT nama_pasien FROM tbl_pasien");
                while ($row = mysqli_fetch_assoc($query)) {
                  echo "<option value='" . $row['nama_pasien'] . "'>" . $row['nama_pasien'] . "</option>";
                }
                ?>
              </select>
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Nomor Rekam Medis</b>
              </label>
              <input class="form-control" type="text" name="tno_rm" value="<?= $data['no_rm'] ?>" placeholder="Masukkan Nomor Rekam Medis">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Total Biaya Tagihan</b>
              </label>
              <input class="form-control" type="text" name="ttotal_biaya" value="<?= $data['total_biaya'] ?>" placeholder="Masukkan Total Biaya Tagihan">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Tanggal Pembayaran</b>
              </label>
              <input class="form-control" type="date" value="<?= $data['tanggal_pembayaran'] ?>" name="ttanggal_pembayaran">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Metode Pembayaran</b>
              </label>
              <select class="form-select" name="tmetode_pembayaran" id="">
                <option value="<?= $data['nama_pasien'] ?>"><?= $data['metode_pembayaran'] ?></option>
                <option value="">Pilih Metode Pembayaran</option>
                <option value="Tunai">Tunai</option>
                <option value="Non-Tunai">Non-Tunai</option>
                <option value="BPJS Kesehatan">BPJS Kesehatan</option>
                <option value="BPJS Mandiri">BPJS Mandiri</option>
                <option value="Jamkesda">Jamkesda</option>
                <option value="Pembayaran Lainnya">Pembayaran Lainnya</option>
              </select>
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <b>Status Pembayaran</b>
              </label>
              <input class="form-control" type="text" name="tstatus_pembayaran" value="<?= $data['status_pembayaran'] ?>" placeholder="Masukkan Status Pembayaran">
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">
                <a href="tagihan.php" class="btn btn-danger">Batal</a>
                <button name="bedit" type="submit" class="btn btn-success">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('layout-bottom.php') ?>