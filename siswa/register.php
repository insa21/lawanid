<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Login siswa- Lawan.id</title>

  <link href="../assets/img/terapan/logo-large.png" rel="icon">
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../template/login/assets/css/login.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-7">
            <img src="..\assets\img\new\logo.png" style="background-color: grey;" alt="login" class="login-card-img" />
          </div>
          <div class="col-md-5">
            <div class="card-body">
              <div class="brand-wrapper d-flex align-items-center">
                <img src="..\assets\img\terapan\logo-large.png" alt="logo" class="logo" />
                <h2 class="ml-3"><b>Lawan.id</b></h2>
              </div>
              <p class="login-card-description">Daftar akun siswa</p>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="foto">Upload Kartu Pelajar</label>
                  <input type="file" class="form-control-file" name="foto" id="foto" accept="image/*">
                  <small class="form-text text-muted">Masukan Kartu Pelajar dalam format gambar (jpg, jpeg, png).</small>
                </div>

                <div class="form-group">
                  <label for="username" class="sr-only">NISN</label>
                  <input type="text" name="username" id="username" class="form-control" placeholder="Masukan NISN" />
                </div>
                <div class="form-group">
                  <label for="nama" class="sr-only">Nama Lengkap</label>
                  <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Lengkap" s />
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="sr-only">Password</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password" />
                </div>
                <input name="submit" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Daftar" />
              </form>
              <p class="login-card-footer-text">
                <a href="../siswa/loginsiswa.php" class="text-reset">Sudah punya akun</a>
                <!-- <a href="../admin/loginadmin.php" class="text-reset" style="padding-left: 20px;">Belum punya akun</a> -->
              </p>
              <nav class="login-card-footer-nav">
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </main>
  <!-- PHP CODE -->
  <?php
  include '../admin/conn.php';

  if (isset($_POST['submit'])) {
    $nisn = $_POST['username'];
    $name = $_POST['nama'];
    $password = $_POST['password'];
    $allowed_extensions = array('image/png', 'image/jpg', 'image/jpeg');

    function uploadFile($file, $destination)
    {
      $name = $file['name'];
      $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
      $size = $file['size'];
      $tmp_name = $file['tmp_name'];

      if (in_array($file['type'], $GLOBALS['allowed_extensions']) && $size < 3544070) {
        move_uploaded_file($tmp_name, $destination . $name);
        return $name; // Return the filename for database insertion
      } else {
        return false;
      }
    }

    $foto = uploadFile($_FILES['foto'], "../assets/kartupelajar/");

    if ($foto) {
      $query = "INSERT INTO siswa (nisn, foto, nama, password) VALUES ('$nisn', '$foto','$name','$password')";

      if (mysqli_query($conn, $query)) {
        // Data insertion successful
        echo "<script>
                        Swal.fire({
                            title: 'Success!',
                            text: 'Data siswa berhasil ditambahkan',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location='loginsiswa.php';
                            }
                        });
                    </script>";
      } else {
        // Data insertion failed
        echo "<script>
                        Swal.fire({
                            title: 'Error!',
                            text: 'Gagal menambahkan data siswa',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    </script>";
      }
    }
  }
  ?>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>