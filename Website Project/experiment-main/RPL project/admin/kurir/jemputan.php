<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "rplproject");
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Cek apakah pengguna sudah login atau belum
if (isset($_SESSION['user'])) {
    $isLoggedIn = true;
} else {
    $isLoggedIn = false;
}

if (!isset($_SESSION['kurir_logged_in']) || $_SESSION['kurir_logged_in'] !== true) {
    header("Location: loginkurir.php");
    exit();
  }

  // Proses logout
if (isset($_GET['logout'])) {
    // Hapus session dan redirect ke halaman login
    session_destroy();
    header("Location: loginkurir.php");
    exit();
  }

// Proses logout jika pengguna mengklik tombol Log Out
if (isset($_POST['logout'])) {
    // Hapus semua data sesi
    session_unset();

    // Hancurkan sesi
    session_destroy();

    // Mengarahkan pengguna ke login.php
    header('Location: loginkurir.php');
    exit();
}

if (isset($_POST['submit'])) {
    $namap = $_POST['namap'];
    $notelpn = $_POST['notelpn'];
    $alamat = $_POST['alamat'];
    $jam    = $_POST['jam'];
    $waktu  = $_POST['waktu'];
    $jenis = $_POST['jenis'];
    $bayar = $_POST['bayar'];
    $bobot = $_POST['bobot'];
    $totalharga = $_POST['totalharga'];

    // Query untuk menyimpan data laporan kurir ke tabel "tb_kurir1"
$query = "INSERT INTO tb_kurir1 (namap, notelpn, alamat, jam, waktu, jenis, bayar, bobot, totalharga) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "sssssssss", $namap, $notelpn, $alamat, $jam, $waktu, $jenis, $bayar, $bobot, $totalharga);

    
    if (mysqli_stmt_execute($stmt)) {
        echo "Data berhasil disimpan ke tabel tb_kurir1.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EMR | Kurir </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styleadmin/style.css">
    <link rel="icon" type="image/x-icon" href="picture/logo.jpg">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-danger fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#"><i class="bi bi-list"></i> SELAMAT DATANG KURIR | </a><b
                class="text-white">ECO <span class="text-warning">MANAGEMENT</span> RECYCLE</b>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                    <a class="nav-link text-white" href="#">Form Jadwal Penjemputan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="memadmin.php">Memberitahu admin</a>
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="lapor-admin.php">Informasi User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="jemputan.php?logout=true">Log Out</a>
                </li>
            </ul>
        </div>

        <div class="col-md-10 p-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 p-4">
                        <section id="contact" class="section-padding">
                            <form action="" method="post">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="section-header text-center pb-5">
                                                <h2>Jadwal Pengambilan Barang</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col-md-12 p-0 pt-4 p-4 m-auto">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" name="namap" id="namap" required placeholder="Nama Kurir">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" name="notelpn"id="notelpn" required placeholder="Nomor Telepon">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" name="alamat" id="alamat" required placeholder="Alamat User">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <input type="time" class="form-control" name="jam" id="jam" required placeholder="Waktu">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <input type="date" class="form-control" name="waktu" id="waktu" required placeholder="waktu">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <select name="jenis" id="jenis" class="form-select" required>
                                                            <label for="jenis">Jenis Sampah</label>
                                                            <option value="anorganic">Anorganic</option>
                                                            <option value="organic">Organic</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <select name="bayar" id="bayar" class="form-select" required>
                                                            <label for="bayar">Metode Pembayaran</label>
                                                            <option value="cash">Cash</option>
                                                            <option value="ecash">E-Money</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" name="bobot" id="bobot" required placeholder="Bobot (kg)">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" name="totalharga" id="totalharga" required placeholder="Total Harga">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="tombol">
                                                        <input type="submit" value="Submit" class="btn btn-success" name="submit">
                                                    </div>
                                                </div>
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
</body>

</html>
