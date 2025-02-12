<?php
session_start();
include 'koneksi.php'; // File koneksi ke database

if (isset($_POST['blogin'])) {
  $username = mysqli_real_escape_string($koneksi, $_POST['username']);
  $password = md5($_POST['password']); // Enkripsi password

  // Query untuk mencari user dengan username dan password yang cocok
  $query = "SELECT * FROM tbl_akun WHERE username='$username' AND password='$password'";
  $result = mysqli_query($koneksi, $query);
  $data = mysqli_fetch_assoc($result);

  if ($data) {
    $_SESSION['username'] = $data['username'];

    // Redirect berdasarkan level user
    if ($data['username'] == 'admin') {
      header("Location: html/admin/index.php");
    } elseif ($data['username'] == 'Operator') {
      header("Location: html/admin/index.php");
    } elseif ($data['username'] == 'dokter') {
      header("Location: html/dokter/index_dok.php");
    } elseif ($data['username'] == 'Farmasi') {
      header("Location: html/farmasi/index_far.php");
    } else {
      echo "<script>alert('Level user tidak valid!'); window.location='index.php';</script>";
    }
  } else {
    echo "<script>alert('Username atau password salah!'); window.location='index.php';</script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-image: url(../dashboardpkl1/assets/img/image.jpeg); background-size: cover; background-position: center;">
  <div class="container">
    <div class="col-12">
      <div class="row">
        <div style="margin-top: 55px; item-align: center; justify-content: center; display: flex;">
          <div class="card col-4">
            <div class="card-header" style="text-align: center;">
              <h3>LOGIN</h3>
            </div>
            <div class="card-body">
              <form action="" method="POST">
                <div class="mb-3" style="text-align: center;">
                  <img src="assets/img/logo.png" alt="" width="130">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Username</label>
                  <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
                <div class="mb-3">
                  <label for="" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="mb-3" style="padding-top: 30px;">
                  <button name="blogin" type="submit" class="btn btn-success col-12">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
