<?php
include "conn.php";
session_start();
if (isset($_GET['nisn'])) {
  $nisn = $_GET['nisn'];

  $query = "SELECT * FROM siswa WHERE nisn = '$nisn'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    $siswa = mysqli_fetch_assoc($result);

    $nisn = $siswa['nisn'];
    $nama = $siswa['nama'];
    $kelas = $siswa['kelas'];
    $jurusan = $siswa['jurusan'];
    $jenis_kelamin = $siswa['jenis_kelamin'];
    $no_hp = $siswa['no_hp'];
    $alamat = $siswa['alamat'];
?>

    <DOCTYPE html>
      <html lang="en">

      <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Siswa - Lawan.id</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <link href="../assets/img/terapan/logo-large.png" rel="icon">
        <link href="../template/NiceAdmin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <link href="../template/NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../template/NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="../template/NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="../template/NiceAdmin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="../template/NiceAdmin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="../template/NiceAdmin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="../template/NiceAdmin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

        <link href="../template/NiceAdmin/assets/css/style.css" rel="stylesheet">

        <!-- SweetAlert CDN -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

      </head>

      <body>
        <header id="header" class="header fixed-top d-flex align-items-center">
          <div class="d-flex align-items-center justify-content-between">
            <a href="dashboard.php" class="logo d-flex align-items-center">
              <img src="../assets/img/terapan/logo-large.png" alt="">
              <span class="d-none d-lg-block"> Lawan.id</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
          </div>

          <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
              <input type="text" name="query" placeholder="Search" title="Enter search keyword">
              <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
          </div>

          <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
              <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                  <i class="bi bi-search"></i>
                </a>
              </li>
              <li class="nav-item dropdown">
              </li>
              <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                  <img src="../template/NiceAdmin/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                  <span class="d-none d-md-block dropdown-toggle ps-2"> <?php echo $_SESSION['nisn']['nama']; ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                  <li class="dropdown-header">
                    <h6> <?php echo $_SESSION['nisn']['nama']; ?></h6>
                    <span>Administrator</span>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li>
                    <a class="dropdown-item d-flex align-items-center" href="editprofile.php">
                      <i class="bi bi-person"></i>
                      <span>My Profile</span>
                    </a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li>
                    <a class="dropdown-item d-flex align-items-center" href="loginadmin.php">
                      <i class="bi bi-box-arrow-right"></i>
                      <span>Sign Out</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </header>


        <!-- ======= Sidebar ======= -->
        <aside id="sidebar" class="sidebar">
          <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
              <a class="nav-link collapsed" href="dashboard.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#laporan-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-envelope"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="laporan-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                  <a href="laporanmasuk.php">
                    <i class="bi bi-circle"></i><span>Laporan Masuk</span>
                  </a>
                </li>
                <li>
                  <a href="datalaporan.php">
                    <i class="bi bi-circle"></i><span>Data Laporan</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#artikel-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-newspaper"></i><span>artikel</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="artikel-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                  <a href="artikel/tambahartikel.php">
                    <i class="bi bi-circle"></i><span>Tambah Artikel</span>
                  </a>
                </li>
                <li>
                  <a href="artikel/lihat_artikel.php">
                    <i class="bi bi-circle"></i><span>Data Artikel</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-people"></i><span>Siswa</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="forms-nav" class="nav-content" data-bs-parent="#sidebar-nav">
                <li>
                  <a href="datasiswa.php" class="active">
                    <i class="bi bi-circle"></i><span>Data Siswa</span>
                  </a>
                </li>
                <li>
                  <a href="tambahdata.php">
                    <i class="bi bi-circle"></i><span>Tambah Data</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </aside>

        </aside>

        <main id="main" class="main">

          <div class="pagetitle">
            <h1>Data Siswa</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Siswa</li>
                <li class="breadcrumb-item active">Edit Data Siswa</li>
              </ol>
            </nav>
          </div><!-- End Page Title -->

          <section class="section dashboard">
            <div class="row">

              <!-- Left side columns -->
              <div class="col-lg-12">
                <div class="row">

                  <section class="section">
                    <div class="row">
                      <div class="col-lg-12">

                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title"></h5>

                            <!-- General Form Elements -->
                            <form action="" method="post">
                              <div class="row mb-3">
                                <label for="username" class="col-sm-2 col-form-label">NISN</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="username" id="username" value="<?php echo $nisn; ?>" readonly />
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $nama; ?>" required />
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                                <div class="col-sm-10">
                                  <select class="form-select" id="kelas" name="kelas" aria-label="Default select example" onchange="updateJurusanOptions()" required>
                                    <option value="X" <?php echo ($kelas == 'X') ? 'selected' : ''; ?>>X</option>
                                    <option value="XI" <?php echo ($kelas == 'XI') ? 'selected' : ''; ?>>XI</option>
                                    <option value="XII" <?php echo ($kelas == 'XII') ? 'selected' : ''; ?>>XII</option>
                                  </select>
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                <div class="col-sm-10">
                                  <select class="form-select" id="jurusan" name="jurusan" aria-label="Default select example" required>
                                    <!-- Options for jurusan will be dynamically updated based on the selected kelas -->
                                    <!-- Populate options using PHP if needed -->
                                  </select>
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="optionLaki" value="laki-laki" <?php echo ($jenis_kelamin == 'laki-laki') ? 'checked' : ''; ?> required>
                                    <label class="form-check-label" for="optionLaki">Laki-laki</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="optionPerempuan" value="perempuan" <?php echo ($jenis_kelamin == 'perempuan') ? 'checked' : ''; ?> required>
                                    <label class="form-check-label" for="optionPerempuan">Perempuan</label>
                                  </div>
                                  <!-- Add more options as needed -->
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="no_hp" class="col-sm-2 col-form-label">No HP</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?php echo $no_hp; ?>" required />
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                  <textarea type="text" class="form-control" style="height: 80px;" name="alamat" id="alamat" required><?php echo $alamat; ?></textarea>
                                </div>
                              </div>

                              <!-- <div class="row mb-3">
                          <label for="password" class="col-sm-2 col-form-label">Password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" id="password" required />
                          </div>
                        </div> -->

                              <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                  <button type="submit" name="submit" class="btn btn-primary">Update Data</button>
                                  <a href="datasiswa.php" class="btn btn-secondary">Kembali</a>
                                </div>
                              </div>
                            </form>


                            <!-- End Edit Data Siswa Form -->

                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </section>

        </main>
        </section>

        </main><!-- End #main -->

        <!-- Footer -->
        <footer id="footer" class="footer">
          <div class="copyright">
            &copy; <?php echo date('Y'); ?> <strong>Lawan.id</strong>. All Rights Reserved.
          </div>
          <div class="credits">
          </div>
        </footer><!-- End Footer -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="../template/NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="../template/NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../template/NiceAdmin/assets/vendor/chart.js/chart.umd.js"></script>
        <script src="../template/NiceAdmin/assets/vendor/echarts/echarts.min.js"></script>
        <script src="../template/NiceAdmin/assets/vendor/quill/quill.min.js"></script>
        <script src="../template/NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="../template/NiceAdmin/assets/vendor/tinymce/tinymce.min.js"></script>
        <script src="../template/NiceAdmin/assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="../template/NiceAdmin/assets/js/main.js"></script>
        <!--JS CODE  -->

        <script>
          function updateJurusanOptions() {
            var kelasSelect = document.getElementById("kelas");
            var jurusanSelect = document.getElementById("jurusan");

            // Remove existing options
            while (jurusanSelect.options.length > 0) {
              jurusanSelect.options.remove(0);
            }

            // Add default option
            var defaultOption = document.createElement("option");
            defaultOption.text = "Pilih jurusan";
            defaultOption.value = "";
            jurusanSelect.add(defaultOption);

            // Add options based on the selected kelas
            var selectedKelas = kelasSelect.value;
            var jurusanOptions = getJurusanOptions(selectedKelas);
            for (var i = 0; i < jurusanOptions.length; i++) {
              var option = document.createElement("option");
              option.text = jurusanOptions[i];
              option.value = jurusanOptions[i];
              jurusanSelect.add(option);
            }
          }

          // Mengatur jurusan untuk option
          function getJurusanOptions(kelas) {
            switch (kelas) {
              case "X":
                return ["TJKT 1", "TJKT 2", "TJKT 3", "TJKT 4", "TKJY 5", "Busana 1", "Busana 2", "TSM 1", "TSM 2", "TSM 3"];
              case "XI":
                // Mengubah opsi jurusan untuk kelas XI
                return ["TJKT 1", "TJKT 2", "TJKT 3", "TJKT 4", "TJKT 5", "Busana 1", "Busana 2", "TSM 1", "TSM 2", "TSM 3"];
              case "XII":
                // Mengubah opsi jurusan untuk kelas XII
                return ["TKJ 1", "TKJ 2", "TKJ 3", "TKJ 4", "TKJ 5", "Tata Busana 1", "Tata Busana 2", "TSM 1", "TSM 2", "TSM 3"];
              default:
                return [];
            }
          }

          // Initialize jurusan options based on the default selected kelas
          updateJurusanOptions();
        </script>

    <?php
    // include "conn.php";
    // session_start();


    if (isset($_POST['submit'])) {
      // Ambil data dari form
      $nama_baru = $_POST['nama'];
      $kelas_baru = $_POST['kelas'];
      $jurusan_baru = $_POST['jurusan'];
      $jenis_kelamin_baru = $_POST['jenis_kelamin'];
      $no_hp_baru = $_POST['no_hp'];
      $alamat_baru = $_POST['alamat'];
      $password_baru = isset($_POST['password']) ? $_POST['password'] : '';

      // Periksa apakah password baru diisi atau tidak
      $update_password = !empty($password_baru) ? ", password = '$password_baru'" : '';

      // Query untuk update data siswa
      $query_update = "UPDATE siswa SET 
                nama = '$nama_baru',
                kelas = '$kelas_baru',
                jurusan = '$jurusan_baru',
                jenis_kelamin = '$jenis_kelamin_baru',
                no_hp = '$no_hp_baru',
                alamat = '$alamat_baru'
                $update_password 
                WHERE nisn = '$nisn'";

      $result_update = mysqli_query($conn, $query_update);

      // Periksa apakah query update berhasil
      if ($result_update) {
        // Tampilkan notifikasi menggunakan alert JavaScript
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data siswa berhasil diperbarui.',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            background: '#f7f7f7',
            iconColor: '#4CAF50',
            confirmButtonColor: '#4CAF50',
        }).then(function() {
            window.location.href = 'datasiswa.php';
        });
    </script>";
        exit();
      } else {
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: 'Terjadi kesalahan: " . mysqli_error($conn) . "',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            background: '#f7f7f7',
            iconColor: '#d9534f',
            confirmButtonColor: '#d9534f',
        });
    </script>";
        exit();
      }
    }
  }
}
    ?>
      </body>

      </html>