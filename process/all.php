<?php

$terkirim = $conn->query("SELECT * FROM laporan, siswa, status_laporan WHERE status_laporan.status='terkirim' AND status_laporan.id_status=laporan.id_status AND laporan.nisn=siswa.nisn");
$approve  = $conn->query("SELECT * FROM laporan, siswa, status_laporan WHERE status_laporan.status='approve' AND status_laporan.id_status=laporan.id_status AND laporan.nisn=siswa.nisn");
$unapprove = $conn->query("SELECT * FROM laporan, siswa, status_laporan WHERE status_laporan.status='unapprove' AND status_laporan.id_status=laporan.id_status AND laporan.nisn=siswa.nisn");



// kondisi terkirim
while ($perlaporan = $terkirim->fetch_assoc()) { ?>
  <section class="section profile">
    <div class="card">
      <div class="card-body pt-4">
        <div class="row">
          <div class="col-xl-4">
            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <a data-bs-toggle="modal" data-bs-target="#profileImageModal">
                  <img src="../assets/kartupelajar/<?= $perlaporan['foto']; ?>" alt="Profile" style="cursor: pointer;" onclick="openProfileImageModal('../assets/kartupelajar/<?= $perlaporan['foto']; ?>')">
                </a>
                <h2><?= $perlaporan['nama']; ?></h2>
              </div>
            </div>
          </div>

          <div class="col-xl-8">
            <div class="card">
              <div class="card-body pt-3">
                <ul class="nav nav-tabs nav-tabs-bordered">
                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview-<?= $perlaporan['id_laporan'] ?>">Kejadian</button>
                  </li>
                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit-<?= $perlaporan['id_laporan'] ?>">Informasi</button>
                  </li>
                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings-<?= $perlaporan['id_laporan'] ?>">Bukti</button>
                  </li>
                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password-<?= $perlaporan['id_laporan'] ?>">Feedback</button>
                  </li>
                </ul>

                <div class="tab-content pt-2">
                  <div class="tab-pane fade show active profile-overview-<?= $perlaporan['id_laporan'] ?>" id="profile-overview-<?= $perlaporan['id_laporan'] ?>">
                    <h5 class="card-title"><?= $perlaporan['judul']; ?> <span class=""> | <?= $perlaporan['lokasi_kejadian'] ?>, <?= $perlaporan['tanggal_kejadian'] ?></span></h5>
                    <p class="small fst-italic"><?= $perlaporan['deskripsi']; ?></p>
                  </div>

                  <div class="tab-pane fade profile-edit-<?= $perlaporan['id_laporan'] ?> pt-3" id="profile-edit-<?= $perlaporan['id_laporan'] ?>">
                    <form>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">NISN</div>
                        <div class="col-lg-9 col-md-8"><?= $perlaporan['nisn']; ?></div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Nama Lengkap</div>
                        <div class="col-lg-9 col-md-8"><?= $perlaporan['nama']; ?></div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Kelas</div>
                        <div class="col-lg-9 col-md-8"><?= $perlaporan['kelas']; ?></div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                        <div class="col-lg-9 col-md-8"><?= $perlaporan['jenis_kelamin']; ?></div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">No Telp</div>
                        <div class="col-lg-9 col-md-8"><?= $perlaporan['no_hp']; ?></div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Alamat</div>
                        <div class="col-lg-9 col-md-8"><?= $perlaporan['alamat']; ?></div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Tanggal Kejadian</div>
                        <div class="col-lg-9 col-md-8"><?= $perlaporan['tanggal_kejadian']; ?></div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label">Lokasi Kejadian</div>
                        <div class="col-lg-9 col-md-8"><?= $perlaporan['lokasi_kejadian']; ?></div>
                      </div>
                    </form>
                  </div>

                  <div class="tab-pane fade pt-3" id="profile-settings-<?= $perlaporan['id_laporan'] ?>">
                    <form>
                      <div class="row mb-3 text-center">
                        <div class="col-md-8 col-lg-9">
                          <img src="../assets/fotobukti/<?= $perlaporan['bukti_kejadian']; ?>" alt="" srcset="" style="cursor: pointer; max-width: 150px;" onclick="openProfileImageModal('../assets/fotobukti/<?= $perlaporan['bukti_kejadian']; ?>')">
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="tab-pane fade pt-3" id="profile-change-password-<?= $perlaporan['id_laporan'] ?>">
                    <form action="" method="post" class="status">
                      <div class="row">
                        <div class="col-md-9">
                          <input type="text" name="id_status" value="<?= $perlaporan['id_status']; ?>" hidden>
                          <div class="form-group">
                            <textarea class="form-control" placeholder="Silahkan ketik feedback disini..." id="floatingTextarea" name="feedback" style="height: 100px;"></textarea>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="d-flex flex-column justify-content-start">
                            <button type="submit" name="approve" class="btn btn-success mb-2"><span><i class="bi bi-check-circle"></i> APPROVE</span></button>
                            <button type="submit" name="unapprove" class="btn btn-danger"><span><i class="bi bi-trash"></i> DELETE</span></button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php } ?>

