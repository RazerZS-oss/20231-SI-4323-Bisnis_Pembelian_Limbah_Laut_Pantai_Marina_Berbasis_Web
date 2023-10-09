<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "rplproject");
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}


// Cek jika admin belum login, maka redirect ke halaman login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: loginadmin.php");
    exit();
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

// Proses logout
if (isset($_GET['logout'])) {
    // Hapus session dan redirect ke halaman login
    session_destroy();
    header("Location: loginadmin.php");
    exit();
}

// Tombol "Hapus" diklik
if (isset($_POST['hapus'])) {
    // Hapus data formulir user
    $conn->query("DELETE FROM tb_pt");

    // Refresh halaman
    header('Location: laporpt.php');
    exit();
}

// Menampilkan data laporan PT
$query = "SELECT * FROM tb_pt";
$result = mysqli_query($conn, $query);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EMR | Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styleadmin/style.css">
    <link rel="icon" type="image/x-icon" href="picture/logo.jpg">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-success fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#"><i class="bi bi-list"></i> SELAMAT DATANG ADMIN | </a><b
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
          <a class="nav-link text-white" href="admin.php"><i class="bi bi-house-fill"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="datauser.php"><i class="bi bi-person-check-fill"></i> Data User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="lapopt.php"><i class="bi bi-clipboard2-data-fill"></i> Form Laporan PT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="laporkurir.php"><i class="bi bi-box-seam-fill"></i> Form Laporan Kurir</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#"><i class="bi bi-inboxes-fill"></i> Konfirm dari PT</a>
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
                        <div class="row m-0">
                            <div class="col-md-12 p-0 pt-4 p-4 m-auto">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                            
                                            <thead>
                                                Pesan dari PT
                                            </thead>

                                            <tbody>
                                                        <?php
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "<td>" . $row['pesan'] . "</td>";
                                                        }
                                                        ?> 
                                                </tbody>
                                            </table>
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
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>