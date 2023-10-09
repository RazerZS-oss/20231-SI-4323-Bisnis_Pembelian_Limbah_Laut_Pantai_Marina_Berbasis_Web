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

// // Menampilkan data laporan PT
// $query = "SELECT * FROM tb_datauser1";
// $result = mysqli_query($conn, $query);

if (isset($_POST['kirim'])) {
    $pesan = $_POST['pesan'];

    $query = "INSERT INTO tb_done (pesan) VALUE ('$pesan')";
    mysqli_query($conn, $query);

    header('location: memadmin.php');
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
                    <a class="nav-link text-white" href="jemputan.php">Form Jadwal Penjemputan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Memberitahu admin</a>
                </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="lapor-admin.php">Informasi User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="memadmin.php?logout=true">Log Out</a>
                </li>
            </ul>
        </div>

        <div class="col-md-10 p-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 p-4">
                        <form method="post" action="">
                            <div class="mb-3">
                                <label for="pesan" class="form-label">Kirim ke Admin</label>
                                <textarea class="form-control" id="pesan" name="pesan"
                                    rows="3"></textarea>
                            </div>
                            <button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>