<!-- Modal pelapor-->
<div class="modal fade" id="profileImageModal" tabindex="-1" aria-labelledby="profileImageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="profileImageModalLabel">
            Foto pelapor
          </h5> -->
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <div class="modal-body">
        <img id="profileImageModalContent" src="" alt="Profile Image" style="width: 100%;">
      </div>
    </div>
  </div>
</div>

<!-- Modal for enlarging images -->
<div class="modal fade" id="enlargeImageModal" tabindex="-1" aria-labelledby="enlargeImageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <img id="enlargedImg" src="" class="img-fluid" alt="Enlarged Image">
      </div>
    </div>
  </div>
</div>

<?php

$terkirim = $conn->query("SELECT * FROM laporan, siswa, status_laporan WHERE status_laporan.status='terkirim' AND status_laporan.id_status=laporan.id_status AND laporan.nisn=siswa.nisn");
$approve  = $conn->query("SELECT * FROM laporan, siswa, status_laporan WHERE status_laporan.status='approve' AND status_laporan.id_status=laporan.id_status AND laporan.nisn=siswa.nisn");
$unapprove = $conn->query("SELECT * FROM laporan, siswa, status_laporan WHERE status_laporan.status='unapprove' AND status_laporan.id_status=laporan.id_status AND laporan.nisn=siswa.nisn");


