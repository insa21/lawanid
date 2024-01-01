<html>

<head>
  <meta charset="utf-8" />
  <title></title>
  <script src="http://code.jquery.com/jquery-2.0.3.min.js" data-semver="2.0.3" data-require="jquery"></script>
  <link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables_themeroller.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
  <link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
  <link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/demo_table_jui.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
  <link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/demo_table.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
  <link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/demo_page.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
  <link data-require="jqueryui@*" data-semver="1.10.0" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.0/css/smoothness/jquery-ui-1.10.0.custom.min.css" />
  <script data-require="jqueryui@*" data-semver="1.10.0" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.0/jquery-ui.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.js" data-semver="1.9.4" data-require="datatables@*"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

  <!-- DateTime plugin for DataTables CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">
</head>

<?php
$terkirim = $conn->query("SELECT * FROM laporan, siswa, status_laporan WHERE status_laporan.status='terkirim' AND status_laporan.id_status=laporan.id_status AND laporan.nisn=siswa.nisn");
$approve  = $conn->query("SELECT * FROM laporan, siswa, status_laporan WHERE status_laporan.status='approve' AND status_laporan.id_status=laporan.id_status AND laporan.nisn=siswa.nisn");
$unapprove = $conn->query("SELECT * FROM laporan, siswa, status_laporan WHERE status_laporan.status='unapprove' AND status_laporan.id_status=laporan.id_status AND laporan.nisn=siswa.nisn");

// Counter untuk penomoran baris
$nomorBaris = 1;
?>

<!-- Laporan Terkini -->
<div class="col-lg-12">
  <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <h5 class="card-title">Data Laporan Siswa<span> | Hari ini</span></h5>
      <!-- Formulir pencarian -->
      <table border="0" cellspacing="5" cellpadding="5">
        <tbody>
          <tr>
            <td>Minimum date:</td>
            <td><input type="text" id="min" name="min" class="dt-datetime" autocomplete="on"></td>
          </tr>
          <tr>
            <td>Maximum date:</td>
            <td><input type="text" id="max" name="max" class="dt-datetime" autocomplete="on"></td>
          </tr>
        </tbody>
      </table>
      <table width="100%" class="display nowrap" id="datatable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Judul</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Lokasi</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Bukti</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody id="datatable-body">
          <?php
          $nomorBaris = 1;

          // Function to generate table row
          function generateRow($data, $statusClass)
          {
            return "
            <tr>
                <th scope='row'><a href='#'>#{$GLOBALS['nomorBaris']}</a></th>
                <td>{$data['nama']}</td>
                <td><a href='#' class='text-primary'>{$data['judul']}</a></td>
                <td>{$data['deskripsi']}</td>
                <td>{$data['lokasi_kejadian']}</td>
                <td>{$data['tanggal_kejadian']}</td>
                <td>
                    <a href='#' class=eg'enlarge-img-link' data-bs-toggle='modal' data-bs-target='#enlargeImageModal' data-img-url='../assets/fotobukti/{$data['bukti_kejadian']}'>
                        <img src='../assets/fotobukti/{$data['bukti_kejadian']}' alt='Bukti' width='50' height='50'>
                    </a>
                </td>
                <td><span class='badge {$statusClass}'>{$GLOBALS['status']}</span></td>
            </tr>";
          }

          // Kondisi terkirim
          while ($perlaporan = $terkirim->fetch_assoc()) {
            $status = 'Terkirim';
            echo generateRow($perlaporan, 'bg-warning');
            $nomorBaris++;
          }

          // Kondisi approve
          while ($perlaporan1 = $approve->fetch_assoc()) {
            $status = 'Disetujui';
            echo generateRow($perlaporan1, 'bg-success');
            $nomorBaris++;
          }

          // Kondisi unapprove
          while ($perlaporan2 = $unapprove->fetch_assoc()) {
            $status = 'Tidak Disetujui';
            echo generateRow($perlaporan2, 'bg-danger');
            $nomorBaris++;
          }
          ?>
        </tbody>
      </table>

    </div>
  </div>
</div>
<!-- Akhir Laporan Terkini -->

</html>
<!-- <!-- jQuery Latest version of jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- Latest version of Moment.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<!-- DateTime plugin for DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css">
<script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>

<script>
  $(document).ready(function() {
    let minDate, maxDate;

    // Custom filtering function which will search data in column four between two values
    $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
      let min = minDate.val();
      let max = maxDate.val();
      let date = new Date(data[5]); // Assuming date is in the 6th column (index 5)

      if (
        (min === null && max === null) ||
        (min === null && date <= max) ||
        (min <= date && max === null) ||
        (min <= date && date <= max)
      ) {
        return true;
      }
      return false;
    });

    // Create date inputs
    minDate = new DateTime('#min', {
      format: 'MMMM DD YYYY'
    });
    maxDate = new DateTime('#max', {
      format: 'MMMM DD YYYY'
    });

    // DataTables initialization
    let table = $('#datatable').DataTable();

    // Refilter the table
    $('#min, #max').on('change', function() {
      table.draw();
    });
  });
</script>