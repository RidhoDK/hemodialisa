<?php
session_start();

// Proses logout jika tombol logout ditekan
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ../index.php"); // Redirect ke halaman login
    exit();
}
?>

<!doctype html>

<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="vertical-menu-template-free"
  data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>TPT</title>

    <meta name="description" content="" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar" >
      <div class="layout-container" >
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo" style="background: #98FB98;">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img src="../../assets/img/logo.png" alt="" style="width: 60px; border-radius: 50%">
              </span>
              <span class="app-brand-text demo menu-text fw-bold ms-2" style="font-size: 13px;">RS DR.R.SOEHARSONO</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
            </a>
          </div>


          <ul class="menu-inner py-1" style="background: #98FB98; color: white;">
            <!-- Dashboards -->
            <li class="menu-item">
              <a href="../html/index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div class="text-truncate" data-i18n="Layouts">Pelayanan</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="pasien.php" class="menu-link">
                    <div class="text-truncate" data-i18n="Without menu">Data Pasien</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="jadwal_hd.php" class="menu-link">
                    <div class="text-truncate" data-i18n="Without navbar">Jadwal Hemodialisa</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="hasil_lab.php" class="menu-link">
                    <div class="text-truncate" data-i18n="Fluid">Hasil Pemeriksaan Laboratrium</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="resep.php" class="menu-link">
                    <div class="text-truncate" data-i18n="Container">Resep</div>
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <ul>
                <li class="menu-item">
                  <a href="?logout=true" style="color: red;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16" style="margin-right: 10px;">
                      <path d="M7.5 1v7h1V1z"/>
                      <path d="M3 8.812a5 5 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812"/>
                    </svg>
                    Logout
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </aside>
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
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                              </svg>
                            </div>
                          </div>
                          <p class="mb-1">Data Pasien</p>
                          <?php
                            include '../../koneksi.php'; // Pastikan file ini berisi koneksi ke database

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
                                <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2m-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5"/>
                              </svg>
                            </div>
                          </div>
                          <p class="mb-1">Jadwal Hemodialisa</p>
                          <?php
                            include '../../koneksi.php'; // Pastikan file ini berisi koneksi ke database

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
                                <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z"/>
                              </svg>
                            </div>
                          </div>
                          <p class="mb-1">Tagihan Pasien</p>
                          <?php
                            include '../../koneksi.php'; // Pastikan file ini berisi koneksi ke database

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
