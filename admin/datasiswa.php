<?php
include 'conn.php';
session_start();
if ($_SESSION['status_login'] != true) {
  echo '<script>window.location="loginadmin.php"</script>';
}
?>

<?php
if (isset($_GET['hapus'])) {
  $nisn = $_GET['hapus'];
  $query = "DELETE FROM siswa WHERE nisn = '$nisn'";
  $q1 = mysqli_query($conn, $query);
  header("refresh:0.5;url=datasiswa.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Siswa - Lawan.id</title>

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
              <span>Siswa</span>
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

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Siswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Siswa</li>
          <li class="breadcrumb-item active">Data Siswa</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
                <button type="button" class="text-white btn btn-info bi bi-person-plus-fill">
                  <a class="text-white small" href="tambahdata.php">Tambah Data Siswa</a>
                </button>
              </h5>

              <!-- Table with stripped rows -->
              <div class="table-responsive">
                <table class="table table-striped datatable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NISN</th>
                      <!-- <th>Password</th> -->
                      <th>Nama</th>
                      <th>Kelas</th>
                      <th>Jurusan</th>
                      <th>Jenis Kelamin</th>
                      <th>No HP</th>
                      <th>Alamat</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="table-body">
                    <?php
                    $no = 1;
                    $query = "SELECT * FROM siswa";
                    $tampil = mysqli_query($conn, $query);

                    while ($data = mysqli_fetch_array($tampil)) :
                    ?>
                      <tr>
                        <td><?= $no++; ?>.</td>
                        <td><?= $data['nisn']; ?></td>
                        <!-- <td><?= str_repeat('*', strlen($data['password'])); ?></td> -->
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['kelas']; ?></td>
                        <td><?= $data['jurusan']; ?></td>
                        <td><?= $data['jenis_kelamin']; ?></td>
                        <td><?= $data['no_hp']; ?></td>
                        <td><?= $data['alamat']; ?></td>
                        <td>
                          <div class="btn-group" role="group">
                            <a href="#" data-hapus="<?= $data['nisn']; ?>" class="btn btn-danger hapus-data">
                              <i class="bi bi-trash"></i>
                            </a>
                            <a href="editsiswa.php?nisn=<?= $data['nisn']; ?>" class="btn btn-warning">
                              <i class="bi bi-pencil"></i>
                            </a>
                          </div>
                        </td>
                      </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
              <!-- End Table with stripped rows -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- Footer -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; <?php echo date('Y'); ?> <strong>Lawan.id</strong>. All Rights Reserved.
    </div>
    <div class="credits">
    </div>
  </footer>

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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- Template Main JS File -->
  <script src="../template/NiceAdmin/assets/js/main.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const enlargeImgLinks = document.querySelectorAll('.enlarge-img-link');
      const enlargedImg = document.getElementById('enlargedImg');

      enlargeImgLinks.forEach(link => {
        link.addEventListener('click', function(event) {
          const imgUrl = this.getAttribute('data-img-url');
          enlargedImg.src = imgUrl;
        });
      });
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const hapusButtons = document.querySelectorAll('.hapus-data');

      hapusButtons.forEach(button => {
        button.addEventListener('click', function(event) {
          event.preventDefault();
          const nisn = this.getAttribute('data-hapus');

          // Tampilkan SweetAlert untuk konfirmasi penghapusan
          Swal.fire({
            title: 'Konfirmasi',
            text: 'Jika data ini dihapus, semua laporan yang terkait juga akan dihapus.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
          }).then((result) => {
            // Jika pengguna mengklik "Ya, hapus!", redirect ke halaman penghapusan
            if (result.isConfirmed) {
              window.location.href = `datasiswa.php?hapus=${nisn}`;
            }
          });
        });
      });
    });
  </script>

</body>

</html>