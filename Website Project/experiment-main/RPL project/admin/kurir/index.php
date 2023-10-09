<?php
session_start();

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
    header('Location: index.php');
    exit();
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
        class="text-white">PEMBELIAN <span class="text-warning">LIMBAH</span> LAUT</b>
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
          <a class="nav-link text-white" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="jemputan.php">Form Jadwal Penjemputan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="memadmin.php">Memberitahu admin</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="lapor-admin.php">Informasi User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="index.php?logout=true">Log Out</a>
        </li>
      </ul>
    </div>
  </div>