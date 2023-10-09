<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "rplproject");

// Cek apakah pengguna sudah login atau belum
if (isset($_SESSION['user'])) {
    $isLoggedIn = true;
} else {
    $isLoggedIn = false;
}

// Cek jika admin belum login, maka redirect ke halaman login
if (!isset($_SESSION['pt_logged_in']) || $_SESSION['pt_logged_in'] !== true) {
  header("Location: loginpt.php");
  exit();
}

// Proses logout
if (isset($_GET['logout'])) {
  // Hapus session dan redirect ke halaman login
  session_destroy();
  header("Location: loginpt.php");
  exit();
}

// Proses logout jika pengguna mengklik tombol Log Out
if (isset($_POST['logout'])) {
    // Hapus semua data sesi
    session_unset();

    // Hancurkan sesi
    session_destroy();

    // Mengarahkan pengguna ke login.php
    header('Location: loginpt.php');
    exit();
}

// Tombol "Hapus" diklik
if (isset($_POST['hapus'])) {
    // Hapus data formulir user
    $conn->query("DELETE FROM tb_datauser1");

    // Refresh halaman
    header('Location: laporadmin.php');
    exit();
}

// Menampilkan data laporan PT
$query = "SELECT * FROM tb_datauser1";
$result = mysqli_query($conn, $query);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Laporan PT</title>
    <link rel="stylesheet" href="styleadmin/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand text-white" href="#"><i class="bi bi-list"></i> HALAMAN PT | </a><b class="text-white">ECO <span class="text-warning">MANAGEMENT</span> RECYCLE</b>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

<!-- menu section -->
    <div class="row no-gutters mt-5" style="height:100vh;">
        <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
            <ul class="nav flex-column ml-3 mb-5">
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="laporadmin.php">Laporan Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="laporkeuangan.php">Konfirmasi Keuangan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="laporadmin.php?logout=true">Log Out</a>
                </li>
                
            </ul>
        </div>
    

  <div class="col-md-10 p-0">
    <div class="container">
      <div class="row">
        <div class="col-md-12 p-4">
          <section id="laporan-pt" class="section-padding">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="section-header text-center pb-5">
                    <h2>Data Laporan PT</h2>
                  </div>
                </div>
              </div>
              <div class="row m-0">
                <div class="col-md-12 p-0 pt-4 p-4 m-auto">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Nama</th>
                              <th>NIK</th>
                              <th>No. Telepon</th>
                              <th>Alamat</th>
                              <th>Jenis Sampah</th>
                              <th>Metode Pembayaran</th>
                              <th>Bobot (kg)</th>
                              <th>Total Harga</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                              echo "<tr>";
                              echo "<td>" . $no . "</td>";
                              echo "<td>" . $row['namap'] . "</td>";
                              echo "<td>" . $row['nikk'] . "</td>";
                              echo "<td>" . $row['notelpn'] . "</td>";
                              echo "<td>" . $row['alamat'] . "</td>";
                              echo "<td>" . $row['jenis'] . "</td>";
                              echo "<td>" . $row['bayar'] . "</td>";
                              echo "<td>" . $row['bobot'] . "</td>";
                              echo "<td>" . $row['total_harga'] . "</td>";
                              echo "</tr>";
                              $no++;
                            }
                            ?>
                          </tbody>
                        </table>
                        <form method="post" action="">
                  <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- ... (code for JavaScript libraries) ... -->

</body>
</html>
