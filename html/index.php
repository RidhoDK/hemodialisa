<?php
session_start();

// Proses logout jika tombol logout ditekan
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: ../index.php"); // Redirect ke halaman login
  exit();
}

$titlepage = 'Home';
?>
<?php include('layout-top.php'); ?>



<!-- / Menu -->

<!-- Layout container -->
<div class="layout-page">
  <!-- Navbar -->

  <!-- / Navbar -->

  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
        <!--/ Total Revenue -->
        <div class="col-12 col-md-8 col-lg-12 col-xxl-4 order-3 order-md-2">
          <div class="row">
            <div class="col-6 mb-6">
              <div class="card h-100">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between mb-4">
                    <div style="background-color: rgba(128, 0, 0, 0.4); border-radius: 20%; width: 75px; height: 70px; text-align: center;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16" style="color: maroon;">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                      </svg>
                    </div>
                  </div>
                  <p class="mb-1">Data Pasien</p>
                  <?php
                  include '../koneksi.php'; // Pastikan file ini berisi koneksi ke database

                  // Query untuk menghitung jumlah pasien
                  $query = "SELECT COUNT(nama_pasien) AS total_pasien FROM tbl_pasien";
                  $result = mysqli_query($koneksi, $query);
                  $row = mysqli_fetch_assoc($result);
                  $total_pasien = $row['total_pasien'];
                  ?>
                  <h4 class="card-title mb-3"><?php echo $total_pasien; ?></h4>
                </div>
              </div>
            </div>
            <div class="col-6 mb-6">
              <div class="card h-100">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between mb-4">
                    <div style="background-color: rgba(0, 30, 128, 0.4); border-radius: 20%; width: 75px; height: 70px; text-align: center;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-calendar-event-fill" viewBox="0 0 16 16" style="color: navy;">
                        <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2m-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5" />
                      </svg>
                    </div>
                  </div>
                  <p class="mb-1">Jadwal Hemodialisa</p>
                  <?php
                  include '../koneksi.php'; // Pastikan file ini berisi koneksi ke database

                  // Query untuk menghitung jumlah pasien
                  $query = "SELECT COUNT(nama_pasien) AS total_pasien FROM tbl_jadwal";
                  $result = mysqli_query($koneksi, $query);
                  $row = mysqli_fetch_assoc($result);
                  $total_pasien = $row['total_pasien'];
                  ?>
                  <h4 class="card-title mb-3"><?php echo $total_pasien; ?></h4>
                </div>
              </div>
            </div>
            <div class="col-6 mb-6">
              <div class="card h-100">
                <div class="card-body">
                  <div class="card-title d-flex align-items-start justify-content-between mb-4">
                    <div style="background-color: rgba(0, 128, 0, 0.4); border-radius: 20%; width: 75px; height: 70px; text-align: center;">
                      <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16" style="color: darkgreen;">
                        <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z" />
                      </svg>
                    </div>
                  </div>
                  <p class="mb-1">Tagihan Pasien</p>
                  <?php
                  include '../koneksi.php'; // Pastikan file ini berisi koneksi ke database

                  // Query untuk menghitung jumlah pasien
                  $query = "SELECT SUM(total_biaya) AS total FROM tbl_tagihan";
                  $result = mysqli_query($koneksi, $query);
                  $row = mysqli_fetch_assoc($result);
                  $total = $row['total'];
                  ?>
                  <h4 class="card-title mb-3"><?php echo $total; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->

    <!-- Footer -->
    <footer class="content-footer footer bg-footer-theme">
      <div class="container-xxl">
        <div
          class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
          <div class="text-body">
            © by Ridho Dwy Kindranowo
          </div>
        </div>
      </div>
    </footer>
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>
  </div>
  <!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
<?php include('layout-bottom.php'); ?>