// kondisi terkirim
while ($perlaporan = $terkirim->fetch_assoc()) { ?>
  <!-- Recent Laporan -->
  <div class="col-12">
    <div class="card recent-sales overflow-auto">
      <div class="filter">
        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
          <li class="dropdown-header text-start">
            <h6>Filter</h6>
          </li>
          <li><a class="dropdown-item" href="#">Today</a></li>
          <li><a class="dropdown-item" href="#">This Month</a></li>
          <li><a class="dropdown-item" href="#">This Year</a></li>
        </ul>
      </div>
      <div class="card-body">
        <h5 class="card-title">Riwayat laporan siswa<span> | Hari ini</span></h5>
        <table class="table table-borderless datatable">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">KTP</th>
              <!-- <th scope="col">Nama</th> -->
              <th scope="col">Judul</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Lokasi</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Bukti</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Counter for numbering rows
            $rowNumber = 1;

            // Kondisi terkirim
            while ($perlaporan = $terkirim->fetch_assoc()) {
              echo "<tr>";
              echo "<th scope='row'><a href='#'>#{$rowNumber}</a></th>";
              echo "<td><a href='#' class='enlarge-img-link' data-bs-toggle='modal' data-bs-target='#enlargeImageModal' data-img-url='../assets/kartupelajar/{$perlaporan['foto']}'><img src='../assets/kartupelajar/{$perlaporan['foto']}' alt='Kartu Mahasiswa' width='50' height='50'></a></td>";
              // echo "<td>{$perlaporan['nama']}</td>";
              echo "<td><a href='#' class='text-primary'>{$perlaporan['judul']}</a></td>";
              echo "<td>{$perlaporan['deskripsi']}</td>";
              echo "<td>{$perlaporan['lokasi_kejadian']}</td>";
              echo "<td>{$perlaporan['tanggal_kejadian']}</td>";
              echo "<td><a href='#' class='enlarge-img-link' data-bs-toggle='modal' data-bs-target='#enlargeImageModal' data-img-url='../assets/fotobukti/{$perlaporan['bukti_kejadian']}'><img src='../assets/fotobukti/{$perlaporan['bukti_kejadian']}' alt='Bukti' width='50' height='50'></a></td>";
              echo "<td><span class='badge bg-warning'>Terkirim</span></td>";
              echo "</tr>";
              $rowNumber++;
            }


            // Kondisi approve
            while ($perlaporan1 = $approve->fetch_assoc()) {
              echo "<tr>";
              echo "<th scope='row'><a href='#'>#{$rowNumber}</a></th>";
              echo "<td><a href='#' class='enlarge-img-link' data-bs-toggle='modal' data-bs-target='#enlargeImageModal' data-img-url='../assets/kartupelajar/{$perlaporan1['foto']}'><img src='../assets/kartupelajar/{$perlaporan1['foto']}' alt='Kartu Mahasiswa' width='50' height='50'></a></td>";
              // echo "<td>{$perlaporan1['nama']}</td>";
              echo "<td><a href='#' class='text-primary'>{$perlaporan1['judul']}</a></td>";
              echo "<td>{$perlaporan1['deskripsi']}</td>";
              echo "<td>{$perlaporan1['lokasi_kejadian']}</td>";
              echo "<td>{$perlaporan1['tanggal_kejadian']}</td>";
              echo "<td><a href='#' class='enlarge-img-link' data-bs-toggle='modal' data-bs-target='#enlargeImageModal' data-img-url='../assets/fotobukti/{$perlaporan1['bukti_kejadian']}'><img src='../assets/fotobukti/{$perlaporan1['bukti_kejadian']}' alt='Bukti' width='50' height='50'></a></td>";
              echo "<td><span class='badge bg-success'>Approved</span></td>";
              echo "</tr>";
              $rowNumber++;
            }

            // Kondisi unapprove
            while ($perlaporan2 = $unapprove->fetch_assoc()) {
              echo "<tr>";
              echo "<th scope='row'><a href='#'>#{$rowNumber}</a></th>";
              echo "<td><a href='#' class='enlarge-img-link' data-bs-toggle='modal' data-bs-target='#enlargeImageModal' data-img-url='../assets/kartupelajar/{$perlaporan2['foto']}'><img src='../assets/kartupelajar/{$perlaporan2['foto']}' alt='Kartu Mahasiswa' width='50' height='50'></a></td>";
              // echo "<td>{$perlaporan2['nama']}</td>";
              echo "<td><a href='#' class='text-primary'>{$perlaporan2['judul']}</a></td>";
              echo "<td>{$perlaporan2['deskripsi']}</td>";
              echo "<td>{$perlaporan2['lokasi_kejadian']}</td>";
              echo "<td>{$perlaporan2['tanggal_kejadian']}</td>";
              echo "<td><a href='#' class='enlarge-img-link' data-bs-toggle='modal' data-bs-target='#enlargeImageModal' data-img-url='../assets/fotobukti/{$perlaporan2['bukti_kejadian']}'><img src='../assets/fotobukti/{$perlaporan2['bukti_kejadian']}' alt='Bukti' width='50' height='50'></a></td>";
              echo "<td><span class='badge bg-danger'>Unapproved</span></td>";
              echo "</tr>";
              $rowNumber++;
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div><!-- End Recent Laporan -->

<?php } ?>

<?php
if (isset($_POST['approve'])) {
  $id_status = $_POST['id_status'];
  $feedback = $_POST['feedback'];

  // Lakukan update ke database
  $result = $conn->query("UPDATE status_laporan SET feedback='$feedback', status='approve' WHERE id_status='$id_status'");

  // Tampilkan SweetAlert berdasarkan hasil query
  if ($result) {
    echo "<script>
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil',
                  text: 'Laporan Berhasil Di Approve',
                }).then(function() {
                  window.location = 'dashboard.php';
                });
              </script>";
  } else {
    echo "<script>
                Swal.fire({
                  icon: 'error',
                  title: 'Gagal',
                  text: 'Terjadi kesalahan. Silakan coba lagi.',
                });
              </script>";
  }
}

if (isset($_POST['unapprove'])) {
  $id_status = $_POST['id_status'];
  $feedback = $_POST['feedback'];

  // Lakukan update ke database
  $result = $conn->query("UPDATE status_laporan SET feedback='$feedback', status='unapprove' WHERE id_status='$id_status'");

  // Tampilkan SweetAlert berdasarkan hasil query
  if ($result) {
    echo "<script>
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil',
                  text: 'Laporan Berhasil Di Delete',
                }).then(function() {
                  window.location = 'dashboard.php';
                });
              </script>";
  } else {
    echo "<script>
                Swal.fire({
                  icon: 'error',
                  title: 'Gagal',
                  text: 'Terjadi kesalahan. Silakan coba lagi.',
                });
              </script>";
  }
}
?>

<?php
if (mysqli_num_rows($terkirim) == 0 && mysqli_num_rows($approve) == 0 && mysqli_num_rows($unapprove) == 0) { ?>
  <h1 style="text-align: center; font-weight: bold; font-size: 16px; margin-top: 15px; margin-bottom: -10px">Belum ada laporan masuk!<br>Tunggu ya....</h1>
<?php  }

?>

<script>
  function openProfileImageModal(imageUrl) {
    var modalImage = document.getElementById('profileImageModalContent');
    modalImage.src = imageUrl;

    var profileImageModal = new bootstrap.Modal(document.getElementById('profileImageModal'));
    profileImageModal.show();
  }
</script>