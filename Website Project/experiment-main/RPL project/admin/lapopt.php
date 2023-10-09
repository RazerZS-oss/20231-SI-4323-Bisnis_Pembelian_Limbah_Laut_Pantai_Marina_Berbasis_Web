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
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
  header("Location: loginadmin.php");
  exit();
}

// Proses logout
if (isset($_GET['logout'])) {
  // Hapus session dan redirect ke halaman login
  session_destroy();
  header("Location: loginadmin.php");
  exit();
}

// Proses logout jika pengguna mengklik tombol Log Out
if (isset($_POST['logout'])) {
    // Hapus semua data sesi
    session_unset();

    // Hancurkan sesi
    session_destroy();

    // Mengarahkan pengguna ke login.php
    header('Location: loginadmin.php');
    exit();
}

// Menerima data yang dikirim dari form laporan PT
if (isset($_POST['kirim'])) {
    $namap = $_POST['namap'];
    $nikk = $_POST['nikk'];
    $notelpn = $_POST['notelpn'];
    $alamat = $_POST['alamat'];
    $jenis = $_POST['jenis'];
    $bayar = $_POST['bayar'];
    $bobot = $_POST['bobot'];
    $totalharga = $_POST['totalharga'];

    // Query untuk menyimpan data laporan PT ke tabel "tb_datauser1"
    $query = "INSERT INTO tb_datauser1 (namap, nikk, notelpn, alamat, jenis, bayar, bobot, total_harga) VALUES ('$namap', '$nikk', '$notelpn', '$alamat', '$jenis', '$bayar', '$bobot', '$totalharga')";
    mysqli_query($conn, $query);

    // Query untuk menyimpan data laporan PT ke tabel "tb_admin"
    $query_admin = "INSERT INTO tb_admin (namap, nikk, notelpn, alamat, jenis, bayar, bobot, total_harga) VALUES ('$namap', '$nikk', '$notelpn', '$alamat', '$jenis', '$bayar', '$bobot', '$totalharga')";
    mysqli_query($conn, $query_admin);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Laporan PT</title>
    <link rel="stylesheet" href="styleadmin/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-success fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="#"><i class="bi bi-list"></i> SELAMAT DATANG ADMIN | </a><b
        class="text-white">ECO <span class="text-warning">MANAGEMENT</span> RECYCLE</b>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>

  <!-- Menu Section -->
  <div class="row no-gutters mt-5" style="height:100vh;">
  <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
      <ul class="nav flex-column ml-3 mb-5">
        <li class="nav-item">
          <a class="nav-link text-white" href="admin.php"><i class="bi bi-house-fill"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="datauser.php"><i class="bi bi-person-check-fill"></i> Data User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#"><i class="bi bi-clipboard2-data-fill"></i> Form Laporan PT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="laporkurir.php"><i class="bi bi-box-seam-fill"></i> Form Laporan Kurir</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="laporpt.php"><i class="bi bi-inboxes-fill"></i> Konfirm dari PT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="konfirir.php"><i class="bi bi-calendar-check-fill"></i> Konfirm dari kurir</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="admin.php?logout=true"><i class="bi bi-door-open-fill"></i> Log Out</a>
        </li>
      </ul>
    </div>

    <div class="col-md-10 p-0">
      <div class="container">
        <div class="row">
          <div class="col-md-12 p-4">
          <section id="contact" class="section-padding">
    <form action="lapopt.php" method="post">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-header text-center pb-5">
            <h2>Laporan Untuk PT</h2>
          </div>
        </div>
      </div>
      <div class="row m-0">
        <div class="col-md-12 p-0 pt-4 p-4 m-auto">
          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <input type="text" class="form-control" name="namap" id="namap" required placeholder="Nama Panjang">
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <input type="text" class="form-control" name="nikk" id="nikk" required placeholder="NIK">
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <input type="text" class="form-control" name="notelpn" id="notelpn" required placeholder="Nomer Telepon">
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <input type="text" class="form-control" name="alamat" id="alamat" required placeholder="Alamat">
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <!-- <input type="select" class="form-select" required placeholder="Jenis Sampah"> -->
                <select name="jenis" id="jenis" class="form-select">
                  <label for="jenis">Jenis Sampah</label>
                  <option value="anorganic">Anorganic</option>
                  <option value="organic">Organic</option>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <!-- <input type="select" class="form-select" required placeholder="Metode Pembayaran"> -->
                <select name="bayar" id="bayar" class="form-select" required>
                  <label for="bayar">Metode Pembayaran</label>
                  <option value="cash">Cash</option>
                  <option value="ecash">E-Money</option>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <input type="text" class="form-control" name="bobot" id="bobot" required placeholder="Bobot(kg)">
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <input type="text" class="form-control" name="totalharga" id="totalharga" required placeholder="total harga">
              </div>
            </div>
            <!-- tombol Section -->
            <div class="tombol">
              <input type="submit" value="submit" class="btn btn-success" name="kirim">
            </div>
            <!-- tombol Section end -->
          </div>
        </div>
      </div>
    </div>
    </form>
  </section>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
</body>
</html>
