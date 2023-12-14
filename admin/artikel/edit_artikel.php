<?php
include '../conn.php';
session_start();

if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

$id_artikel = $_GET['id'];

$result = $conn->query("SELECT * FROM Artikel WHERE id_artikel = '$id_artikel'");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Artikel - Lawan.id</title>

    <link href="../../assets/img/terapan/logo-large.png" rel="icon">
    <link href="../../template/NiceAdmin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="../../template/NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../template/NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../template/NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../template/NiceAdmin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../../template/NiceAdmin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../../template/NiceAdmin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../../template/NiceAdmin/assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <link href="../../template/NiceAdmin/assets/css/style.css" rel="stylesheet">
</head>

<body>

    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="dashboard.php" class="logo d-flex align-items-center">
                <img src="../../assets/img/terapan/logo-large.png" alt="">
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
                    <!-- Dropdown content goes here -->
                </li>

                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="../../template/NiceAdmin/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">
                            <?php echo $_SESSION['nisn']['nama']; ?>
                        </span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>
                                <?php echo $_SESSION['nisn']['nama']; ?>
                            </h6>
                            <span>Administrator</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="../editprofile.php">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="../loginadmin.php">
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
                <a class="nav-link collapsed" href="../dashboard.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#laporan-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-envelope"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="laporan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="../laporanmasuk.php">
                            <i class="bi bi-circle"></i><span>Laporan Masuk</span>
                        </a>
                    </li>
                    <li>
                        <a href="../datalaporan.php">
                            <i class="bi bi-circle"></i><span>Data Laporan</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-bs-target="#artikel-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-newspaper"></i><span>artikel</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="artikel-nav" class="nav-content " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="tambahartikel.php">
                            <i class="bi bi-circle"></i><span>Tambah Artikel</span>
                        </a>
                    </li>
                    <li>
                        <a href="lihat_artikel.php" class="active">
                            <i class="bi bi-circle"></i><span>Data Artikel</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-people"></i><span>Siswa</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="../datasiswa.php">
                            <i class="bi bi-circle"></i><span>Data Siswa</span>
                        </a>
                    </li>
                    <li>
                        <a href="../tambahdata.php">
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
                    <li class="breadcrumb-item active">Edit Data Siswa</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <section class="section">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"></h5>
                                            <form action="" method="post">
                                                <div class="row mb-3">
                                                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="judul" id="judul" value="<?php echo $row['judul']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="isi" class="col-sm-2 col-form-label">Isi</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" name="isi" id="isi" rows="5"><?php echo $row['isi']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?php echo $row['tanggal']; ?>" readonly />
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label class="col-sm-2 col-form-label"></label>
                                                    <div class="col-sm-10">
                                                        <button type="submit" name="submit" class="btn btn-primary">Update Data</button>
                                                        <a href="lihat_artikel.php" class="btn btn-secondary">Kembali</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $tanggal = $_POST['tanggal'];

        $sql = "UPDATE Artikel SET judul = '$judul', isi = '$isi', tanggal = '$tanggal' WHERE id_artikel = '$id_artikel'";

        if ($conn->query($sql) === TRUE) {
            // SweetAlert untuk memberi notifikasi sukses yang lebih menarik
            echo '<script>
            Swal.fire({
                icon: "success",
                title: "Artikel berhasil diperbarui!",
                text: "Selamat! Artikel Anda telah diperbarui.",
                confirmButtonColor: "#3085d6",  // Warna tombol "OK"
                confirmButtonText: "OK",
            }).then(function() {
                window.location.href = "lihat_artikel.php";
            });
          </script>';
            exit();
        } else {
            // SweetAlert untuk memberi notifikasi error yang menarik
            echo '<script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Terjadi kesalahan. Silakan coba lagi.",
                confirmButtonColor: "#d33",  // Warna tombol "OK"
                confirmButtonText: "OK",
            });
          </script>';
        }
    }
    ?>

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
    <script src="../../template/NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../../template/NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../template/NiceAdmin/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../../template/NiceAdmin/assets/vendor/echarts/echarts.min.js"></script>
    <script src="../../template/NiceAdmin/assets/vendor/quill/quill.min.js"></script>
    <script src="../../template/NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../../template/NiceAdmin/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../../template/NiceAdmin/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../../template/NiceAdmin/assets/js/main.js"></script>
</body>

</html>