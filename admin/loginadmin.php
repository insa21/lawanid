<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Login admin - Lawan.id</title>

  <link href="../assets/img/terapan/logo-large.png" rel="icon">
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../template/login/assets/css/login.css" />
</head>

<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="..\assets\img\new\logo.png" style="background-color: #004064" alt="login" class="login-card-img" />
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper d-flex align-items-center">
                <img src="..\assets\img\terapan\logo-large.png" alt="logo" class="logo" />
                <h2 class="ml-3"><b>Lawan.id</b></h2>
              </div>
              <p class="login-card-description">Login sebagai admin</p>
              <form action="" method="post">
                <div class="form-group">
                  <label for="username" class="sr-only">Username</label>
                  <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username" required />
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="sr-only">Password</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password" required />
                </div>
                <input name="submit" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login" />
              </form>
              <!-- <a href="#!" class="forgot-password-link">Forgot password?</a> -->
              <p class="login-card-footer-text">
                <a href="../siswa/loginsiswa.php" class="text-reset">Login sebagai siswa</a>
              </p>
              <nav class="login-card-footer-nav">
                <!-- <a href="#!">Terms of use.</a>
                    <a href="#!">Privacy policy</a> -->
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- PHP CODE -->
  <?php
  include 'conn.php';
  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $pass = $_POST['password'];

    $cek = mysqli_query($conn, "SELECT * FROM admin WHERE nisn='" . $username . "' AND password='" . $pass . "'");
    $akun = $cek->fetch_assoc();
    if (mysqli_num_rows($cek) > 0) {
      $d = mysqli_fetch_object($cek);
      $_SESSION['status_login'] = true;
      $_SESSION['a_global'] = $d;
      $_SESSION['id'] = $d->id_admin;
      $_SESSION['nisn'] = $akun;
      echo '<script>window.location="dashboard.php"</script>';
    } else {
      echo '<script>alert("Username atau Password Anda Salah!")</script>';
    }
  }

  ?>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>